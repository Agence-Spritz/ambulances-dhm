<?
include "include/menu.php";

// VARIABLES
$titrepage= "R&eacute;f&eacute;rencement naturel";
$vert = "00CC00" ; $rouge = "CC3300" ;
$table_ref = $table_prefix."_referencement";
if (!$currentlg) {$currentlg="fr";}
 

// Création de la table si inexistante
mysqli_query($link, "CREATE TABLE IF NOT EXISTS `$table_ref` (
`ID` smallint(5) unsigned NOT NULL auto_increment,
`page` tinytext NOT NULL,
`lg` char(2) NOT NULL default '',
`titre` text NOT NULL,
`keywords` text NOT NULL,
`description` text NOT NULL,
PRIMARY KEY  (`ID`) ) TYPE=MyISAM;");

// MISE A JOUR DES METAS SUIVANT LES LANGUES ET LES PAGES
if ( $Submit ){
	$query = "UPDATE $table_ref SET titre=\"$titre\", keywords=\"$keywords\", description=\"$description\" WHERE page=\"$page\" AND lg=\"$currentlg\"";
    if ( mysqli_query($link, $query) ) { $msg = "Les Metas de la page $page sont &agrave; jour";} 
	else { $msgerror = "Echec de l'enregistrement, modifier et r&eacute;essayer";}
}

// CREATION DES LIGNES DANS LA TABLE REFERENCEMENT
$dir = opendir("../pages");
while ( $file = readdir($dir) ) 
{	if ( !preg_match("/^\./",$file) ) 
	{	if ( preg_match("/(.+)\.php$/",$file,$trouve) ) 
		{	for ( $a=0 ; $a<count($langues) ; $a++ ) 
			{	list($existe) = mysqli_fetch_array(mysqli_query($link, "SELECT count(*) FROM $table_ref WHERE page=\"".$trouve[1]."\" AND lg=\"".$langues[$a]."\""));
				if ( !$existe ) 
				{	mysqli_query($link, "INSERT INTO $table_ref SET page=\"".$trouve[1]."\", lg=\"".$langues[$a]."\", titre=\"\", keywords=\"\", description=\"\"");
				}
      		}
    	}
  	}
}

// PAGE PAR DEFAUT 
for ( $a=0 ; $a<count($langues) ; $a++ ) {
    list($existe) = mysqli_fetch_array(mysqli_query($link, "SELECT count(*) FROM $table_ref WHERE page=\"DEFAULT\" AND lg=\"".$langues[$a]."\""));
    if ( !$existe ) {
    	mysqli_query($link, "INSERT INTO $table_ref SET page=\"DEFAULT\", lg=\"".$langues[$a]."\", titre=\"\", keywords=\"\", description=\"\"");
    }
}

for ( $a=0 ; $a<count($langues) ; $a++ ) {
    if (!$currentlg) { $currentlg=$langues[$a]; }
    $menulangue.=" <a href=\"referencement.php?pageactu=$pageactu&title=$title&currentlg=".$langues[$a]."\">".$langues[$a]."</a> ";
}
print("<br>");
  
$result = mysqli_query($link, "SELECT page FROM $table_ref WHERE lg=\"$currentlg\" ORDER BY page");
while ( list($pageimprim) = mysqli_fetch_array($result) ) {
	$menupage.="<span style='line-height:40px'><a href=\"?pageactu=$pageimprim&title=$title&currentlg=$currentlg\">$pageimprim</a> &nbsp; </span>";
    if ( !$pageactu ) { $pageactu=$pageimprim; }
}

list ($titre,$keywords,$description) = mysqli_fetch_array(mysqli_query ($link, "SELECT titre,keywords,description FROM $table_ref WHERE page=\"$pageactu\" AND lg=\"$currentlg\""));

//Efface les lignes qui ne contiennent pas de langue
mysqli_query($link, "DELETE FROM `$table_ref` WHERE lg='' ");
?>
<div id="GENERAL" style="width:<?=$largtabl?>px;" class="normalgris">

    <div id="titreadmin" style="width:<?=$largtabl?>px;" class='grandnoir'>
        <?=$titrepage?>
    </div>
	
	<?php if ($msg) {?><div id="msg" style="width:<?=$largtabl?>px; float:left" class="normalvert"><?=$msg?></div><?php } ?>
    <?php if ($msgerror) {?><div id="msgerror" style="width:<?=$largtabl?>px; float:left" class="normalrouge"><?=$msgerror?></div><?php } ?>

    <div id="contenu" style="width:<?=$largtabl*0.8?>px; float:left">
        <i class='fa fa-tag fa-1x'></i> &nbsp;<span class="normalgris link"><?=$menupage?></span>
    </div>
    
    <div id="contenu" style="width:<?=$largtabl*0.15?>px; float:right">
        <i class='fa fa-flag fa-1x'></i> &nbsp;<span class="normalgris link"><?=$menulangue?></span>
    </div>
    
    <div style="clear:both"></div>

  <form method="post" action="<?=$regs[1]?>">
      <input type="hidden" name="title" value="<?=$title?>">
      <input type="hidden" name="pageactu" value="<?=$pageactu?>">
      <input type="hidden" name="page" value="<?=$pageactu?>">
      <input type="hidden" name="currentlg" value="<?=$currentlg?>">
      
    <table width="100%" border="0" cellpadding="6" bgcolor="#F1F1F1" style="margin-top:20px">
      <tr> 
        <td width="150" valign="top" class="GrisNorm">Page :</td>
        <td align="left"><input type="text" name="no" value="<?=$pageactu?>" disabled>  
          &nbsp; 
          <?=$currentlg?>      </td>
      </tr>
      <tr>
        <td valign="top" class="GrisNorm">&nbsp;</td>
        <td align="left" valign="top" class="GrisNorm">Si les champs ne sont pas remplis, les metas seront remplis par les informations contenus dans la page DEFAUT.</td>
      </tr>
      <tr> 
        <td valign="top" class="GrisNorm"><p><strong>Titre :</strong><br>
              <em>Pas plus de 3 lignes</em>.<br>
            <em>Faire des Phrases.</em></p>      </td>
        <td align="left"><textarea name="titre" cols="60" rows="3" class="GrisNorm"><?=$titre?></textarea></td>
      </tr>
      <tr> 
        <td valign="top" class="GrisNorm"><p><strong>Mots-cl&eacute;s :</strong><br>
            <em>Pas plus de 50 mots cl&eacute;s avec un minimum de 10.</em></p>      </td>
        <td align="left"><textarea name="keywords" cols="80" rows="5" class="GrisNorm"><?=$keywords?></textarea></td>
      </tr>
      <tr> 
        <td valign="top" class="GrisNorm"><p><strong>Description :</strong><br>
            <em>Pas plus de 3, 4 lignes</em>.</p>      </td>
        <td align="left"><textarea name="description" cols="80" rows="5" class="GrisNorm"><?=$description?></textarea></td>
      </tr>
      <tr> 
        <td valign="top">&nbsp;</td>
        <td align="left"><input name="Submit" type="submit" class="BleuNorm" value="Enregistrer les changements"></td>
      </tr>
    </table>
    </form>
</div>


