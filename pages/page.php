<!-- PAGE CONTENU
================================================== -->
<?	// CONTENU
	list($titrep, $textep, $texte2p) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,texte,texte2 FROM ".$table_prefix."_pages WHERE page='page' AND ID='$id' "));
	$titred = preg_replace('/##PRIXTITRE##/',$prixtitre,trim($titred));
	$titred = preg_replace('/##PRIXTITRE2##/',$prixtitre2,trim($titred));
?>
		
	<!-- Page Title
	============================================= -->
	<section id="page-title" class="page-title-dark" style="position: relative; background-image: url('images/pages-ambulance-mouscron-transport-hopital/<?=$id?>.jpg');  background-size: cover; background-position: center center;">
	<div class="banner-overlay"></div>
		<div class="container clearfix "  >
			
			<h1><?php echo $titrep; ?></h1>
			<span><?php echo $texte2p; ?></span>
			<ol class="breadcrumb">
				<li><a href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
				<li class="active"><?php echo $titrep; ?></li>
			</ol>
		</div>

	</section><!-- #page-title end -->
	
	<!-- Content
	============================================= -->
	<section id="content">

		<div class="content-wrap">
			
			<div class="container clearfix">

				<div class="<?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$id.'-1.jpg')) { echo 'col_half nobottommargin '; } ?> ">

					<div class="heading-block fancy-title nobottomborder title-bottom-border">
						<h4><?php echo $titrep; ?></h4>
					</div>

					<p><?php echo $textep; ?></p>

				</div>
				
				<?php // Si on a une photo n°1, alors on passe sur 2 colonnes et on l'affiche
					if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$id.'-1.jpg')) {  ?>
					<div class="col_half col_last nobottommargin topmargin-lg center" >
						<img src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$id.'-1.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>" data-animate="fadeInLeft">
					</div>
				<?php } ?>
				
				

			</div>
		</div>
	</section>		
		
	

            
			
