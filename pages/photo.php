		<!-- TITRE
		============================================= -->
		<div class="container clearfix" style="padding:20px; margin:-20px 0 50px 0; background-color:#EEE">

			<div class="clearfix">
				<h3 style="font-size:35px"><i class="icon-link"></i> Liens partenaires</h3>
				<span></span>
			</div>

		</div><!-- #page-title end -->
        
        <!-- LISTE DES PRODUITS
============================================= -->

		<div class="container clearfix bottommargin-lg">


					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-4 clearfix">

						<?php $Q=mysqli_query($link,"SELECT ID,titre,rub,texte FROM ".$table_prefix."_pages WHERE page='lien' AND masquer!=1 ORDER BY dbu DESC"); $n=0;
							while (list($IDp,$titrep,$lienp,$rubp) = mysqli_fetch_array($Q)) {
								$n++;
						?>
            			<article class="portfolio-item <?=rewrite($rubp)?>">
							<div class="portfolio-image">
									<?php if (file_exists("images/pages-femme-menage-mouscron-repassage-herseaux/".$IDp.".jpg")) {?><img src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" title="<?=$titrep?>, <?=$rubp?>" alt="<?=$titre?> <?=$keywords?>"><?php } ?>
								<div class="portfolio-overlay">
									<a href="<?=$lienp?>" target="_blank" class="left-icon" ><i class="icon-link"></i></a>
									<a href="<?=$lienp?>" target="_blank" class="right-icon" ><i class="icon-arrow-right"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
							<h3><a href="<?=$lienp?>"><?=$titrep?></a></h3>
							<div style="height:80px"><span><?=$rubp?></span></div>
							</div>
						</article>
                        <?php }?>

					</div>

				</div>






      

      


