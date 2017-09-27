		<!-- TITRE
		============================================= -->
		<div class="container clearfix" style="padding:20px; margin:-20px 0 50px 0; background-color:#EEE">

			<div class="clearfix">
				<h3 style="font-size:35px"><i class="icon-comment"></i> Blog Mss Mouscron</h3>
				<span>Jeux concours, salons, t&eacute;moignages, actualit&eacute;, ...</span>
			</div>

		</div><!-- #page-title end -->
       
<?php if (!$id) { ?>
<!-- LISTE DES PRODUITS
============================================= -->

		<div class="container clearfix bottommargin-lg">

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">

						<?php $Q=mysqli_query($link,"SELECT ID,titre,rub,ville FROM ".$table_prefix."_pages WHERE page='blog' AND masquer!=1 ORDER BY dbu DESC"); $n=0;
							while (list($IDp,$titrep,$rubp,$prixp) = mysqli_fetch_array($Q)) {
								$n++;
						?>
            			<article class="portfolio-item <?=rewrite($rubp)?>">
							<div class="portfolio-image">
								<a href="<?=rewrite($rubp)?>-<?=rewrite($rubp)?>--<?=$IDp?>--blog">
									<?php if (is_file("images/pages-femme-menage-mouscron-repassage-herseaux/".$IDp.".jpg")) {?><img src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" title="<?=$titrep?>, <?=$rubp?>" alt="<?=$titre?> <?=$keywords?>"><?php } ?>
								</a>
								<div class="portfolio-overlay">
									<!--<a href="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>-->
									<a href="<?=rewrite($rubp)?>-<?=rewrite($rubp)?>--<?=$IDp?>--blog" class="left-icon"><i class="icon-angle-right"></i></a>
                                    <a href="<?=rewrite($rubp)?>-<?=rewrite($rubp)?>--<?=$IDp?>--blog" class="right-icon"><i class="icon-search"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
							<h3><a href="<?=rewrite($rubp)?>-<?=rewrite($rubp)?>--<?=$IDp?>--blog"><?=$titrep?></a></h3>
							<span><?=$rubp?></span>
							</div>
						</article>
                        <?php }?>
					</div>

		</div>

<?php } else { 
list($IDb,$dbub,$titreb,$rubb,$texteb)=mysqli_fetch_array(mysqli_query($link,"SELECT ID,dbu,titre,rub,texte FROM ".$table_prefix."_pages WHERE page='blog' AND masquer!='1' AND ID='$id'"));
?>		
<!-- DETAIL DU BLOG
============================================= -->

		<div class="container clearfix">

					<!-- Posts
					============================================= -->
					<div id="posts">

						<div class="entry clearfix">
							<div class="entry-image" >
								<div class="fslider" data-arrows="false" data-lightbox="gallery">
									<div class="flexslider">
										<div class="slider-wrap">
											<?php // Photo Principale
											if (is_file("images/pages-femme-menage-mouscron-repassage-herseaux/".$IDb.".jpg")) {?>
                                            	<div class="slide"><a href="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDb?>.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDb?>.jpg" alt="<?=$titre?>. <?=$keywords?>. <?=$description?>."></a></div>
											<?php } ?>
											<?php // Photo suivantes
											for ($a=1; $a<=4; $a++){
												if (is_file("images/pages-femme-menage-mouscron-repassage-herseaux/".$IDb."-".$a.".jpg")) {?>
                                            		<div class="slide"><a href="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDb?>-<?=$a?>.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDb?>-<?=$a?>.jpg" alt="<?=$titre?>. <?=$keywords?>. <?=$description?>."></a></div>
											<?php }} ?>	
                                        </div>
									</div>
								</div>
							</div>
							<div class="entry-title">
								<h1><?=$titreb?></h1>
                                <h3><?=$rubb?></h3>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i>  <?=date_fr($dbub)?></li>
								<li><i class="icon-user"></i> Mss Mouscron</li>
								<li><i class="icon-folder-open"></i> Blog</li>
								<li><i class="icon-camera-retro"></i></li>
							</ul>
							<div class="entry-content">
								<p><?=$texteb?></p>
								<a href="titres-services-mouscron-herseaux-dottignies--blog"class="more-link"><i class="icon-angle-left"></i> Retour</a>
							</div>
						</div>
                        
                    </div>
                    
		</div>

<?php } ?>




      

      


