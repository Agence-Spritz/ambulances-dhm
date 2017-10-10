<!-- PAGE CONTENU
================================================== -->
<?	// CONTENU
	list($titrep, $textep, $texte2p) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,texte,texte2 FROM ".$table_prefix."_pages WHERE page='page' AND ID='$id' "));
	$titred = preg_replace('/##PRIXTITRE##/',$prixtitre,trim($titred));
	$titred = preg_replace('/##PRIXTITRE2##/',$prixtitre2,trim($titred));
?>
		
		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark" style="position: relative; background-image: url('images/pages-ambulance-mouscron-transport-hopital/<?=$id?>.jpg'); padding: 120px 0; background-size: cover; background-position: center center;" data-stellar-background-ratio="0.3">
		<div class="banner-overlay"></div>
			<div class="container clearfix">
				<h1><?php echo $titrep; ?></h1>
				<span>Une prise en charge de qualité en toute circonstance</span>
				<ol class="breadcrumb" style="position: relative !important; left: 0 !important; margin: 30px auto 0 auto !important; ">
					<li><a href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
					<li class="active"><?php echo $titrep; ?></li>
				</ol>
			</div>

		</section><!-- #page-title end -->

                              
		<!-- Content
	============================================= -->
	<!-- Content
	============================================= -->
	<section id="content">

		<div class="content-wrap nobottompadding">
			
			<div class="container clearfix">
				<div class="col_one_third">

					<div class="heading-block fancy-title nobottomborder title-bottom-border">
						<h4>Certification <span>&</span> agrément</h4>
					</div>

					<p>Notre métier nécessite de répondre de manière particulièrement rigoureuses à différentes normes et exigences.<br />
						Dans ce sens, Ambulances <strong>DHM est agrée</strong> par la région wallonne <strong>depuis 2007</strong> suivant le décret du 29 avril 2004 relatif à l’organisation du transport médico-sanitaire.<br />
						Notre cellule médicale est conforme aux normes européennes <strong>DIN EN 1789</strong> et <strong>DIN EN 1865</strong>.
					</p>

				</div>

				<div class="col_one_third">

					<div class="heading-block fancy-title nobottomborder title-bottom-border">
						<h4>Valeurs <span>&</span> engagements</h4>
					</div>

					<p>Ambulances DHM participe activement à la prise en charge de la douleur et respecte l’intégrité physique, la pudeur, la dignité ainsi que le confort de la personne prise en charge. <br />
						
						<br />
						La raison d'être de nos services est de garantir aux citoyennes et citoyens une prise en charge pré-hospitalière de qualité en nous souciant en permanence des besoins et attentes de chacun.
					</p>

				</div>

				<div class="col_one_third col_last">

					<div class="heading-block fancy-title nobottomborder title-bottom-border">
						<h4>Hygiène <span>&</span> sécurité</h4>
					</div>

					<p>Ambulances DHM met un point d’honneur sur l’hygiène et la désinfection des véhicules et du matériel divers. L’application de nos protocoles de nettoyage et de désinfection est systématique entre chaque patient. <br />
						Le lavage ou la désinfection hydro-alcoolique des mains de nos équipes est systématique car il est de notre devoir de prévenir la propagation des infections en tout genre. La literie est à usage unique.
						
					</p>

				</div>
			</div>
			
				<div class="section nomargin">
					<div class="container clearfix">

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
							<i class="i-plain i-xlarge divcenter icon-calendar"></i>
							<div class="counter counter-lined"><span data-from="100" data-to="10" data-refresh-interval="50" data-speed="2000"></span>ans+</div>
							<h5>10 ans d'existence</h5>
						</div>
						
						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-ambulance"></i>
							<div class="counter counter-lined"><span data-from="10" data-to="9" data-refresh-interval="25" data-speed="3500"></span></div>
							<h5>9 véhicules équipés</h5>
						</div>
						
						<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-male"></i>
							<div class="counter counter-lined"><span data-from="60" data-to="20000" data-refresh-interval="30" data-speed="2700"></span>+</div>
							<h5>20.000 transports/an</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-dashboard"></i>
							<div class="counter counter-lined"><span data-from="3000" data-to="250000" data-refresh-interval="100" data-speed="2500"></span>km+</div>
							<h5>250.000 km/an</h5>
						</div>

						

						

					</div>
				</div>
			
				<div class="row common-height clearfix">

					<div class="col-sm-5 col-padding" style="background: url(<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$id.'-1.jpg'; ?>) center center no-repeat; background-size: cover;"></div>

					<div class="col-sm-7 col-padding">
						<div>
							<div class="heading-block">
								
								<h3>Les ambulances DHM</h3>
								<span class="before-heading color">en quelques chiffres</span>
							</div>

							<div class="row clearfix">
								<div class="col-md-6">
									<p>Nous garantissons aux patients une prise en charge pré-hospitalière de qualité tout en nous souciant en permanence des besoins et attentes de chacun.</p>
								</div>
								<div class="col-md-6">
									<ul class="skills">
										<li data-percent="80">
											<span>Collaborateurs</span>
											<div class="progress">
												<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="14" data-refresh-interval="30" data-speed="1100"></span></div></div>
											</div>
										</li>
										<li data-percent="60">
											<span>Maisons de repos</span>
											<div class="progress">
												<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="52" data-refresh-interval="30" data-speed="1100"></span></div></div>
											</div>
										</li>
										<li data-percent="90">
											<span>Clients privés</span>
											<div class="progress">
												<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="1700" data-refresh-interval="30" data-speed="1100"></span></div></div>
											</div>
										</li>
										<li data-percent="70">
											<span>Mutuelles et hopitaux</span>
											<div class="progress">
												<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="7" data-refresh-interval="30" data-speed="1100"></span></div></div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<div class="row common-height clearfix">

					<div class="col-sm-7 col-padding" style="background-color: #F5F5F5;">
						<div>
							<div class="heading-block">
								
								<h3>La qualité</h3>
								<span class="before-heading color">Une exigence permanente</span>
							</div>

							<div class="row clearfix">

								<div class="col-md-12">
									<p><?php echo $textep; ?></p>
								</div>

								

							</div>

						</div>
					</div>

					<div class="col-sm-5 col-padding" style="background: url(<?php echo './images/pages-ambulance-mouscron-transport-hopital/'.$id.'-2.jpg'; ?>) center center no-repeat; background-size: cover;"></div>

				</div>
				
				
			
			
		</div>
	</section>		
        
                       


            
			
