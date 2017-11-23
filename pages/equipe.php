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

					<div class="bottommargin">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>Découvrez notre <span>équipe</span></h4>
						</div>

						<p><?php echo $textep; ?></p>

					</div>

				</div>
				
				<div class="container clearfix">
					
					<!-- L'équipe ambulanciers
					============================================= -->
					
					<div class="fancy-title title-border">
						<h3>L'équipe ambulanciers</h3>
					</div>

					<div class="row">
						
						<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='equipe' AND rub = 'Ambulanciers' AND masquer <> '1' ORDER BY ID ASC "); 
						 	$n=0;
							while ($data = mysqli_fetch_array($req)) {
								$n++;
				  		?>

						<div class="col-md-3 col-sm-6 bottommargin" <?=($n==5)?('style="clear:both"'):('')?>>

							<div class="team">
								<div class="team-image">
									<?php if (is_file('./images/team/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/team/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div>
								<div class="team-desc">
									<div class="team-title"><h4><?php echo $data['titre']; ?></h4><span><?php echo $data['texte2']; ?></span></div>
								</div>
							</div>

						</div>
						
						<?php } ?>
						
					</div>

					<div class="clear"></div>
					
					<!-- L'équipe Nursing
					============================================= -->
					
					<div class="fancy-title title-border">
						<h3>L'équipe Nursing</h3>
					</div>

					<div class="row">
						
						<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='equipe' AND rub = 'Nursing' AND masquer <> '1' ORDER BY ID ASC "); 
						 	$n=0;
							while ($data = mysqli_fetch_array($req)) {
								$n++;
				  		?>

						<div class="col-md-3 col-sm-6 bottommargin" <?=($n==5)?('style="clear:both"'):('')?>>

							<div class="team">
								<div class="team-image">
									<?php if (is_file('./images/team/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/team/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div>
								<div class="team-desc">
									<div class="team-title"><h4><?php echo $data['titre']; ?></h4><span><?php echo $data['texte2']; ?></span></div>
								</div>
							</div>

						</div>
						
						<?php } ?>
						
					</div>

					
					<div class="clear"></div>
					
					<!-- L'équipe administrative
					============================================= -->
					
					<div class="fancy-title title-border">
						<h3>L'équipe administrative</h3>
					</div>

					<div class="row">
						
						<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='equipe' AND rub = 'Administrative' AND masquer <> '1' ORDER BY ID ASC "); 
						 	$n=0;
							while ($data = mysqli_fetch_array($req)) {
								$n++;
				  		?>

						<div class="col-md-3 col-sm-6 bottommargin" <?=($n==5)?('style="clear:both"'):('')?>>

							<div class="team">
								<div class="team-image">
									<?php if (is_file('./images/team/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/team/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div>
								<div class="team-desc">
									<div class="team-title"><h4><?php echo $data['titre']; ?></h4><span><?php echo $data['texte2']; ?></span></div>
								</div>
							</div>

						</div>
						
						<?php } ?>
						
					</div>
					
					<div class="clear"></div>
					
				</div>

			</div>

		</section><!-- #content end -->
	
