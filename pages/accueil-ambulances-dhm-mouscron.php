				<div class="container clearfix">
					
					<!-- 3 SERVICES
					============================================= -->
                    <div class="col_one_third ">
						<div class="feature-box media-box">
							<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='page' AND ID = '113' AND masquer <> '1' "); 
								 while ($data = mysqli_fetch_array($req)) {
						  	?>
						
								<a href="<?php echo slugify($data['titre']); ?>--<?php echo $data['ID']; ?>--page">
	                            <div class="fbox-media">
		                            <?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div>
								<div class="fbox-desc">
									<h3><?php echo $data['titre']; ?>
										<span class="subtitle"><?php echo $data['texte']; ?></span>
									</h3>
									
								</div>
	                            </a>
                            
                            <?php } ?>
						</div>
					</div>

					<div class="col_one_third nobottommargin">
						<div class="feature-box media-box">
							<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='page' AND ID = '114' AND masquer <> '1' "); 
								 while ($data = mysqli_fetch_array($req)) {
						  	?>
						
								<a href="<?php echo slugify($data['titre']); ?>--<?php echo $data['ID']; ?>--page">
	                            <div class="fbox-media">
		                            <?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div>
								<div class="fbox-desc">
									<h3><?php echo $data['titre']; ?>
										<span class="subtitle"><?php echo $data['texte']; ?></span>
									</h3>
									
								</div>
	                            </a>
                            
                            <?php } ?>
						</div>
					</div>

					<div class="col_one_third nobottommargin col_last">
						<div class="feature-box media-box">
							<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='page' AND ID = '115' AND masquer <> '1' "); 
								 while ($data = mysqli_fetch_array($req)) {
						  	?>
						
								<a href="<?php echo slugify($data['titre']); ?>--<?php echo $data['ID']; ?>--page">
	                            <div class="fbox-media">
		                            <?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>">
									<?php } else { ?>
										<img alt="" class="img-responsive" src="./images/photo-replace.jpg">
									<?php } ?>
								</div>
								<div class="fbox-desc">
									<h3><?php echo $data['titre']; ?>
										<span class="subtitle"><?php echo $data['texte']; ?></span>
									</h3>
									
								</div>
	                            </a>
                            
                            <?php } ?>
						</div>
					</div>

					<div class="clear"></div>
                    
				</div>
				
				
				<div class="section dark bottommargin-lg" style="height: 500px;">
					<div class="container center clearfix vertical-middle">
						
						<div class="slider-caption slider-caption-center">
							<h2 data-animate="fadeInUp">A votre service</h2>
						</div>


						<div class="col_one_fourth nobottommargin">
							<div class="feature-box fbox-center fbox-plain nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class="flaticon-iv-bag" ></i></a>
								</div>
								<p>Pour les transports urgents de soins intensifs et de réanimation, cette cellule médicalisée est capable d’accueillir toute une équipe médicale (médecin, infirmiers, ambulanciers supplémentaires).</p>
							</div>
						</div>
	
						<div class="col_one_fourth nobottommargin">
							<div class="feature-box fbox-center fbox-plain nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class="flaticon-bed" ></i></a>
								</div>
								<p>Ce service d’ambulance assure les transports non urgents pour personnes nécessitant un brancard.</p>
							</div>
						</div>
	
						<div class="col_one_fourth nobottommargin">
							<div class="feature-box fbox-center fbox-plain nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class="flaticon-wheelchair-facing-right" ></i></a>
								</div>
								<p>Ce type de transport permet aux personnes valides ou à mobilité réduite de se déplacer selon leurs besoins grâce à des véhicules adaptés.</p>
							</div>
						</div>
	
						<div class="col_one_fourth nobottommargin col_last">
							<div class="feature-box fbox-center fbox-plain nobottomborder">
								<div class="fbox-icon">
									<a href="#"><i class="flaticon-medical" ></i></a>
								</div>
								<p>En cas d’hospitalisation, la demande de transport peut être faite directement en nous contactant par téléphone.</p>
							</div>
						</div>

					</div>
					<div class="video-wrap">
						<video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
							<source src='images/videos/FireDepartment.mp4' type='video/mp4' />
						</video>
						<div class="video-overlay" style="background-color: rgba(0,0,0,0.35);"></div>
					</div>
				</div>
				
				<div class="section nobg topmargin-lg nobottommargin">
					<div class="container clearfix">
						
						<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='page' AND rub='edito-1' "); 
							while ($data = mysqli_fetch_array($req)) {
						?>

						<div class="col_half nobottommargin center">

							<?php if (is_file('./images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg')) { ?>
								<img src="<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$data['ID'].'.jpg'; ?>" title="<?php echo $data['titre']; ?>" alt="<?php echo $data['titre']; ?>" data-animate="fadeInLeft">
							<?php } else { ?>
								<img alt="" class="img-responsive" src="./images/photo-replace.jpg" data-animate="fadeInLeft">
							<?php } ?>
							
						</div>

						<div class="col_half nobottommargin col_last">

							<div class="heading-block" style="">

								<h2><?php echo $data['titre']; ?></h2>
								<span><?php echo $data['texte2']; ?></span>

							</div>

							<p><?php echo $data['texte']; ?></p>

							<a href="#" class="button button-border button-large button-rounded topmargin-sm noleftmargin">Notre priorité : le patient</a>

						</div>
						
						<?php } ?>

					</div>
				</div>

				<div class="section nobg notopmargin noborder bottommargin-sm">
					<div class="container clearfix">
						
						<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='page' AND rub='edito-2' "); 
							while ($data = mysqli_fetch_array($req)) {
						?>

						<div class="nobottommargin">

							<div class="heading-block" style="">

								<h2><?php echo $data['titre']; ?></h2>
								<span><?php echo $data['texte2']; ?></span>

							</div>

							<p><?php echo $data['texte']; ?></p>

							<a href="#" class="button button-border button-large button-rounded topmargin-sm noleftmargin">Notre priorité : le patient</a>

						</div>

						
						<?php } ?>

					</div>
				</div>
