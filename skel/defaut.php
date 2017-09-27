<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<?php include ("inc/meta.php"); ?>

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light|Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/layers.css">
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/navigation.css">


	<style>
		.revo-slider-emphasis-text {
			font-size: 64px;
			font-weight: 700;
			letter-spacing: -1px;
			font-family: 'Raleway', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Lato', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Raleway', sans-serif;
		}
		.tp-video-play-button { display: none !important; }

		.tp-caption { white-space: nowrap; }
	</style>
    
    <!-- GOOGLE ANALYTICS -->
	<?	list($script_google, $nom_titre_meta, $url_site, $coordonnees) = mysqli_fetch_array(mysqli_query($link, "SELECT google_stats,nom_titre_meta,url_site,coordonnees FROM ".$table_prefix."_divers WHERE ID=1 "));
        echo ("$script_google"); 
    ?>
</head>

<body class="stretched no-transition"> <!-- no-transition Masque les transition de page lente !-->
	<div id="wrapper" class="clearfix">
		
		<?php if ($pg=="accueil-menage-repassage-couture-mouscron" && $services!=1){ ?>
		<section id="slider" class="slider-parallax revslider-wrap full-screen clearfix">
			
            <!--
			#################################
				- DIAPO HOME -
			#################################
			-->
			<div class="tp-banner-container">
            	<!-- Logo slide  -->
                <div style="position: absolute; margin:30px 0 0 10px; width:100%; z-index:9999">
                	<a href="tel:+3256335110">
                    	<img src="images/logo-mss-mouscron.png" style="max-width:233px; max-height:233px; width:50%; border-radius:5px;">
                		<br /><h2 style="font-family:'Lato'; color:#FFF; text-shadow:2px 2px #000; margin-left:30px"> 056 33 51 10 </h2>
                    </a>
                    
					<!-- BOut Descendre  -->
                    <div style="margin:10px 0 0 70px; width:100%" >
                    <a href="#bas">
						<img src="images/accueil-fleche.png" style="width:25%; max-width:100px">
                    </a>
                    </div>
                </div>

                <div class="tp-banner" >
					<ul>
						<?php 
						$Qmd=mysqli_query($link, "SELECT ID, titre,rub,texte,texte2 FROM ".$table_prefix."_pages WHERE page='diapo' AND masquer!=1 ORDER BY dbu DESC LIMIT 0,5");
						while (list($IDd,$titred,$liend,$texted,$introd) = mysqli_fetch_array($Qmd)){
						?>    <!-- SLIDE  -->
						<li class="dark" data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDd?>.jpg" data-delay="7000"  data-saveperformance="off" data-title="<?=$titred?>">
							<!-- MAIN IMAGE -->
							<img src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDd?>.jpg" title="MSS mouscron" alt="<?=$titre?>. <?=$description?>. <?=$keywords?>."  data-bgposition="left center" data-kenburns="on" data-duration="8000" data-ease="Linear.easeNone" data-scalestart="130" data-scaleend="100" data-bgpositionend="right center">
							<!-- LAYERS -->

							<!-- LAYER NR. 2 -->
							<div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
							data-x="400"
							data-y="215"
							data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1000"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3;"><?=$introd?></div>

							<div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
							data-x="397"
							data-y="230"
							data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1200"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3; font-size: 60px;"><?=$titred?></div>

							<div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
							data-x="400"
							data-y="340"
							data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1400"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3; max-width: 550px; white-space: normal;"><?=$texted?></div>

							<?php if($liend) {?>
                            <div class="tp-caption customin ltl tp-resizeme"
							data-x="400"
							data-y="450"
							data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1550"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="<?=$liend?>" class="button button-white button-light button-border button-large button-rounded tright nomargin"><span><i class="icon-plus"></i> d'Info</span> <i class="icon-angle-right"></i></a></div>
							<?php } ?>
                            
						</li>
                        <?php } ?>
					</ul>
				</div>
			</div>
		</section>
		<?php } ?>

		<!-- Header
		============================================= -->
        <a id="bas"></a>
        <header id="header">
			<div id="header-wrap">
				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- LOGO
					============================================= -->
					<div id="logo">
						<a href="tel:+3256335110" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo-mss.png" title="Retour &agrave; l'accueil" alt="<?=$titre?>"></a>
						<a href="tel:+3256335110" class="retina-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo-mss.png" title="Retour &agrave; l'accueil" alt="<?=$titre?>"></a>
                    </div>

					<!-- MENU TOP
					============================================= -->
					<nav id="primary-menu" class="style-5">

						<ul class="norightborder norightpadding norightmargin">
							<li class="<?=($pg=='accueil-menage-repassage-couture-mouscron')?('current'):('')?>"><a href="accueil-menage-repassage-couture-mouscron.php"><div><i class="icon-home2" ></i> Accueil</div></a></li>		
							<li class="<?=($pg=='page' && $id>=3 && $id<=5)?('current'):('')?>"><a href="accueil-menage-repassage-couture-mouscron.php?services=1"><div><i class="icon-home" ></i> Services</div></a>
								<ul>
									<li><a href="femme-de-menage-mouscron-titres-services--3--page"><div>Ménage</div></a></li>
									<li><a href="repassage-chemise-pantallon-herseaux-titres-services--4--page"><div>Repassage</div></a></li>
									<li><a href="couturiere-reparation-vetement-dottignies--5--page"><div>Petit travaux de couture</div></a></li>
								</ul>
							</li>
							<li class="<?=($pg=='blog')?('current'):('')?>"><a href="titres-services-mouscron-herseaux-dottignies--blog"><div><i class="icon-comment"></i>Blog</div></a>
								<ul>
                                	<?php 
									$Qmb=mysqli_query($link, "SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='blog' AND masquer!=1 ORDER BY dbu DESC LIMIT 0,5 ");
									while (list($IDmb,$titremb)=mysqli_fetch_array($Qmb)){
									?>
									<li><a href="<?=rewrite($titremb)?>--<?=$IDmb?>--blog"><div><?=cleanCut($titremb,80,'...')?></div></a></li>
                                    <?php } ?>
								</ul>
                            </li>
							<li class="<?=($pg=='photo')?('current'):('')?>"><a href="titres-services-mouscron-luingne-herseaux-dottignies--photo"><div><i class="icon-camera"></i>Photos</div></a></li>
							<li class="<?=($pg=='job')?('current'):('')?>"><a href="job-recrutement-emploi-mouscron-non-qualifie--6--page"><div><i class="icon-users"></i>Job?</div></a></li>
                            <li class="<?=($pg=='lien')?('current'):('')?>"><a href="trouver-un-travail-a-mouscron--lien"><div><i class="icon-link"></i>Liens</div></a></li>
							<li class="<?=($pg=='contact')?('current'):('')?>"><a href="contacter-bonne-femme-de-menage-serieuse--contact"><div><i class="icon-envelope"></i>Contact</div></a></li>
						</ul>

					</nav>

				</div>
			</div>
		</header>

		<div class="clear"></div>

		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
				
				<?php include ("pages/".$pg.".php"); ?>

                <!-- HORAIRES COORD PHOTOS
                ============================================= -->
                <div class="container clearfix">
                    <!--Horaires -->
                    <div class="col_one_fourth nobottommargin">
                        <div class="fancy-title title-border">
                            <h4>Horaires</h4>
                        </div>
                        <p>Le centre de repassage est ouvert du lundi au vendredi de 7h à 18h non-stop ainsi que le samedi matin de 9h à 12h. Nos bureaux sont ouverts du lundi au vendredi de 7h30 à 18h non-stop.</p>
                        <a href="#" class="button button-rounded button-dark noleftmargin"><i class="icon-envelope"></i> Envoyer un Email</a>
                    </div>
                    
                    <!--Coordonnées -->
                    <div class="col_one_fourth nobottommargin">
                        <div class="fancy-title title-border">
                            <h4>Coordonn&eacute;es</h4>
                        </div>
                        <p>Boulevard industriel, 86 - Rond-point du centre commercial 'Les Dauphins', 7700 Mouscron BELGIQUE</p>
                        <ul class="iconlist nobottommargin">
                            <li><i class="icon-phone color"></i> <strong><a href="tel=+3256335110">Tel:</strong> 056 33 51 10</a></li>
                            <li><i class="icon-print"></i> <strong>Fax:</strong> 056 33 18 10</li>
                            <li><i class="icon-certificate"></i> <strong>N° agrément TS:</strong> 03092</li>
                            <li><i class="icon-briefcase"></i> <strong>N° entreprise:</strong> 0895 711 955</li>
                        </ul>
                    </div>
                
                    <!--Photos -->
                    <div class="col_half nobottommargin col_last">
                        <div class="fancy-title title-border">
                            <h4>Galerie</h4>
                        </div>
    
                        <div class="masonry-thumbs col-4 clearfix" data-lightbox="gallery" style="width: 100.3%;">
							<?php 
							$Qmb=mysqli_query($link, "SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='photo' AND masquer!=1 ORDER BY rand() DESC LIMIT 0,10 "); $delayP=0; $n=0;
							while (list($IDp,$titrep)=mysqli_fetch_array($Qmb)){
								$delayP=$delayP+100;
								list($width, $height, $type) = getimagesize("images/pages-femme-menage-mouscron-repassage-herseaux/".$IDp."-v.jpg");
								if ($width>$height) { $n++;
									if ($n<=6) {
							?>
                                        <a href="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>-v.jpg" alt="<?=$titrep?>" data-animate="zoomIn" data-delay="<?=$delayP?>" ></a>
                            <?php }}} ?>
                            <a href="titres-services-mouscron-luingne-herseaux-dottignies--photo"><img class="image_fade" src="images/photo.jpg" data-animate="zoomIn" data-delay="800" style="height:90px"></a>
                        </div>
                    </div>
                </div>

        	</div>
      	</section>
        
		<!-- Footer
		============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						&copy; <?=date("Y")?> <?=$nom_titre_meta?>, <a href="http://www.creationdesites.net" target="_blank" title="Cr&eacute;ation de site Mouscron">Création de site Remix Web <span class="creationdesite"></span></a>
						<br />
                        <div class="copyright-links"><a href="mentions-mouscron-solidarite-services--1--page">Mentions</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&t=<?=$ogtitre?>" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="http://twitter.com/intent/tweet/?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&text=<?=$ogtitre?>" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="https://plus.google.com/share?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&hl=<?=$ogtitre?>" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="https://pinterest.com/pin/create/button/?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&media=<?=$ogimg?>&description=<?=$ogtitre?>" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&title=<?=$ogtitre?>" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FMouscron-Solidarit%25C3%25A9-Services-125248857502208&width=86&layout=button_count&action=like&size=small&show_faces=true&share=false&height=21&appId=235382260148315" width="100" height="21" style="margin-top:5px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>

						<div class="clear"></div>

					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

	<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
	<script type="text/javascript" src="include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

	<?php
    if ($pg=="contact") {
	?>
    <!-- MAP
	============================================= -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBcJ0hW-VLXMvoeeCQa1thQEba_VxeeUDM&exp&sensor=false&libraries=places"></script>
	<script type="text/javascript" src="js/jquery.gmap.js"></script>
	<script type="text/javascript">

		$('#google-map').gMap({

			address: 'Boulevard+Industriel+86,+7700+Mouscron,+Belgique',
			
			maptype: 'ROADMAP',
			zoom: 14,
			markers: [
				{
					address: "Boulevard+Industriel+86,+7700+Mouscron,+Belgique",
					html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">MSS<span>Mouscron</span></h4><p class="nobottommargin"><strong>Centre de repassage</strong><br />Boulevard Industriel 86, 7700 Mouscron<br /><strong>056 33 51 10</strong>.</p></div>',
					icon: {
						image: "images/icons/map-icon-red.png",
						iconsize: [32, 39],
						iconanchor: [13,39]
					}
				}
			],
			doubleclickzoom: false,
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false
			}
		});

	</script>
    <?php } ?>
    
    <?php
    if ($pg=="accueil-menage-repassage-couture-mouscron") {
	?>
	<script type="text/javascript">

		var tpj=jQuery;
		tpj.noConflict();

		tpj(document).ready(function() {

			var apiRevoSlider = tpj('.tp-banner').show().revolution(
			{
				sliderType:"standard",
				jsFileLocation:"include/rs-plugin/js/",
				dottedOverlay:"none",
				delay:16000,
				startwidth:1140,
				startheight:600,
				hideThumbs:200,

				thumbWidth:100,
				thumbHeight:50,
				thumbAmount:5,

				navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    thumbnails: {
                        style: "hesperiden",
                        enable: true,
                        width: 100,
                        height: 50,
                        min_width: 100,
                        wrapper_padding: 5,
                        wrapper_color: "#ffffff",
                        wrapper_opacity: "0.5",
                        tmp: '<span class="tp-thumb-image"></span><span class="tp-thumb-title">{{title}}</span>',
                        visibleAmount: 5,
                        hide_onmobile: false,
                        hide_onleave: false,
                        direction: "horizontal",
                        span: false,
                        position: "inner",
                        space: 5,
                        h_align: "right",
                        v_align: "bottom",
                        h_offset: 20,
                        v_offset: 50
                    }
                },

				touchenabled:"on",
				onHoverStop:"on",

				swipe_velocity: 0.7,
				swipe_min_touches: 1,
				swipe_max_touches: 1,
				drag_block_vertical: false,

										parallax:"mouse",
				parallaxBgFreeze:"on",
				parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

				keyboardNavigation:"off",

				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				shadow:0,
				fullWidth:"off",
				fullScreen:"on",

				spinner:"spinner4",

				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,

				shuffle:"off",

				autoHeight:"off",
				forceFullWidth:"off",



				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,

				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0,
			});

		});

	</script><!-- END REVOLUTION SLIDER -->
    <?php } ?>
    


</body>
</html>