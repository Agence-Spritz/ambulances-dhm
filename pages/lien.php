		<!-- TITRE
		============================================= -->
		<div class="container clearfix" style="padding:20px; margin:-20px 0 50px 0; background-color:#EEE">

			<div class="clearfix">
				<h3 style="font-size:35px"><i class="icon-camera"></i> Albums photos</h3>
				<span>Pour le plaisir.</span>
			</div>

		</div><!-- #page-title end -->
        
        <!-- LISTE DES PRODUITS
============================================= -->

		<div class="container clearfix bottommargin-lg">

					<!-- Portfolio Filter
					============================================= -->
					<ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">
						<li class="activeFilter"><a href="#" data-filter="*">Tout nos produits</a></li>
						<?php 	$Q1=mysqli_query($link,"SELECT rub FROM ".$table_prefix."_pages WHERE page='photo' AND masquer!='1' GROUP BY rub ORDER BY dbu DESC");
							while (list($rubm) = mysqli_fetch_array($Q1)) {
						?>
                        	<li><a href="#" data-filter=".<?=rewrite($rubm)?>"><?=$rubm?></a></li>
                        <?php } ?>
					</ul>

					<div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
						<i class="icon-retweet"></i>
					</div>

					<div class="clear"></div>

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">

						<?php $Q=mysqli_query($link,"SELECT ID,titre,rub,ville FROM ".$table_prefix."_pages WHERE page='photo' AND masquer!=1 ORDER BY dbu DESC"); $n=0;
							while (list($IDp,$titrep,$rubp,$prixp) = mysqli_fetch_array($Q)) {
								$n++;
						?>
            			<article class="portfolio-item <?=rewrite($rubp)?>">
							<div class="portfolio-image">
								
									<?php if (file_exists("images/pages-femme-menage-mouscron-repassage-herseaux/".$IDp.".jpg")) {?><img src="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" title="<?=$titrep?>, <?=$rubp?>" alt="<?=$titre?> <?=$keywords?>"><?php } ?>
								<div class="portfolio-overlay">
									<a href="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
									<a href="images/pages-femme-menage-mouscron-repassage-herseaux/<?=$IDp?>.jpg" class="right-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
							<h3><a href="#"><?=$titrep?></a></h3>
							<span><a href="#"><?=$rubp?></a></span>
							</div>
						</article>
                        <?php }?>

					</div>

				</div>






      

      


