<?
include "include/menu-new.php";

// VARIABLES
$titrepage= "L'équipe";

// ici ici on définit la table à utiliser, si on veut créer une table avec des champs différents (membres : nom, prénom, etc...) alors on indique le nom de la bonne table.
$tableencours = $table_prefix."_pages";

// Cela définit la valeur de la colonne "pages" dans la Bdd (ex : page, actu, offre, etc...)
$lapage = "equipe"; 	

// PHOTOS
$photosize = "1000x750"; // Dimensions idéales d'information pour la photo

// le repertoir du dossier où m'on range les images, tout peut etre ds le même dossier
$chemin = "../images/team/";  // "/" à la fin
$wmax = 100; $hmax = 80;  $tdvisuphoto = $wmax*2+20;  	// Dimension pour affichage des vigettes
$redim_w=1000; $redim_h=750;

// Si on veut desactiver les vignettes pour ce gabarit de page
// 1 = désactivé - 0 = actif
$masquervignette=0;

// Nombre de photo dispo
$nbr=0;

// Si on veut desactiver la possibilité de mettre une rubrique
// 1 = désactivé - 0 = actif
$masquer_rubrique = 1;

// Cas d'une rubrique imposée
// 1 = oui - 0 = non
$rubrique_forcee = 1;

// Adapter si rubrique imposée
$nom_rubrique_forcee = "Membre équipe";

// CHAMPS
// A personnaliser si la table que l'on interroge a des champs différents, ou si on veut en ajouter.
$chps=array('page','titre','texte','dbu','masquer','lg','rub');
$chpsNb = count($chps);

 
?>

	<section class="padding-top-30 padding-bottom-30 section-bloc bloc-titre">
	    <div class="row">
	        <div class="col-sm-6 col-md-6">
		        <h2><?=$titrepage?></h2>
	        </div>
		    <div class="col-sm-6 col-md-6">
				<a href="?#chercher" style="float:right; margin-left:20px"><i class="fa fa-search"></i> Chercher</a>
				<a href="?" style="float:right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ajouter</a> 
	        </div>
			<div class="clearfix"></div>
	    </div>
    </section>
<?php    
	
// EFFACEMENT
if ( $del ) {	
	mysqli_query($link,"DELETE FROM $tableencours WHERE ID=$del");
	@unlink($chemin.$del.".pdf");
	for ($a=1; $a<=$nbr; $a++){@unlink($chemin.$del."-".$a.".pdf");}
}
elseif ($delphoto) {@unlink($chemin.$delphoto);}
unset ($del,$delphoto);

	
// TRAITEMENT DES TEXTES
if ($rubnew) {$$chps[3]=$rubnew;}
if (!$dbu) {$dbu=date(Y-m-d);} else {$dbu=date_tiret($dbu);}
for ($a=0; $a<$chpsNb; $a++){ 
	$$chps[$a]=preg_replace('/"/',"'",trim($$chps[$a]));							// " => '
	if ($a==5 || $a==10) {$$chps[$a]=preg_replace('/,/',".",$$chps[$a]);}		// PRIX , => . 
}

// ADDQUERY ET LISTE
for ($a=0; $a<$chpsNb; $a++){	$addquery1.=$chps[$a]."=\"".$$chps[$a]."\","; $liste1.=$chps[$a].",";}
$addquery1 = substr($addquery1,0,strlen($addquery1)-1);
$liste1 = substr($liste1,0,strlen($liste1)-1); //echo $liste1;
	
