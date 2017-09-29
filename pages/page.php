<!-- PAGE CONTENU
================================================== -->
<?	// CONTENU
	list($titrep, $textep, $texte2p) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,texte,texte2 FROM ".$table_prefix."_pages WHERE page='page' AND ID='$id' "));
	$titred = preg_replace('/##PRIXTITRE##/',$prixtitre,trim($titred));
	$titred = preg_replace('/##PRIXTITRE2##/',$prixtitre2,trim($titred));
?>
		<!-- Page Title
		============================================= -->
		<section id="page-title" class=" page-title-dark" style="min-height:390px; margin-top:-20px; padding: 60px 0; background-image: url('images/pages-ambulance-mouscron-transport-hopital/<?=$id?>.jpg'); background-size: cover; background-position: center center;">
			<div class="container clearfix">
				<h1 style="font-family:'Shadows Into Light'" align="center"><?=$titrep?></h1>
                <h1 align="center"><i class="fa fa-phone"></i> 056 33 51 10</h1>
				<?php if ($id>=3 && $id<=5) {?><div align="center"><br /><img src="images/label.png"></div><?php } ?>
			</div>
		</section>

                              
		<div class="section" style="margin-top:-50px; margin-bottom:-50px;" align="justify">
				<h4 class="uppercase center"><?=$titrep?></h4>

				<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide">
									<div class="">
										<?=$texte2p?><?=$textep?>
									</div>
								</div>
							</div>
						</div>
				</div>
		</div>
        
        <!-- Form Recrutement
		============================================= -->
		<?php if ($id==6) {?><section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<!-- FORMULAIRE
					============================================= -->
					<div class="postcontent nobottommargin">

						<h3>Formulaire de recrutement</h3>

						<div class="contact-widget">

							<div class="contact-form-result"></div>

							<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail2.php" method="post">

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

								<div class="col_one_third">
									<label for="template-contactform-subject">Ville <small>*</small></label>
									<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="template-contactform-ref">R&eacute;f&eacute;rences <small>*</small></label>
									<textarea class="required sm-form-control" id="template-contactform-ref" name="template-contactform-ref" rows="3" cols="30"></textarea>
								</div>
                                
								<div class="col_full">
									<label for="template-contactform-exp">Exp&eacute;riences <small>*</small></label>
									<textarea class="required sm-form-control" id="template-contactform-exp" name="template-contactform-exp" rows="3" cols="30"></textarea>
								</div>
                                
								<div class="col_full">
									<label for="template-contactform-message">Remarques <small>*</small></label>
									<textarea class="sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="3" cols="30"></textarea>
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
<?php } ?>
                


            
			
