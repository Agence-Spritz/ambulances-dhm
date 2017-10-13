<?php
include "../admin/inc/openDB.txt";
list($mail1) = mysqli_fetch_array(mysqli_query($link, "SELECT mail1 FROM ".$table_prefix."_divers WHERE ID=1 "));
// VARIABLES

if(isset($_POST['visiteur_nom'])){ $visiteur_nom = $_POST['visiteur_nom']; } else { $visiteur_nom = NULL; }
if(isset($_POST['visiteur_prenom'])){ $visiteur_prenom = $_POST['visiteur_prenom']; } else { $visiteur_prenom = NULL; }
if(isset($_POST['visiteur_email'])){ $visiteur_email = $_POST['visiteur_email']; } else { $visiteur_email = NULL; }
if(isset($_POST['visiteur_tel'])){ $visiteur_tel = $_POST['visiteur_tel']; } else { $visiteur_tel = NULL; }
if(isset($_POST['visiteur_entreprise'])){ $visiteur_entreprise = $_POST['visiteur_entreprise']; } else { $visiteur_entreprise = NULL; }

if(isset($_POST['transp_nom'])){ $transp_nom = $_POST['transp_nom']; } else { $transp_nom = NULL; }
if(isset($_POST['transp_prenom'])){ $transp_prenom = $_POST['transp_prenom']; } else { $transp_prenom = NULL; }
if(isset($_POST['transp_datenaissance'])){ $transp_datenaissance = $_POST['transp_datenaissance']; } else { $transp_datenaissance = NULL; }

if(isset($_POST['res_type'])){ $res_type = $_POST['res_type']; } else { $res_type = NULL; }
if(isset($_POST['res_choix'])){ $res_choix = $_POST['res_choix']; } else { $res_choix = NULL; }
if(isset($_POST['res_adresse_depart'])){ $res_adresse_depart = $_POST['res_adresse_depart']; } else { $res_adresse_depart = NULL; }
if(isset($_POST['res_date_depart_retour'])){ $res_date_depart_retour = $_POST['res_date_depart_retour']; } else { $res_date_depart_retour = NULL; }
if(isset($_POST['res_adresse_destination'])){ $res_adresse_destination = $_POST['res_adresse_destination']; } else { $res_adresse_destination = NULL; }
if(isset($_POST['res_heure_depart_retour'])){ $res_heure_depart_retour = $_POST['res_heure_depart_retour']; } else { $res_heure_depart_retour = NULL; }
if(isset($_POST['res_date_depart_aller'])){ $res_date_depart_aller = $_POST['res_date_depart_aller']; } else { $res_date_depart_aller = NULL; }
if(isset($_POST['res_heure_depart_aller'])){ $res_heure_depart_aller = $_POST['res_heure_depart_aller']; } else { $res_heure_depart_aller = NULL; }
if(isset($_POST['commentaire'])){ $commentaire = $_POST['commentaire']; } else { $commentaire = NULL; }
if(isset($_POST['check_cgv'])){ $check_cgv = $_POST['check_cgv']; } else { $check_cgv = NULL; }

