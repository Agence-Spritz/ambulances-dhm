<section id="content">
	<div class="content-wrap">	
		
		
		<div class="container clearfix">
			
			<!-- 3 SERVICES
			============================================= -->
            <div class="col_one_third ">
	            
	            <!-- Trajets pris en charge : fait appel à un titre et sous titre de page personnalisée, mais link vers une page plus détaillée-->
				<div class="feature-box media-box">
					<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='page' AND ID = '113' AND masquer <> '1' "); 
						 while ($data = mysqli_fetch_array($req)) {
				  	?>
				
						<a href="prise-en-charge-transport-hopital--3--prise-en-charge">
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
				
				<!-- réserver en ligne : fait appel à un titre et sous titre de page personnalisée, mais link vers une page plus détaillée -->
				<div class="feature-box media-box">
					<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='page' AND ID = '114' AND masquer <> '1' "); 
						 while ($data = mysqli_fetch_array($req)) {
				  	?>
				
						<a href="reservation-transport-hopital-mouscron-ambulance--132--reserver-en-ligne">
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
				
				<!-- La qualité garantie : fait appel à un titre et sous titre de page personnalisée, mais link vers une page plus détaillée -->
				<div class="feature-box media-box">
					<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='page' AND ID = '115' AND masquer <> '1' "); 
						 while ($data = mysqli_fetch_array($req)) {
				  	?>
						<a href="qualite-service-transport-hopital--133--page">
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
		
		<div class="section dark topmargin-lg a-votre-service">
			<div class="container center clearfix vertical-middle">
				
				<div class="slider-caption slider-caption-center">
					<h2 data-animate="fadeInUp">Toute une équipe à votre service</h2>
				</div>

				<div class="col_one_fourth nobottommargin">
					<div class="feature-box fbox-center fbox-plain nobottomborder">
							<div class="fbox-icon">
								<a href="prise-en-charge-transport-medicalise--4--prise-en-charge"><img src="images/icons/service-1.png" alt="Icon" data-animate="zoomIn"></a>
							</div>
						<p>Pour les transports urgents de soins intensifs et de réanimation, cette cellule médicalisée est capable d’accueillir toute une équipe médicale (médecin, infirmiers, ambulanciers supplémentaires).</p>
					</div>
				</div>

				<div class="col_one_fourth nobottommargin">
					<div class="feature-box fbox-center fbox-plain nobottomborder">
							<div class="fbox-icon">
								<a href="prise-en-charge-transport-non-medicalise--5--prise-en-charge"><img src="images/icons/service-2.png" alt="Icon" data-animate="zoomIn" data-delay="200"></a>
							</div>
						<p>Ce service d’ambulance assure les transports non urgents pour personnes nécessitant un brancard.</p>
					</div>
				</div>

				<div class="col_one_fourth nobottommargin">
					<div class="feature-box fbox-center fbox-plain nobottomborder">
							<div class="fbox-icon">
								<a href="prise-en-charge-transport-vsl--6--prise-en-charge"><img src="images/icons/service-3.png" alt="Icon" data-animate="zoomIn" data-delay="400"></a>
							</div>
						<p>Ce type de transport permet aux personnes valides ou à mobilité réduite de se déplacer selon leurs besoins grâce à des véhicules adaptés.</p>
					</div>
				</div>

				<div class="col_one_fourth nobottommargin col_last">
					<div class="feature-box fbox-center fbox-plain nobottomborder">
							<div class="fbox-icon">
								<a href="prise-en-charge-hospitalisation-mouscron--136--prise-en-charge"><img src="images/icons/service-4.png" alt="Icon" data-animate="zoomIn" data-delay="600"></a>
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
		
		<div class="section nobg nobottommargin notopmargin">
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
					<a href="prise-en-charge-transport-hopital--3--prise-en-charge" class="button button-border button-large button-rounded topmargin-sm noleftmargin">Notre priorité : le patient</a>
				</div>
				
				<?php } ?>

			</div>
		</div>

		<div class="section nobg notopmargin noborder nobottommargin nobottompadding notoppadding">
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
					<a href="prise-en-charge-transport-hopital--3--prise-en-charge" class="button button-border button-large button-rounded topmargin-sm noleftmargin">Notre priorité : le patient</a>
				</div>

				<?php } ?>

			</div>
		</div>
		
	</div>
	</section>