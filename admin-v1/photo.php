<?
include "include/menu.php";

// VARIABLES
$titrepage= "<i class='fa fa-camera'></i> Albums Photos";
$tableencours = $table_prefix."_pages";
$page = "photo"; 										// Variable pour definir la sous cat page

// PHOTOS
$photosize = "1000x750";									// Dimensions idéales d'information pour la photo
$chemin = "../images/pages-ambulance-mouscron-transport-hopital/";  							// "/" à la fin
$wmax = 100; $hmax = 80;  $tdvisuphoto = $wmax*2+20;  	// Dimension pour affichage des vigettes
$redim_w=1000; $redim_h=750;
$masquervignette=0;
$nbr=0; // Nombre de photos

// CHAMPS
$chps=array('page','titre','texte','dbu','masquer','lg','rub');
$chpsNb = count($chps);
?>
<div id="GENERAL" style="width:<?=$largtabl?>px;">

<div id="titreadmin" style="width:<?=$largtabl?>px;" class='grandnoir'>
	<?=$titrepage?>
    <span class="normalgris link"><a href="?#chercher" style="float:right; margin-left:20px"><i class="fa fa-search"></i> Chercher</a></span>
    <span class="normalgris link"><a href="?partie=<?=$partie?>" style="float:right"><i class="fa fa-plus-square"></i> Ajouter</a></span>
    
</div>
<?php    
// EFFACEMENT
if ( $del ) {	
	mysqli_query($link,"DELETE FROM $tableencours WHERE ID=$del");
	@unlink($chemin.$del.".jpg"); @unlink($chemin.$del."-v.jpg");
	for ($a=1; $a<=$nbr; $a++){@unlink($chemin.$del."-".$a.".jpg");}
}
elseif ($delphoto) {@unlink($chemin.$delphoto); @unlink($chemin.$delphotov);}
unset ($del,$delphoto);
	
// TRAITEMENT DES TEXTES
if ($rubnew) {$$chps[6]=$rubnew;}
if (!$dbu) {$dbu=date(Y-m-d);} else {$dbu=date_tiret($dbu);}
for ($a=0; $a<$chpsNb; $a++){ 
	$$chps[$a]=preg_replace('/"/',"'",trim($$chps[$a]));							// " => '
	if ($a==20 ) {$$chps[$a]=preg_replace('/,/',".",$$chps[$a]);}		// PRIX , => . 
}

// ADDQUERY ET LISTE
for ($a=0; $a<$chpsNb; $a++){	$addquery1.=$chps[$a]."=\"".$$chps[$a]."\","; $liste1.=$chps[$a].",";}
$addquery1 = substr($addquery1,0,strlen($addquery1)-1);
$liste1 = substr($liste1,0,strlen($liste1)-1); //echo $liste1;
	
// MODIF / AJOUT
if ( $Submit ) 
{	if ( $modif ) 
	{	mysqli_query($link,"UPDATE $tableencours SET $addquery1 WHERE ID='$modif'");
		if ( $vignette ) { $updatevign="$modif.jpg"; $updatevign2="$modif-v.jpg"; }
		for ($a=1; $a<=$nbr; $a++){		if ( $_FILES['photo'.$a]['name'] ) { $updatefile[$a]=$modif."-".$a.".jpg";} else {$updatefile[$a]="";} }
		$msg.= "<i class='fa fa-check-circle fa-2x'></i> Mise &agrave; jour r&eacute;ussie";
    } 
	else 
	{	mysqli_query($link,"INSERT INTO $tableencours SET $addquery1");
		if ( $vignette ) 	{ $updatevign= mysqli_insert_id($link).".jpg"; $updatevign2= mysqli_insert_id($link)."-v.jpg"; }
		for ($a=1; $a<=$nbr; $a++){	if ( $_FILES['photo'.$a] ) { $updatefile[$a]=mysql_insert_id()."-".$a.".jpg"; } }
	  	$msg.= "<i class='fa fa-check-circle fa-2x'></i> Enregistrement ajout&eacute;";
    }
	for ($a=1; $a<$chpsNb; $a++) {	unset(${$chps[$a]});} // $a==1 pour ne pas réinitialiser $page.

	// ENVOYER LES PHOTOS
	$nom_tmp = $_FILES['vignette']['tmp_name']; sent_photo($updatevign,$nom_tmp,$chemin); 
	for ($a=1; $a<=$nbr; $a++){  $nom_tmp = $_FILES['photo'.$a]['tmp_name'] ; sent_photo($updatefile[$a],$nom_tmp,$chemin);}
 	
	// REDIMENSION DES PHOTOS
	if (file_exists($chemin.$updatevign) && $updatevign ) {		list($w,$h) = getimagesize($chemin.$updatevign) ;		if ($w >$redim_w || $h>$redim_h) 		{ redimage("$chemin$updatevign","$chemin$updatevign","$redim_w","$redim_h"); }}
	if (file_exists($chemin.$updatevign) && $updatevign ) {		list($w,$h) = getimagesize($chemin.$updatevign) ;		if ($w >120 || $h>100) 					{ redimage("$chemin$updatevign","$chemin$updatevign2","120","100"); }}
	
	for ($a=1; $a<=$nbr; $a++){
		if (file_exists($chemin.$updatefile[$a]) && $updatefile[$a] ) {		
			list($w,$h) = getimagesize($chemin.$updatefile[$a]) ;		
			redimage("$chemin$updatefile[$a]","$chemin$updatefile[$a]","$redim_w","$redim_h") ;
		}
	}
			
	/* IMPRESSION DU FILIGRANE
	if (file_exists($chemin.$updatefile) && $updatefile ) {		filigrane("$chemin$updatefile","img/filigrane.png");}
	*/
} // FIN DU SUBMIT