// MODIF / AJOUT
if ( $Submit ) 
{	if ( $modif ) 
	{	mysqli_query($link,"UPDATE $tableencours SET $addquery1 WHERE ID='$modif'");
		if ( $vignette ) { $updatevign="$modif.pdf"; }
		for ($a=1; $a<=$nbr; $a++){		if ( $_FILES['photo'.$a]['name'] ) { $updatefile[$a]=$modif."-".$a.".pdf";} else {$updatefile[$a]="";} }
		$msg.= "<i class='fa fa-check-circle fa-2x'></i> Mise &agrave; jour r&eacute;ussie";
    } 
	else 
	{	mysqli_query($link,"INSERT INTO $tableencours SET $addquery1");
		if ( $vignette ) 	{ $updatevign= mysqli_insert_id($link).".pdf"; }
		for ($a=1; $a<=$nbr; $a++){	if ( $_FILES['photo'.$a] ) { $updatefile[$a]=mysqli_insert_id($link)."-".$a.".pdf"; } }
	  	$msg.= "<i class='fa fa-check-circle fa-2x'></i> Enregistrement ajout&eacute;";
    }
    
    
    // Si on a ajouté des champs, il faudra les ajouter ici aussi !
	unset($ID,$page,$titre,$produit,$rub,$dbu,$masquer,$lg);

	// ENVOYER LES PHOTOS
	$nom_tmp = $_FILES['vignette']['tmp_name']; sent_photo($updatevign,$nom_tmp,$chemin); 
	for ($a=1; $a<=$nbr; $a++){  $nom_tmp = $_FILES['photo'.$a]['tmp_name'] ; sent_photo($updatefile[$a],$nom_tmp,$chemin);}
 	
	// REDIMENSION DES PHOTOS
	if (file_exists($chemin.$updatevign) && $updatevign ) {
		list($w,$h) = getimagesize($chemin.$updatevign) ;		
		if ($w >$redim_w || $h>$redim_h) { 
			redimage("$chemin$updatevign","$chemin$updatevign","$redim_w","$redim_h");
		}
	}
	
	for ($a=1; $a<=$nbr; $a++){
		if (file_exists($chemin.$updatefile[$a]) && $updatefile[$a] ) {		
			list($w,$h) = getimagesize($chemin.$updatefile[$a]) ;		
			redimage("$chemin$updatefile[$a]","$chemin$updatefile[$a]","$redim_w","$redim_h") ;
		}
	}
			
	
} // FIN DU SUBMIT

