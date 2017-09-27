<?php
include "../admin/inc/openDB.txt";
list($mail1) = mysqli_fetch_array(mysqli_query($link, "SELECT mail1 FROM ".$table_prefix."_divers WHERE ID=1 "));
// VARIABLES
		$name = isset( $_POST['template-contactform-name'] ) ? $_POST['template-contactform-name'] : '';
		$email = isset( $_POST['template-contactform-email'] ) ? $_POST['template-contactform-email'] : '';
		$phone = isset( $_POST['template-contactform-phone'] ) ? $_POST['template-contactform-phone'] : '';
		$service = isset( $_POST['template-contactform-service'] ) ? $_POST['template-contactform-service'] : '';
		$subject = isset( $_POST['template-contactform-subject'] ) ? $_POST['template-contactform-subject'] : '';
		$message = isset( $_POST['template-contactform-message'] ) ? $_POST['template-contactform-message'] : '';
		
// ENREGISTREMENT DES FORMULAIRES DANS UNE TABLE
if ($name && $email && $phone && $message) {
	$dbu=date('Y-m-d H:i:s');
	$IP_exp=$_SERVER["REMOTE_ADDR"];  
	mysqli_query($link, "INSERT INTO ".$table_prefix."_contact ( `ID` , `nom` , `dbu` , `message` )
			VALUES (NULL , '$name - $mail', '$dbu', '<b>$subject</b><br /><br />Email : $email<br />Tel : $phone<br /Service : >$service<br /><br />Message : $message<br /><br />Cet email a été expédié à : $to Par $IP_exp') ");
}
require_once('phpmailer/PHPMailerAutoload.php');

$toemails = array();

$toemails[] = array(
				'email' => $mail1, // Your Email Address
				'name' => 'Serveur Remix Web' // Your Name
			);

// Form Processing Messages
$message_success = 'Merci pour votre message, <strong>nous r&eacute;pondrons &agrave; votre demande <strong>au plus vite</strong>';

// Add this only if you use reCaptcha with your Contact Forms
$recaptcha_secret = ''; // Your reCaptcha Secret

$mail = new PHPMailer();

// NETTOYAGE
$name=preg_replace("/'/","`",trim($name));
$email=preg_replace("/'/","`",trim($email));
$phone=preg_replace("/'/","`",trim($phone));
$service=preg_replace("/'/","`",trim($service));
$subject=preg_replace("/'/","`",trim($subject));
$message=preg_replace("/'/","`",trim($message));


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if( $_POST['template-contactform-email'] != '' ) {

		$subject = isset($subject) ? $subject : 'Contact du site Mss Mouscron';

		$botcheck = $_POST['template-contactform-botcheck'];

		if( $botcheck == '' ) {

			$mail->SetFrom( $email , utf8_decode($name) );
			$mail->AddReplyTo( $email , $name );
			foreach( $toemails as $toemail ) {
				$mail->AddAddress( $toemail['email'] , $toemail['name'] );
			}
			$mail->Subject = "Contact Mss site: ". utf8_decode($subject);

			$name = isset($name) ? "Nom: $name<br><br>" : '';
			$email = isset($email) ? "Email: $email<br><br>" : '';
			$phone = isset($phone) ? "Tel: $phone<br><br>" : '';
			$service = isset($service) ? "Service: $service<br><br>" : '';
			$message = isset($message) ? "Message: $message<br><br>" : '';

			$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Envoy&eacute; depuis: ' . $_SERVER['HTTP_REFERER'] : '';

			$body = utf8_decode("$name $email $phone $service $message $referrer");
			
			// Runs only when File Field is present in the Contact Form
			if ( isset( $_FILES['template-contactform-file'] ) && $_FILES['template-contactform-file']['error'] == UPLOAD_ERR_OK ) {
				$mail->IsHTML(true);
				$mail->AddAttachment( $_FILES['template-contactform-file']['tmp_name'], $_FILES['template-contactform-file']['name'] );
			}

			// Runs only when reCaptcha is present in the Contact Form
			if( isset( $_POST['g-recaptcha-response'] ) ) {
				$recaptcha_response = $_POST['g-recaptcha-response'];
				$response = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response );

				$g_response = json_decode( $response );

				if ( $g_response->success !== true ) {
					echo '{ "alert": "error", "message": "Captcha pas valide! Merci de r&eacute;-essayer." }';
					die;
				}
			}

			$mail->MsgHTML( $body );
			$sendEmail = $mail->Send();
			
			if( $sendEmail == true ):
				echo '{ "alert": "success", "message": "' . $message_success . '" }';
				// ENREGISTREMENT DES FORMULAIRES DANS UNE TABLE
				$dbu=date('Y-m-d H:i:s');
				$IP_exp=$_SERVER["REMOTE_ADDR"];
				$body=preg_replace('/"/',"``",trim($body)); 
				mysqli_query($link, "INSERT INTO ".$table_prefix."_contact ( `ID` , `nom` , `dbu` , `message` )
				VALUES (NULL , '$name - $email', '$dbu', '$subject\n\n$body\n\nCet email a été expédié à : $to Par $IP_exp') "); 
			else:
				echo '{ "alert": "error", "message": "<strong>Erreur</strong>. Merci de nous appeler<br /><br /><strong>Erreur suivante:</strong><br />' . $mail->ErrorInfo . '" }';
			endif;
		} else {
			echo '{ "alert": "error", "message": "Bot <strong>Detected</strong>.! Clean yourself Botster.!" }';
		}
	} else {
		echo '{ "alert": "error", "message": "Merci <strong>decompl&eacute;ter</strong> tous les champs." }';
	}
} else {
	echo '{ "alert": "error", "message": "Une <strong>Erreur</strong> bloque l\'envoie du formulaire. Merci de nous appeler" }';
}
?>