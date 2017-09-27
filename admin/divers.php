<?
include "include/menu.php";

// VARIABLES
$titrepage= "Email formulaire / Coordonn&eacute;es";
$tableencours = $table_prefix."_divers";
//$page = "actu"; 										// Variable pour definir la sous cat page
$modif=1;

// PHOTOS
$photosize = "990x250";									// Dimensions idéales d'information pour la photo
//$chemin = "../img/pages/";  							// "/" à la fin
$wmax = 100; $hmax = 80;  $tdvisuphoto = $wmax*2+20;  	// Dimension pour affichage des vigettes
$redim_w=990; $redim_h=250;
$masquervignette=1;
$nbr=0; // Nombre de photos

// CHAMPS
$chps=array('mail1','coordonnees');
$chpsNb = count($chps);
?>
<div id="GENERAL" style="width:<?=$largtabl?>px;">

<div id="titreadmin" style="width:<?=$largtabl?>px;" class='grandnoir'>
	<?=$titrepage?>
</div>
<?php    
// EFFACEMENT
if ( $del ) {	
	mysqli_query($link, "DELETE FROM $tableencours WHERE ID=$del");
	@unlink($chemin.$del.".jpg");
	for ($a=1; $a<=$nbr; $a++){@unlink($chemin.$del."-".$a.".jpg");}
}
elseif ($delphoto) {@unlink($chemin.$delphoto);}
unset ($del,$delphoto);
	
// TRAITEMENT DES TEXTES
if (!$dbu) {$dbu=date(Y-m-d);} else {$dbu=date_tiret($dbu);}
for ($a=0; $a<$chpsNb; $a++){ 
	$$chps[$a]=preg_replace('/"/',"'",trim($$chps[$a]));							// " => '
	if ($a==5 || $a==6 || $a==10) {$$chps[$a]=preg_replace('/,/',".",$$chps[$a]);}		// PRIX , => . 
}

// ADDQUERY ET LISTE
for ($a=0; $a<$chpsNb; $a++){	$addquery1.=$chps[$a]."=\"".$$chps[$a]."\","; $liste1.=$chps[$a].",";}
$addquery1 = substr($addquery1,0,strlen($addquery1)-1);
$liste1 = substr($liste1,0,strlen($liste1)-1); //echo $liste1;
	
// MODIF / AJOUT
if ( $Submit ) 
{	if ( $modif ) 
	{	mysqli_query($link, "UPDATE $tableencours SET $addquery1 WHERE ID='$modif'");
		if ( $vignette ) { $updatevign="$modif.jpg"; }
		for ($a=1; $a<=$nbr; $a++){		if ( $_FILES['photo'.$a]['name'] ) { $updatefile[$a]=$modif."-".$a.".jpg";} else {$updatefile[$a]="";} }
		$msg.= "<i class='fa fa-check-circle fa-2x'></i> Mise &agrave; jour r&eacute;ussie";
    } 
	unset($ID,$mail1,$coordonnees);
	
	/*
	// ENVOYER LES PHOTOS
	$nom_tmp = $_FILES['vignette']['tmp_name']; sent_photo($updatevign,$nom_tmp,$chemin); 
	for ($a=1; $a<=$nbr; $a++){  $nom_tmp = $_FILES['photo'.$a]['tmp_name'] ; sent_photo($updatefile[$a],$nom_tmp,$chemin);}
 	
	// REDIMENSION DES PHOTOS
	if (file_exists($chemin.$updatevign) && $updatevign ) {		list($w,$h) = getimagesize($chemin.$updatevign) ;		if ($w >$redim_w || $h>$redim_h) 		{ redimage("$chemin$updatevign","$chemin$updatevign","$redim_w","$redim_h");}}
	for ($a=1; $a<=$nbr; $a++){
		if (file_exists($chemin.$updatefile[$a]) && $updatefile[$a] ) {		
			list($w,$h) = getimagesize($chemin.$updatefile[$a]) ;		
			redimage("$chemin$updatefile[$a]","$chemin$updatefile[$a]","$redim_w","$redim_h") ;
		}
	}
			
	 IMPRESSION DU FILIGRANE
	if (file_exists($chemin.$updatefile) && $updatefile ) {		filigrane("$chemin$updatefile","img/filigrane.png");}
	*/
} // FIN DU SUBMIT

