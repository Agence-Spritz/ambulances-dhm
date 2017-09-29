<?
include("admin/inc/openDB.txt"); 
include("inc/fonction.php"); 

// VARIABLES
$id=mysqli_real_escape_string($link,$_GET['id']);
$rub=mysqli_real_escape_string($link,$_GET['rub']);
$services=mysqli_real_escape_string($link,$_GET['services']);
if (!$page) {$page=mysqli_real_escape_string($link,$_GET['page']);}
if (!$lg) {$lg="fr" ;}

// LE NOM DU FICHIER .PHP = $pg
if (!$pg) {preg_match("/.*\/(.*)\.php$/",$_SERVER["SCRIPT_NAME"],$regs); $pg = $regs[1];}
$defaultpg = "accueil-ambulances-dhm-mouscron";

if ( !preg_replace('/[a-z0-9]/',$pg,1) ) { 	$pg = $defaultpg; } 
elseif ( !file_exists("pages/$pg.php") ) {$pg = $defaultpg;  }
elseif ( !$pg ) { $pg = $defaultpg; }

// SKEL
if (!$sk || !file_exists("skel/$sk.php")) { $sk = "defaut"; }
include ("skel/$sk.php");

exit;
mysqli_close($link);

?>

  

