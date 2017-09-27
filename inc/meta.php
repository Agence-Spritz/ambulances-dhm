<?php  
// META NOM DE SOCIETE	
	$Q=mysqli_query($link, "SELECT nom_titre_meta FROM ".$table_prefix."_divers WHERE ID=1 ");
	list($nom_titre_meta) = mysqli_fetch_array($Q);

	list($titre,$keywords,$description) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,keywords,description FROM ".$table_prefix."_referencement WHERE page=\"$pg\" AND lg=\"$lg\""));

  	if ( !$titre ) 
	{	if ( is_array($sousmenus) ) 
		{	$titre = $sousmenus[1][array_search($pg,$sousmenus[0])];
    	} else {	list($titre) = mysqli_fetch_array(mysqli_query($link, "SELECT titre FROM ".$table_prefix."_referencement WHERE page=\"DEFAULT\" AND lg=\"$lg\""));	  }
  	}

  	if ( !$keywords ) 
	{	list($keywords) = mysqli_fetch_array(mysqli_query($link, "SELECT keywords FROM ".$table_prefix."_referencement WHERE page=\"DEFAULT\" AND lg=\"$lg\""));
  	}

  	if ( !$description ) 
	{	list($description) = mysqli_fetch_array(mysqli_query($link, "SELECT description FROM ".$table_prefix."_referencement WHERE page=\"DEFAULT\" AND lg=\"$lg\""));
  	}
	 
// OPEN GRAPH
$ogimg='http://'.$_SERVER[HTTP_HOST].dirname($_SERVER["PHP_SELF"]).'images/OpenGraph.jpg';
$ogtitre='Mss Mouscron';
$ogdescr='Femme de ménage, repassage, petits travaux de couture';

  // METAS SPECIAUX PAGES
  if (is_numeric($id)>0 && $pg=='blog')
  {	$table = $table_prefix."_pages"; 
  	$Q = mysqli_query($link, "SELECT ID,titre,texte,rub FROM $table WHERE ID='$id'");
  	list($IDmeta,$titremeta,$textemeta,$rubmeta) = mysqli_fetch_array($Q);
	$textemeta=strip_tags($textemeta);
	$titre=$titremeta.", ".strip_tags($rubmeta);
	$description=substr($textemeta,0,250);
	$keywords=motcle($titremeta).",".motcle($description);
  	$ogimg='http://'.$_SERVER[HTTP_HOST].dirname($_SERVER["PHP_SELF"]).'/images/pages-femme-menage-mouscron-repassage-herseaux/'.$IDmeta.'.jpg';
	$ogtitre=$ogtitre.": ".$titremeta;
	$ogdescr=$description;
  } 
  
    if (is_numeric($id)>0 && $pg=='page')
  {	$table = $table_prefix."_pages"; 
  	$Q = mysqli_query($link, "SELECT ID,titre,texte FROM $table WHERE ID='$id'");
  	list($IDmeta,$titremeta,$textemeta) = mysqli_fetch_array($Q);
	$textemeta=strip_tags($textemeta);
	$titre=strtolower($titremeta)."";
	$description=substr($textemeta,0,250);
	$keywords=motcle($titremeta).",".motcle($description);
  	$ogimg='http://'.$_SERVER[HTTP_HOST].dirname($_SERVER["PHP_SELF"]).'/images/pages-femme-menage-mouscron-repassage-herseaux/'.$IDmeta.'.jpg';
	$ogtitre=$ogtitre.": ".$titremeta;
	$ogdescr=$description;
  } 
  
$titre = preg_replace("/''/","`",strip_tags($titre)); $titre = preg_replace("/(\r\n|\n|\r)/", " ", $titre); 
$description = preg_replace("/'/","`",strip_tags($description )); $description = preg_replace("/(\r\n|\n|\r)/", " ", $description); 
$keywords= preg_replace("/'/","`",strip_tags($keywords)); 
  
  ?>
<title><?=$titre?></title>
<meta name="description" content="<?=$description?>">
<meta name="keywords" content="<?=$keywords?>">
<link rel="icon" href="favicon.ico" type="image/ico">
<link rel="apple-touch-icon" type="image/png" href="apple-touch-icon.png" />

<meta property="og:type" content="website" />
<meta property="og:url" content="http://<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>" />
<meta property="og:image" content="<?=$ogimg?>" /><!-- minimum 200x200px -->
<meta property="og:title" content="<?=$ogtitre?>" />
<meta property="og:description" content="<?=$ogdescr?>" />