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

					<!-- Posts
					============================================= -->
					<div id="posts" class="post-grid grid-container post-masonry grid-3 clearfix">
						
						<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='blog' AND masquer <> '1' ORDER BY ID DESC "); 
						 	while ($data = mysqli_fetch_array($req)) {
				  		?>

						<div class="entry clearfix">
							<div class="entry-image">
								<?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg')) { ?>
									<a href="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg'; ?>" data-lightbox="image"><img class="image_fade" src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>"></a>
								<?php } else { ?>
									<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
								<?php } ?>
							</div>
							<div class="entry-title">
								<h2><a href="<?php echo slugify($data['titre']); ?>--<?php echo $data['ID']; ?>--detail-actu"><?php echo $data['titre']; ?></a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> <?php echo $data['dbu']; ?></li>
							</ul>
							<div class="entry-content">
								<p><?php echo cleanCut($data['texte'], '200'); ?></p>
								<a href="<?php echo slugify($data['titre']); ?>--<?php echo $data['ID']; ?>--detail-actu"class="more-link">En savoir plus</a>
							</div>
						</div>
						
						<?php } ?>

					   

					</div><!-- #posts end -->

				</div>

			</div>

		</section><!-- #content end -->      


