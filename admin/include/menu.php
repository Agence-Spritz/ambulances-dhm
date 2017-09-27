<?php 
error_reporting(E_ALL & ~E_NOTICE); // Désactiver le rapport d'erreurs
include ("include/cookieliendirect.txt") ; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<title>Admnistration Remix Web</title>
<link href="include/StyleAdmin.css" rel="stylesheet" type="text/css" />
<link href="include//font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- CK EDITOR -->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<?
include("inc/openDB.txt"); include ("include/fonction.php");

//LANGUES
list($languesRecup) = mysqli_fetch_array(mysqli_query($link, "SELECT langues FROM ".$table_prefix."_divers WHERE ID=1 "));
$xpld=explode(',',$languesRecup,5); 
if ($xpld[0]) {$langues[0] = $xpld[0];}
if ($xpld[1]) {$langues[1] = $xpld[1];}
if ($xpld[2]) {$langues[2] = $xpld[2];}
if ($xpld[3]) {$langues[3] = $xpld[3];}
if ($xpld[4]) {$langues[4] = $xpld[4];}
$largtabl = 1260;  //en pixel largeur du tableau global

// VARIABLES GLOBALES
while (list($key, $val) = each($_GET)) {$$key=$val;}
while (list($key, $val) = each($_POST)) {$$key=$val;}
while (list($key, $val) = each($_FILES)) {$$key=$val;}
while (list($key, $val) = each($_COOKIE)) {$$key=$val;}
?>

<body>
<?php if (!$c) { ?>
<div id="menuadmin" style="width:<?=$largtabl?>px;" class="normalgris">
	<ul>
        <li><i class="fa fa-picture-o"></i> <a href="diapo.php">Diapo Accueil</a></li>
        <li><i class="fa fa-camera"></i> <a href="photo.php">Album photos</a></li>
		<li><i class="fa fa-cog"></i> <a href="divers.php">Param&egrave;tres </a></li>
        <br />
        <li><i class="fa fa-star"></i> <a href="blog.php">Blog/Actu</a></li>
        <li><i class="fa fa-link"></i> <a href="lien.php">Partenaires</a></li>
        <li><i class="fa fa-envelope"></i> <a href="contact.php">Contact du site</a></li>
        
        <br />
        <li><i class="fa fa-file-text-o"></i> <a href="page.php">Pages</a></li>
        <li>&nbsp;</li>
        <li><i class="fa fa-tag"></i> <a href="referencement.php">R&eacute;f&eacute;rencement</a></li>
		
   </ul>
</div>
<?php } ?>