// RECUPERATION DES VALEURS ENREGISTREES
if ( $modif ) 
{	$result = mysqli_fetch_array( mysqli_query($link," SELECT ID,$liste1 FROM $tableencours WHERE ID=$modif ") );

	// Si on a ajouté des champs, il faudra les ajouter ici aussi !
	
	list($ID,$page,$titre,$produit,$rub,$dbu,$masquer,$lg) = $result;
	$$chps[4]=date_barre($$chps[4]);
}  
?>
			<!-- Messages d'alertes ou de confirmation -->
		<div class="row">
	        <div class="col-sm-12 col-md-12">
				<?php if ($msg) {?>
					<div class="alert alert-success" role="alert"><?=$msg?></div>
				<?php } ?>
				<?php if ($msgerror) {?>
				<div class="alert alert-danger" role="alert"><?=$msgerror?></div>
				<?php } ?>
	        </div>
		</div>
			
		<section class="padding-top-30 padding-bottom-30 section-bloc">
		    <div class="row">
			    
				<form method="post" action="" enctype="multipart/form-data">
				    <input type="hidden" name="modif" value="<?=$modif?>">
				    <input type="hidden" name="word" value="<?=$word?>">
				    <input type="hidden" name="page" value="<?=$lapage?>">

					<div class="col-sm-12 col-md-6">
			    
			        	<?	// BOUTON LANGUES    
				        if (isset($langues) && count($langues)>1) {
				            echo "<h4><i class='fa fa-flag '></i> Langue</h4>";
				            echo '<div class="radio" style="margin-bottom: 25px;">';
				            for ( $a=0 ; $a<count($langues) ; $a++ ) {
				                if ( $lg == $langues[$a] || (!$a&&!$lg) ) { $addselected = " checked"; } else { $addselected = ""; }
				                if ( $a ) { print ",&nbsp;"; } 
				            echo '<label class="radio-inline">';
				            echo "<input type=\"radio\" name=\"lg\" value=\"".$langues[$a]."\"$addselected>".$langues[$a];
				            echo "</label>";
				            }
				            echo '</div>';
				            
				        } else { echo '<input type="hidden" name="lg" value="'.$langues[0].'">';}
				        ?>

						<h4><i class='fa fa-pencil-square-o '></i> Titre</h4>
				        <div class="form-group">
					        <input name="<?=$chps[1]?>" value="<?=$$chps[1]?>" class="form-control" type="text" required  />
				        </div>
				        
				        	<h4><i class='fa fa-plus-square fa-1x'></i> Produit de rattachement</h4>
					        <div class="form-group">   
					          	<select name="<?=$chps[2]?>" class="form-control">
					             <?
						            $result = mysqli_query($link, "SELECT id, titre, lg FROM ".$table_prefix."_pages WHERE page='produit' ORDER BY titre") ;
						          
						            while ( $data = mysqli_fetch_array($result) ) 
						            {	echo " <option value=".$data['id']."";
						                if ( $data['id']==$$chps[2] ) { print(" selected"); } 
						                echo " >".$data['titre']."-".$data['lg']."</option>";
						            }		?>
								</select>
					        </div>

							<?php // Possibilité de renseigner une rubrique 
					        if ($masquer_rubrique!="1") {
				        	?>
				        	<h4><i class='fa fa-plus-square fa-1x'></i> Rubrique</h4>
					        <div class="form-group">   
					          	<select name="<?=$chps[3]?>" class="form-control">
					             <?
						            $result = mysqli_query($link, "SELECT rub FROM $tableencours WHERE page='".$lapage."' GROUP BY rub ORDER BY rub") ;
						          
						            while ( list($list) = mysqli_fetch_array($result) ) 
						            {	echo " <option value=\"$list\" ";
						                if ( $list==$$chps[3] ) { print(" selected"); } 
						                echo " >".$list."</option>";
						            }		?>
								</select>
					        </div>
					        <div class="form-group">
						        <label> Ou nouvelle rubrique <span style="font-weight: normal; font-size: 10px;">(attention à ne pas créer une rubrique deja existante)</span></label>
						        <input class="form-control" name="rubnew" type="text" />
					        </div>
					        <?php } ?>

							<?php // Possibilité de renseigner une rubrique 
					         if ($rubrique_forcee=="1") {
				        	?>
							<!-- Si rubrique forcée -->
							<input type="hidden" name="<?=$chps[3]?>" value="<?php echo $nom_rubrique_forcee; ?>" />
							<?php } ?>
							
					        
					        <h4><i class='fa fa-calendar '></i> Date de tri</h4>
					        <div class="form-group">
						    	<input name="<?=$chps[4]?>" value="<?=($$chps[4])?($$chps[4]):(date("d/m/Y"))?>" class="form-control" type="text" required size="30" />
						    </div>
					        
				        
							<h4><i class='fa fa-eye '></i> Masquer</h4>
						    <div class="form-group">
					          <select name="<?=$chps[5]?>" class="form-control">
					            <option value="0"<?php if ( $$chps[5]=="0" ) { print(" selected"); } ?>>Non</option>
					            <option value="1"<?php if ( $$chps[5]=="1" ) { print(" selected"); } ?>>Oui</option>
					          </select>
					        </div>
					</div>
					
					<div class="col-sm-12 col-md-6 ">
						<div class="zone-photos"> 

						    <?php if ($masquervignette!=1) { ?>
							    
							    	 <h4><i class='fa fa-camera '></i> Document (format: .pdf)</h4>
							    	 <div class="form-group">
							         <label>Document</label>
							         	<input type="file" name="vignette"  value="" />
							         </div>
									<?
									 if ( $modif && file_exists($chemin.$modif.".pdf") ) {	
											redim_img_url($chemin.$modif.".pdf",$wmax,$hmax);
											print("<a href=?modif=$modif&delphoto=$modif.pdf><i class='fa fa-trash-o '></i></a> photo $a<br/><br/>");
										}
									for ($a=1; $a<=$nbr; $a++){ ?>
										<div class="form-group">
								        <label>Document <?=$a?></label>
									        <input type="file" name="photo<?=$a?>"  value="">
								        </div>
							        <?php 
									} 	
									//Afficher les documents pdf
									for ($a=1; $a<=$nbr; $a++){
										if ( $modif && file_exists($chemin.$modif."-".$a.".pdf") ) {	
											redim_img_url($chemin.$modif."-".$a.".pdf",$wmax,$hmax);
											print("<a href=?modif=$modif&delphoto=$modif-$a.pdf> <i class='fa fa-trash-o '></i></a> photo $a<br/><br/>");
										}
									} 
									?>
						    <?php } ?>
						</div>
					</div>
					<div class="clearfix"></div>
					
					<div class="col-sm-12 col-md-12 texte-principal">
				      <div class="clearfix"></div>
				      <button type="submit" name="Submit" value="Enregistrer" class="btn btn-default bouton-submit">Enregistrer</button>
					</div>
				</form>
		    </div>
		</section>

		<section class="padding-top-30 padding-bottom-30 margin-top-20 section-bloc">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					
					<a name="chercher" id="chercher"></a>
					
						<form method="post" action="">
						  <?php if ($word) {?>
						  <span class="VertNorm"><i class='fa fa-check '></i> recherche exécutée</span>
						  <?php } ?>
						  
						  	<div class="input-group">
						      <input type="text" class="form-control" placeholder="Rechercher..." name="word" value="<?php print(htmlentities($word)); ?>">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="button">OK</button>
						      </span>
						    </div><!-- /input-group -->
		
						  <?php if ($word) {?>
						  <span class="BleuNorm">
						  	<a href="?"><i class="fa fa-undo "></i> Reset</a>
						  </span>
						  <?php } ?>
						</form>
						
					  <?
					$addQ="AND page='$lapage'"; 
					if ($word)  {$result = mysqli_query($link,"SELECT ID,".$liste1." FROM $tableencours WHERE (".$chps[1]." LIKE '%$word%' OR ".$chps[2]." LIKE '%$word%' OR ".$chps[3]." LIKE '%$word%' OR ".$chps[4]." LIKE '%$word%' OR ID LIKE '%$word%') ".$addQ." ORDER  BY dbu DESC ");}
					else {  $result = mysqli_query($link," SELECT ID,".$liste1." FROM $tableencours WHERE 1 ".$addQ."  ORDER BY dbu DESC ");}
					?>
					
					<table style="margin-top: 25px;" class="table table-bordered table-striped">
					  	<thead>
						    <tr>
						      <th>&nbsp;</th>
						      <th><i class='fa fa-sort-numeric-asc '></i> - <i class='fa fa-flag '></i></th>
						      <th><i class='fa fa-list-ol '></i></th>
						      <th><i class='fa fa-pencil-square-o '></i></th>
						      <th><i class='fa fa-align-justify'></i></th>
						      <th><i class='fa fa-calendar '></i></th>
						      <th>&nbsp;</th>
					        </tr>
				      	</thead>
						<tbody>
						  <?php 
						  while ( list($ID,$page,$titre,$produit,$rub,$dbu,$masquer,$lg) = mysqli_fetch_array($result) ) 
						  { 
						  	if ($masquer=="1") {$class="normalgrisclair";} else {$class="";}
						    echo "<tr class='".$class."'>";
						    echo "<td><a href=\"?modif=$ID&word=$word\"><i class='fa fa-pencil '></i></a></td>";
						    echo "<td>$ID - $lg</td><td>".$page." <i class='fa fa-angle-right '></i>".$rub."</td><td>".strip_tags($titre)."</td><td>".substr(strip_tags($produit),0,60)."...</td><td>".date_barre($dbu)."</td><td><a href=\"?del=$ID&word=$word\"><i class='fa fa-trash-o '></i></a></td>";
						    echo "</tr>";
						  }
						 ?>
						</tbody>
					</table>
					<div class="clearfix hidden-sm"></div>
				</div>
			</div>
		</section>

	</div><!-- Fin container ouvert dans menu.php -->
</body>
</html>