					<!-- 3 SERVICES
					============================================= -->
                    <div class="col_one_third ">
						<div class="feature-box media-box">
							<a href="femme-de-menage-mouscron-titres-services--3--page">
                            <div class="fbox-media">
								<img src="images/home1.jpg" title="Trouver une femme de m&eacute;nage &agrave; Mouscron" alt="<?=$titre?>. <?=$description?>.">
							</div>
							<div class="fbox-desc">
								<h3>Besoin d'une aide m&eacute;nag&egrave;re<span class="subtitle">Pourquoi nous choisir?</span></h3>
								<p>Nous mettons tout en &oelig;uvre pour obtenir un travail de qualit&eacute; et nous suivons de pr&egrave;s le travail de notre personnel. Vous souhaitez un/une aide-m&eacute;nager(&egrave;re) toutes les semaines ou tous les 15 jours ? Appelez-nous et nous nous occupons du reste. </p>
							</div>
                            </a>
						</div>
					</div>

					<div class="col_one_third nobottommargin">
						<div class="feature-box media-box">
							<a href="repassage-chemise-pantallon-herseaux-titres-services--4--page">
                            <div class="fbox-media">
								<img src="images/home2.jpg" title="Repasser son linge &agrave; Mouscron" alt="<?=$description?>. <?=$keywords?>.">
							</div>
							<div class="fbox-desc">
								<h3>Repasser son linge<span class="subtitle">Une vraie corv&eacute;e!</span></h3>
								<p>Nous vous proposons &eacute;galement un service de repassage en centrale professionnelle. Le principe est simple : vous venez d&eacute;poser votre linge et vous le r&eacute;cup&eacute;rez 48h plus tard.</p>
							</div>
                            </a>
						</div>
					</div>

					<div class="col_one_third nobottommargin col_last">
						<div class="feature-box media-box">
							<a href="couturiere-reparation-vetement-dottignies--5--page">
                            <div class="fbox-media">
								<img src="images/home3.jpg" title="Des petits travaux de couture &agrave; Mouscron?" alt="<?=$keywords?>. <?=$titre?>.">
							</div>
							<div class="fbox-desc">
								<h3>Mince j'ai craqu&eacute; mon pantallon<span class="subtitle">Petits travaux de couture facile.</span></h3>
								<p>Bouton en perdition, tirette part en sucette, mon bonnet est craqu&eacute;! <b>Pourquoi jeter quand on peut r&eacute;parer?</b> Notre service de couture vous aide &agrave; devenir plus &Eacute;conome.</p>
							</div>
                            </a>
						</div>
					</div>

					<div class="clear"></div>
                    
				</div>

	<?php if($services!=1) { ?>
				<!-- BLOG LAST
                ============================================= -->
                <?php	// BLOG
                list($IDb,$titreb, $texteb, $soustitre) = mysqli_fetch_array(mysqli_query($link, "SELECT ID,titre,texte,rub FROM ".$table_prefix."_pages WHERE page='blog' AND masquer!=1 ORDER BY dbu DESC LIMIT 0,1 "));
                ?>
				<div class="section nobg topmargin-lg nobottommargin">
                    <div class="container clearfix">
                        <div class="col_half nobottommargin center">
                            <img src="images/pages-ambulance-mouscron-transport-hopital/<?=$IDb?>.jpg" alt="<?=$titreb?>. <?=$soustitreb?>" data-animate="fadeInLeft">
                        </div>
    
                        <div class="col_half nobottommargin col_last">
                                <div class="heading-block" >
                                    <h2><?=$titreb?></h2>
                                    <span ><?=$soustitreb?></span>
                                </div>
                                <?=cleanCut(strip_tags($texteb),250)?><br />
                                <a href="<?=rewrite($titreb)?>--<?=$IDb?>--blog" class="button button-border button-large button-rounded topmargin-sm noleftmargin">Lire la suite</a>
                        </div>
    
                    </div>
                </div>
                
                <!-- VIDEO EDITO
                ============================================= -->
                <?php	// CONTENU
                list($titree, $textee, $texte2e) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,texte,texte2 FROM ".$table_prefix."_pages WHERE page='page' AND ID='2' "));
                ?>

				<div class="section dark bottommargin-lg" style="height: 500px;">
					
					<div class="container center clearfix vertical-middle">
                    	<a href="vous-tomberez-amoureux-mouscron--2--page">
                            <i class="i-plain i-xlarge icon-heart divcenter bottommargin"></i>
    
                            <div class="slider-caption slider-caption-center" style="margin-top:-40px">
                                <h3 data-animate="fadeInUp" style="font-size:40px"><?=$titree?></h3>
                                <p data-animate="fadeInUp" data-delay="200" ><?=$textee?></p>
                            </div>
                    	</a>
					</div>
                    
					<div class="video-wrap">
						<video poster="images/videos/home-video.jpg" preload="auto" loop autoplay muted>
							<source src='images/videos/home-video.mp4' type='video/mp4' />
							<!--<source src='images/videos/explore.webm' type='video/webm' />-->
						</video>
						<div class="video-overlay" style="background-color: rgba(0,0,0,0.35);"></div>
					</div>

				</div>
	<?php } ?>
			<div class="container clearfix">	