$subject = isset($subject) ? $subject : 'Demande de réservation';
		
		
// ENREGISTREMENT DES FORMULAIRES DANS UNE TABLE
/* // Mise en commentaire car ce traitement a deja lieu plus bas
if ($visiteur_nom && $visiteur_email && $visiteur_tel && $transp_nom && $res_type && $res_choix && $res_adresse_depart && $res_adresse_destination && $res_date_depart_aller && $res_heure_depart_aller && $res_date_depart_retour && $res_heure_depart_retour && $check_cgv ) {
	$dbu=date('Y-m-d H:i:s');
	$IP_exp=$_SERVER["REMOTE_ADDR"];  
	mysqli_query($link, "INSERT INTO ".$table_prefix."_contact ( `ID` , `nom` , `dbu` , `message` )
				VALUES (NULL , '$visiteur_nom - $visiteur_email', '$dbu', '<b>$subject</b><br /><br />Email : $visiteur_email<br />Tel : $visiteur_tel<br /Service : >$res_type<br /><br />Message : $res_choix<br /><br />Cet email a été expédié à : $to Par $IP_exp') ");
}
*/
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
$visiteur_nom=preg_replace("/'/","`",trim($visiteur_nom));
$visiteur_prenom=preg_replace("/'/","`",trim($visiteur_prenom));
$visiteur_email=preg_replace("/'/","`",trim($visiteur_email));
$visiteur_tel=preg_replace("/'/","`",trim($visiteur_tel));
$visiteur_entreprise=preg_replace("/'/","`",trim($visiteur_entreprise));
$transp_nom=preg_replace("/'/","`",trim($transp_nom));
$transp_prenom=preg_replace("/'/","`",trim($transp_prenom));
$transp_datenaissance=preg_replace("/'/","`",trim($transp_datenaissance));
$res_type=preg_replace("/'/","`",trim($res_type));
$res_choix=preg_replace("/'/","`",trim($res_choix));
$res_adresse_depart=preg_replace("/'/","`",trim($res_adresse_depart));
$res_date_depart_retour=preg_replace("/'/","`",trim($res_date_depart_retour));
$res_adresse_destination=preg_replace("/'/","`",trim($res_adresse_destination));
$res_heure_depart_retour=preg_replace("/'/","`",trim($res_heure_depart_retour));
$res_date_depart_aller=preg_replace("/'/","`",trim($res_date_depart_aller));
$res_heure_depart_aller=preg_replace("/'/","`",trim($res_heure_depart_aller));
$commentaire=preg_replace("/'/","`",trim($commentaire));


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if( $visiteur_nom && $visiteur_email && $visiteur_tel && $transp_nom && $res_type && $res_choix && $res_adresse_depart && $res_adresse_destination && $res_date_depart_aller && $res_heure_depart_aller && $res_date_depart_retour && $res_heure_depart_retour ) {

		$botcheck = $_POST['check_cgv'];

		if( $botcheck == 'on' ) {

			// Mail à destination de l'admin
			$mail->SetFrom( $visiteur_email , utf8_decode($visiteur_nom) );
			$mail->AddReplyTo( $visiteur_email , $visiteur_nom );
			foreach( $toemails as $toemail ) {
				$mail->AddAddress( $toemail['email'] , $toemail['name'] );
			}
			$mail->Subject = "Ambulances DHM : ". utf8_decode($subject);

			$message = "<h3>".$subject."</h3><br /><br />";
			$message .= "<strong><u>Informations concernant le visiteur : </u></strong><br />";
			$message .= "Nom : ".$visiteur_nom."<br />";
			$message .= "Prénom : ".$visiteur_prenom."<br />";
			$message .= "Email : ".$visiteur_email."<br />";
			$message .= "Tél : ".$visiteur_tel."<br />";
			$message .= "Entreprise ou établissement : ".$visiteur_entreprise."<br /><br />";
			
			$message .= "<strong><u>Informations concernant la personne à transporter : </u></strong><br />";
			$message .= "Nom : ".$transp_nom."<br />";
			$message .= "Prénom : ".$transp_prenom."<br />";
			$message .= "Date de naissance : ".$transp_datenaissance."<br /><br />";
			
			$message .= "<strong><u>Informations concernant la réservation : </u></strong><br /><br />";
			$message .= "Type de transport : ".$res_type."<br />";
			$message .= "Choix : ".$res_choix."<br /><br />";
			
			$message .= "<strong>Aller</strong><br />";
			$message .= "Adresse de départ : ".$res_adresse_depart."<br />";
			$message .= "Adresse de destination : ".$res_adresse_destination."<br />";
			$message .= "Date de départ : ".$res_date_depart_aller."<br />";
			$message .= "Heure de départ : ".$res_heure_depart_aller."<br /><br />";
			
			$message .= "<strong>Retour</strong><br />";
			$message .= "Date de retour : ".$res_date_depart_retour."<br />";
			$message .= "Heure de retour : ".$res_heure_depart_retour."<br />";
			
			$message .= "Informations complémentaires : ".$commentaire."<br /><br />";
			

			$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Envoy&eacute; depuis: ' . $_SERVER['HTTP_REFERER'] : '';

			$body = utf8_decode("$message $referrer");
			
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
					VALUES (NULL , '$visiteur_nom - $visiteur_email', '$dbu', '$subject\n\n$body\n\nCet email a été expédié à : $to Par $IP_exp') ");
					
					
					// On envoie un mail de confirmation au client
					
					$nom_expediteur_admin = ""; 
					
					$mail->SetFrom( $mail1 , utf8_decode($nom_expediteur_admin) );
					$mail->AddReplyTo( $mail1 , $nom_expediteur_admin );
					
					$mail->AddAddress( $visiteur_email , $visiteur_nom );
					
					$mail->Subject = utf8_decode("Votre réservation d'ambulance");
		
					$message_confirm = "<h3>Confirmation de réception</h3><br /><br />";
					$message_confirm .= "Nous vous confirmons la bonne réception de votre demande de réservation auprès des Ambulances DHM<br />";
					$message_confirm .= "Votre demande sera traitée dans les meilleurs délais. <br /><br />";
					$message_confirm .= "L'équipe DHM<br />";
					
					
					$body = utf8_decode("$message_confirm");
					$mail->MsgHTML( $body );
					$sendEmail = $mail->Send();
					
				
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