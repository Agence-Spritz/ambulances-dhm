<!-- PAGE CONTENU
================================================== -->
<?	// CONTENU
	list($titrep, $textep, $texte2p) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,texte,texte2 FROM ".$table_prefix."_pages WHERE page='page' AND ID='$id' "));
	$titred = preg_replace('/##PRIXTITRE##/',$prixtitre,trim($titred));
	$titred = preg_replace('/##PRIXTITRE2##/',$prixtitre2,trim($titred));
?>





		<!-- TITRE
		============================================= -->
		<section id="page-title" style="">

			<div class="container clearfix ">
				<h1>Contact &amp; Plan</h1>
				<span>Pour toute demande urgente, nous vous conseillons de privilégier le contact par téléphone au :</span> 
				
				<div class="col_half nobottommargin" style="margin-top: 25px;">
					<b><i style="margin-right: 10px;" class="fa fa-phone-square" aria-hidden="true"></i>056 345 411</b><br />
					<b><i style="margin-right: 10px;" class="fa fa-phone-square" aria-hidden="true"></i>+32 56 345 411</b> (pour les appels émis depuis la France)
					<br /><br />
					<ul>
						<li style="list-style: none;">Le service ambulances est disponible <strong>7 jours/7 24h/24</strong></li>
						<li style="list-style: none;">Le service de facturation est <strong>ouvert du lundi au vendredi de 9h à 15h</strong></li>
					</ul>
				</div>
				
				<div class="col_half col_last nobottommargin" style="margin-top: 25px;">
					<strong>Tapez :</strong>
					<ol style="margin-top: 15px;">
						<li>pour un transport rapide ou dans la journée.</li>
				        <li>pour une réservation de transport.</li>
						<li>pour le secrétariat ou le service facturation.</li>
				        <li>pour les patients dialysés.</li>
					</ol>
				</div>
				
			</div>

		</section><!-- #page-title end -->

		<!-- CARTE
		============================================= -->
		<section id="google-map" class="gmap slider-parallax"></section>



	<section id="content">

		<div class="content-wrap">
			
			<div class="container clearfix">
				
				<!-- FORMULAIRE
				============================================= -->
				<div class="col_half nobottommargin">

					<div class="heading-block fancy-title nobottomborder title-bottom-border">
						<h4>Nous contacter</h4>
						
					</div>

					<div class="contact-widget">

						<div class="contact-form-result"></div>

						<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

							<div class="form-process"></div>

							<div class="col_one_third">
								<label for="template-contactform-name">Nom, pr&Eacute;nom <small>*</small></label>
								<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
							</div>

							<div class="col_one_third">
								<label for="template-contactform-email">Email <small>*</small></label>
								<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
							</div>

							<div class="col_one_third col_last">
								<label for="template-contactform-phone">T&eacute;l&eacute;phone </label>
								<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control required" />
							</div>

							<div class="clear"></div>

							<div class="col_full">
								<label for="template-contactform-subject">Objet du message <small>*</small></label>
								<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
							</div>

<!--
							<div class="col_one_third col_last">
								<label for="template-contactform-service">Services</label>
								<select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
									<option value="">-- Concerne --</option>
									<option value="Le ménage">Le ménage</option>
									<option value="Le repassage">Le repassage</option>
									<option value="La couture">La couture</option>
									<option value="Autre">Autre</option>
								</select>
							</div>
-->

							<div class="clear"></div>

							<div class="col_full">
								<label for="template-contactform-message">Votre message <small>*</small></label>
								<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
							</div>

							<!--<div class="col_full hidden">
								<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
							</div>-->

							<div class="col_full">
								<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Envoyer</button>
							</div>

						</form>
					</div>

				</div><!-- .postcontent end -->
				
				<div class="col_half nobottommargin col_last">
					<div class="heading-block fancy-title nobottomborder title-bottom-border">
						<h4>Nous trouver</h4>
					</div>
					
					<h5>Ambulances DHM</h5>
					<span>	Rue du Nouveau Monde 106<br />
							7700 Mouscron<br />
							Belgique<br /><br />
							
							<strong>email :</strong> <a href="mailto:danny@ambulancesdhm.be">danny@ambulancesdhm.be</a>
					</span>
				</div>

				<!-- COORDONNEES
				============================================= -->
				<div class="nobottommargin" style="clear:both; width:100%">
					<address>
						<?=$coordonnees?>
					</address>
				</div><!-- .sidebar end -->

			</div>

		</div>

	</section>
        
                
                