// RECUPERATION DES VALEURS ENREGISTREES
if ( $modif ) 
{	$result = mysqli_fetch_array( mysqli_query($link," SELECT ID,$liste1 FROM $tableencours WHERE ID=$modif ") );
	list($ID,$page,$titre,$texte,$dbu,$masquer,$lg,$rub ) = $result;
	$$chps[3]=date_barre($$chps[3]);
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
        
        <p><span class="libchamps"><i class='fa fa-pencil-square-o fa-1x'></i> Titre :</span><input name="<?=$chps[1]?>" type="text" value="<?=$$chps[1]?>" size="75" /></p>
        
        <p><span class="libchamps"><i class='fa fa-filter fa-1x'></i> Album : </span>          
            <select name="<?=$chps[6]?>" />
                <option value="">Aucun</option>
				<?php
                $result = mysqli_query($link, "SELECT rub FROM ".$table_prefix."_pages WHERE page='photo' AND rub!='' AND masquer!=1 GROUP BY rub ORDER BY rub ") ;
                while ( list($albump) = mysqli_fetch_array($result) ) 
                {	echo " <option value=\"$albump\" ";
                    if ( $albump==$$chps[6] ) { print(" selected"); } 
                    echo " >".$albump."</option>";
                }		?>
            </select>&nbsp;&nbsp; Ou nouvelle rubriques :<input name="rubnew" type="text" />
		</p>
        
        <!--<p><span class="libchamps"><i class='fa fa-link fa-1x'></i> Lien :</span>http://<input name="<?=$chps[6]?>" type="text" value="<?=$$chps[6]?>" size="75" maxlength="30" /></p>-->
		
        <p><span class="libchamps"><i class='fa fa-calendar fa-1x'></i> Date de tri :</span><input name="<?=$chps[3]?>" value="<?=($$chps[3])?($$chps[3]):(date("d/m/Y"))?>" type="text" required size="30" /></p>
   
        <p><span class="libchamps"><i class='fa fa-eye fa-1x'></i> Masquer :</span>
          <select name="<?=$chps[4]?>">
            <option value="0"<?php if ( $$chps[4]=="0" ) { print(" selected"); } ?>>Non</option>
            <option value="1"<?php if ( $$chps[4]=="1" ) { print(" selected"); } ?>>Oui</option>
          </select><i class='fa fa-angle-down fa-1x'></i>
        </p>
      	<p>&nbsp;</p>
    </div>
    
    <?php if ($masquervignette!=1) { ?>
    <div id="contenu" style="width:<?=$largtabl*0.35?>px; float:right" class="normalgris">
    	 <p align="center" class="grandnoir"><i class='fa fa-camera fa-1x'></i> Photos</p>
         <p><span class="libchamps">Vignette <?=$photosize?></span><input type="file" name="vignette"  value="" /></p>
		<?
		 if ( $modif && file_exists($chemin.$modif.".jpg") ) {	
				redim_img_url($chemin.$modif."-v.jpg",$wmax,$hmax);
				print("<a href='?modif=$modif&delphoto=$modif.jpg&delphotov=$modif-v.jpg'><i class='fa fa-trash-o fa-1x'></i></a> photo<br/><br/>");
			}
		for ($a=1; $a<=$nbr; $a++){ ?>
        <p><span class="libchamps">Photo <?=$a?> / <?=$photosize?></span><input type="file" name="photo<?=$a?>"  value=""> </p>
        <?php 
		} 	
		//Afficher les photos
		for ($a=1; $a<=$nbr; $a++){
			if ( $modif && file_exists($chemin.$modif."-".$a.".jpg") ) {	
				redim_img_url($chemin.$modif."-".$a.".jpg",$wmax,$hmax);
				print("<a href='?modif=$modif&delphoto=$modif-$a.jpg'> <i class='fa fa-trash-o fa-1x'></i></a> photo $a<br/><br/>");
			}
		} 
		?>
    </div><?php } ?>
    
    <div id="contenu" style="width:<?=$largtabl*0.6?>px; float:left; margin-top:10px" class="normalgris" align="center">
      <!--<p class="grandnoir"><i class='fa fa-indent fa-1x'></i> Petit texte sur la photo</p> 
      <textarea name="<?=$chps[2]?>" rows="2" cols="80" ><?=$$chps[2]?></textarea>-->     
      <br /><input type="submit" name="Submit" value="Enregistrer" />
    </div>

</form>

<div style="clear:both"></div>

<a name="chercher" id="chercher"></a>
<hr align="left" size="3" style="border:3px #006699 dotted; width:<?=$largtabl+23?>px; margin:30px 0 30px 0">

<form method="post" action="">
  <i class='fa fa-search fa-1x'></i> &nbsp;
  <?php if ($word) {?>
  <span class="VertNorm"><i class='fa fa-check fa-1x'></i></span>
  <?php } ?>
  <input name="word" type="text" value="<?php print(htmlentities($word)); ?>" size="25" />
  <input type="submit" name="search"  class="normalgris" value="Chercher" style="font-size:13px" />
  <?php if ($word) {?>
  <a href="?"><i class="fa fa-undo fa-1x"></i> Reset</a>
  <?php } ?>
</form>
<p>
  <?
if ($page) {$addQ="AND page='$page'";} 
if ($word)  {$result = mysqli_query($link,"SELECT ID,".$liste1." FROM $tableencours WHERE (".$chps[1]." LIKE '%$word%' OR ".$chps[2]." LIKE '%$word%' OR ".$chps[3]." LIKE '%$word%' OR ".$chps[4]." LIKE '%$word%' OR ID LIKE '%$word%') ".$addQ." ORDER  BY lg, dbu DESC ");}
else {  $result = mysqli_query($link," SELECT ID,".$liste1." FROM $tableencours WHERE 1 ".$addQ."  ORDER BY lg,dbu DESC ");}
  print("<table width='$largtabl' border='0' cellspacing='0' cellpadding='3'><tr class='BleuNorm'> ");
  print("<td><i class='fa fa-camera fa-1x'></i></td><td>&nbsp;</td>");
  print("<td><i class='fa fa-sort-numeric-asc fa-1x'></i> - <i class='fa fa-flag fa-1x'></i></td><td><i class='fa fa-list-ol fa-1x'></i></td><td><i class='fa fa-pencil-square-o fa-1x'></i></td><td><i class='fa fa-align-justify'></i></td><td><i class='fa fa-calendar fa-1x'></i></td><td>&nbsp;</td></tr>");
  while ( list($ID,$page,$titre,$texte,$dbu,$masquer,$lg,$rub) = mysqli_fetch_array($result) ) 
  { if ($bgcolor=="#EEEEEE") {$bgcolor="#FFFFFF";} else {$bgcolor="#EEEEEE";}
  	if ($masquer=="1") {$class="normalgrisclair";} else {$class="normalgris";}
    print("<tr bgcolor='$bgcolor' class='".$class."'>");
    print("<td><a href=\"?modif=$ID&word=$word\"><i class='fa fa-pencil fa-1x'></i></a></td>");
    print("<td><img src='".$chemin.$ID."-v.jpg?".time()."' height='60px'></td><td>$ID - $lg</td><td>".$page." <i class='fa fa-angle-right fa-1x'></i> ".$rub."</td><td>".strip_tags($titre)."</td><td>".substr(strip_tags($texte),0,60)."...</td><td>".date_barre($dbu)."</td><td><a href=\"?del=$ID&word=$word\"><i class='fa fa-trash-o fa-1x'></i></a></td>");
    print("</tr>");
  }
 ?>
</p>

</div>
</body>
</html>