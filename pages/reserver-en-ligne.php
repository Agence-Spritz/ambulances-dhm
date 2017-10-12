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
			<span>24/24 & 7j/7 - 056 345 411</span>
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
				
				<!-- Postcontent
					============================================= -->
					<div class="contact-widget bottommargin">
						
						<div class="contact-form-result"></div>
					
					<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail-resa.php" method="post">

						<div class="form-process"></div>

						<h3><?php echo $titrep; ?></h3>
						
						<p><?php echo $textep; ?></p>
						
						<div class="col_half contact-widget">
							
							<div class="fancy-title title-bottom-border">
								<h4>Vos informations</h4>
							</div>

								<div class="col_one_third">
									<label for="visiteur_nom">Nom <small>*</small></label>
									<input type="text" id="visiteur_nom" name="visiteur_nom" value="" class="sm-form-control required" />
								</div>

								<div class="col_one_third ">
									<label for="visiteur_prenom">Prénom</label>
									<input type="text" id="visiteur_prenom" name="visiteur_prenom" value="" class="sm-form-control" />
								</div>
								
								<div class="col_one_third col_last">
									<label for="visiteur_email">Email <small>*</small></label>
									<input type="email" id="visiteur_email" name="visiteur_email" value="" class="required email sm-form-control" />
								</div>

								<div class="clear"></div>

								<div class="col_half">
									<label for="visiteur_tel">Téléphone <small>*</small></label>
									<input type="text" id="visiteur_tel" name="visiteur_tel" value="" class="required sm-form-control" />
								</div>
								<div class="col_half col_last">
									<label for="visiteur_entreprise">Entreprise ou établissement</label>
									<input type="text" id="visiteur_entreprise" name="visiteur_entreprise" value="" class=" sm-form-control" />
								</div>

								<div class="clear"></div>
						</div>
						
						<div class="col_half col_last contact-widget">
							
							<div class="fancy-title title-bottom-border">
								<h4>La personne à transporter</h4>
							</div>

								<div class="col_half">
									<label for="transp_nom">Nom <small>*</small></label>
									<input type="text" id="transp_nom" name="transp_nom" value="" class="sm-form-control required" />
								</div>

								<div class="col_half col_last">
									<label for="transp_prenom">Prénom</label>
									<input type="text" id="transp_prenom" name="transp_prenom" value="" class="sm-form-control" />
								</div>

								<div class="col_full travel-date-group">
									<label for="transp_datenaissance">Date de naissance</label>
									<div class="input-group">
									<input type="text" id="transp_datenaissance" name="transp_datenaissance" value="" class="sm-form-control tleft past-enabled" placeholder="JJ/MM/AAAA" />
										<span class="input-group-addon" style="padding: 9px 12px;">
											<i class="icon-calendar2"></i>
										</span>
									</div>
								</div>

								<div class="clear"></div>

						</div>
						<div class="clear"></div>
						
						<div class="col_full contact-widget travel-date-group">
							
							<div class="fancy-title title-bottom-border">
								<h4>Votre réservation</h4>
							</div>

								<div class="col_half">
									<label for="res_type">Type de transport <small>*</small></label>
									<select class="select-1 form-control" name="res_type" id="res_type">
											<option value="Personne valide">Personne valide</option>
											<option value="Personne avec sa propre chaise roulante">Personne avec sa propre chaise roulante</option>
											<option value="Personne en chaise roulante  + apporter une chaise roulante">Personne en chaise roulante  + apporter une chaise roulante</option>
											<option value="Personne couchée">Personne couchée</option>
									</select>
								</div>

								<div class="col_half col_last">
									<label for="res_choix">Choix <small>*</small></label>
									<select class="select-1 form-control" name="res_choix" id="res_choix">
											<option value="Aller simple">Aller simple</option>
											<option value="Aller / retour">Aller / retour</option>
									</select>
								</div>
								
								<div class="clear"></div>
								
								<div class="col_half">
									<div class="fancy-title">
										<h4 style="color: #f5e212;">Aller</h4>
									</div>
									
									<label for="res_adresse_depart">Adresse départ <small>*</small></label>
									<input type="text" id="res_adresse_depart" name="res_adresse_depart" value="" class="sm-form-control required" />
									
								</div>

								<div class="col_half col_last">
									<div class="fancy-title">
										<h4 style="color: #f5e212;">Retour</h4>
									</div>
									
									<label for="res_date_depart_retour">Date de départ <small>*</small></label>
									<div class="input-group">
									<input type="text" id="res_date_depart_retour" name="res_date_depart_retour" value="" class="required sm-form-control tleft past-enabled" placeholder="JJ/MM/AAAA" />
										<span class="input-group-addon" style="padding: 9px 12px;">
											<i class="icon-calendar2"></i>
										</span>
									</div>
								</div>
								
								<div class="col_half">
									<label for="res_adresse_destination">Adresse de destination <small>*</small></label>
									<input type="text" id="res_adresse_destination" name="res_adresse_destination" value="" class="sm-form-control required" />
									
								</div>

								<div class="col_half col_last">
									<label for="res_heure_depart_retour">Heure de départ <small>*</small></label>
									<div class="input-group date">
									<input type="text" id="res_heure_depart_retour" class="tleft sm-form-control datetimepicker1" name="res_heure_depart_retour" value="" placeholder="00:00 AM/PM"/>
									<span class="input-group-addon">
											<span class="icon-clock"></span>
									</span>
									</div>
								</div>
								
								<div class="col_half">
									<label for="res_date_depart_aller">Date de départ <small>*</small></label>
									<div class="input-group">
									<input type="text" id="res_date_depart_aller" name="res_date_depart_aller" value="" class="sm-form-control required tleft past-enabled" placeholder="JJ/MM/AAAA" />
										<span class="input-group-addon" style="padding: 9px 12px;">
											<i class="icon-calendar2"></i>
										</span>
									</div>
								</div>
								<div class="col_half col_last"></div>
								
								<div class="col_half">
								<label for="res_heure_depart_aller">Heure de départ <small>*</small></label>
									<div class="input-group date">
									<input type="text" id="res_heure_depart_aller" class="tleft sm-form-control datetimepicker1" name="res_heure_depart_aller" value="" placeholder="00:00 AM/PM"/>
									<span class="input-group-addon">
											<span class="icon-clock"></span>
									</span>
									</div>
								</div>
								<div class="col_half col_last"></div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="commentaire">Informations complémentaires</label>
									<textarea class="sm-form-control" id="commentaire" name="commentaire" rows="6" cols="30"></textarea>
								</div>

								<div class="col_full">
										<input id="check_cgv" class="checkbox-style" name="check_cgv" type="checkbox" >
										<label for="check_cgv" class="checkbox-style-3-label">J'ai lu et j'accepte les <a href="/images/cgv.pdf" target="_blank" title="Conditions générales de vente">Conditions générales de vente</a></label>
								</div>
								
								<div class="col_full">
									<button class="button button-3d nomargin" type="submit" id="submit" name="submit" value="submit">Envoyer</button>
								</div>
								
								

						</div>

					</form>
					</div><!-- .postcontent end -->

				</div>
		</div>
	</section>	