// RECUPERATION DES VALEURS ENREGISTREES
if ( $modif ) 
{	$result = mysqli_fetch_array( mysqli_query($link, " SELECT ID,$liste1 FROM $tableencours WHERE ID=$modif ") );
	list($ID,$mail1,$coordonnees) = $result;
}  
?>
<?php if ($msg) {?><div id="msg" style="width:<?=$largtabl?>px; float:left" class="normalvert"><?=$msg?></div><?php } ?>
<?php if ($msgerror) {?><div id="msgerror" style="width:<?=$largtabl?>px; float:left" class="normalrouge"><?=$msgerror?></div><?php } ?>

<form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="modif" value="<?=$modif?>">
    <input type="hidden" name="word" value="<?=$word?>">
    
<div id="contenu" style="width:<?=$largtabl*0.6?>px; float:left" class="normalgris">
        <?	// BOUTON LANGUES    
        if (isset($langues) && count($langues)>1) {
            echo "<p><i class='fa fa-flag fa-1x'></i> &nbsp;";
            for ( $a=0 ; $a<count($langues) ; $a++ ) {
                if ( $lg == $langues[$a] || (!$a&&!$lg) ) { $addselected = " checked"; } else { $addselected = ""; }
                if ( $a ) { print ",&nbsp;"; } 
            
            echo $langues[$a]."<input type=\"radio\" name=\"lg\" value=\"".$langues[$a]."\"$addselected>";
            }
            echo "</p>";
        } else { echo '<input type="hidden" name="lg" value="'.$langues[0].'">';}
        ?>
        
        <p><span class="libchamps"><i class='fa fa-envelope fa-1x'></i> Email :</span>
          <input name="<?=$chps[0]?>" value="<?=$$chps[0]?>" type="text" required size="75" /></p>
    </div>
    
    <?php if ($masquervignette!=1) { ?>
    <div id="contenu" style="width:<?=$largtabl*0.35?>px; float:right" class="normalgris">
    	 <p align="center" class="grandnoir"><i class='fa fa-camera fa-1x'></i> Photos</p>
         <p><span class="libchamps">Vignette</span><input type="file" name="vignette"  value="" /></p>
		<?
		 if ( $modif && file_exists($chemin.$modif.".jpg") ) {	
				redim_img_url($chemin.$modif.".jpg",$wmax,$hmax);
				print("<a href=?modif=$modif&delphoto=$modif.jpg><i class='fa fa-trash-o fa-1x'></i></a> photo $a<br/><br/>");
			}
		for ($a=1; $a<=$nbr; $a++){ ?>
        <p><span class="libchamps">Photo <?=$a?> / <?=$photosize?></span><input type="file" name="photo<?=$a?>"  value=""> </p>
        <?php 
		} 	
		//Afficher les photos
		for ($a=1; $a<=$nbr; $a++){
			if ( $modif && file_exists($chemin.$modif."-".$a.".jpg") ) {	
				redim_img_url($chemin.$modif."-".$a.".jpg",$wmax,$hmax);
				print("<a href=?modif=$modif&delphoto=$modif-$a.jpg> <i class='fa fa-trash-o fa-1x'></i></a> photo $a<br/><br/>");
			}
		} 
		?>
    </div><?php } ?>
    
    <div id="contenu" style="width:<?=$largtabl*0.6?>px; float:left; margin-top:10px" class="normalgris" align="center">
      <p class="grandnoir"><i class='fa fa-align-justify fa-1x'></i> Coordonn&eacute;es</p> 
      <p>
        <textarea name="<?=$chps[1]?>" rows="10" cols="50" ><?=$$chps[1]?>
        </textarea>
        <script type="text/javascript">CKEDITOR.replace( '<?=$chps[1]?>' );</script>
        <br /><input type="submit" name="Submit" value="Enregistrer" />
      </p>
    </div>

</form>

<div style="clear:both"></div>
</div>
</body>
</html>