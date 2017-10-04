<?php	// Requête pour récupérer le contenu de la page concernée
		list($id, $titrep, $date, $rub, $textep) = mysqli_fetch_array(mysqli_query($link, "SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='blog' AND ID='$id' "));	
?>

<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark" style="position: relative; background-image: url('images/pages-ambulance-mouscron-transport-hopital/<?=$id?>.jpg'); padding: 120px 0; background-size: cover; background-position: center center;" data-stellar-background-ratio="0.3">
		<div class="banner-overlay"></div>
			<div class="container clearfix">
				<h1><?php echo $titrep; ?></h1>
				<ol class="breadcrumb" style="position: relative !important; left: 0 !important; margin: 30px auto 0 auto !important; ">
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

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2><?php echo $titrep; ?></h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?php echo $date; ?></li>
									
								</ul><!-- .entry-meta end -->

								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$id.'.jpg')) { ?>
									<img  src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$id.'.jpg'; ?>" title="<?php echo $titrep; ?>" alt="<?php echo $titrep; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">
								
								<?php echo $textep; ?>

									<div class="clear"></div>
									
									<div class="line"></div>

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Partagez cette actualité :</span>
										<div>
											<a href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&t=<?=$titrep?>" target="_blank" class="social-icon si-small si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
				
											<a href="http://twitter.com/intent/tweet/?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&text=<?=$titrep?>" target="_blank" class="social-icon si-small si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
				
											<a href="https://plus.google.com/share?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&hl=<?=$titrep?>" target="_blank" class="social-icon si-small si-borderless si-gplus">
												<i class="icon-gplus"></i>
												<i class="icon-gplus"></i>
											</a>
				
											<a href="https://pinterest.com/pin/create/button/?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&media=<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$id.'.jpg'; ?>&description=<?=$titrep?>" target="_blank" class="social-icon si-small si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
				
											<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&title=<?=$ogtitre?>" target="_blank" class="social-icon si-small si-borderless si-linkedin">
												<i class="icon-linkedin"></i>
												<i class="icon-linkedin"></i>
											</a>

										</div>
									</div><!-- Post Single - Share End -->

								</div>
							</div><!-- .entry end -->

						</div>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							<div class="widget clearfix">

								<h4>Autres actualités</h4>
								
								<div class="tagcloud">
									
									<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='blog' AND ID <> ".$id." AND masquer <> '1' ORDER BY ID DESC limit 0,10"); 
									 	while ($data = mysqli_fetch_array($req)) {
							  		?>
										
											<a href="<?php echo slugify($data['titre']); ?>--<?php echo $data['ID']; ?>--detail-actu"><?php echo $data['titre']; ?></a>
											
									<?php } ?>
								</div>
								
							</div>

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->
