<div class="contenu col-md-8 col-lg-11 col-sm-8">
    <div class="titre">
        <h4><?php echo ucfirst($unResultat['type']); ?> <?php echo ucfirst($unResultat['statut']); ?></h4>

        <div>
			<span class="info_ville">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php
                echo $unResultat['ville'] . ", ";
                echo $unResultat['adresse'];
                ?>
			</span>
        </div>
    </div>
    <div class="image_bien">
        <img src="img/logo/logo_FNAIM---Copie.png" width="200px" class="" alt="">
    </div>
    <div class="infos">
        <span class="badge info_bien"><?php echo $unResultat['surface'] . " m²"; ?></span>
        <span class="badge info_bien"><?php echo $unResultat['piece'] . " piéce"; ?></span>
        <span class="badge info_bien"><?php echo $unResultat['chambre'] . " chambre"; ?></span>

        <span class="badge info_bien"><?php echo $unResultat['eaux'] . " salle d'eau"; ?></span>
        <div class="prix">
            <span class="badge prix_bien"><?php echo number_format($unResultat['prix'], 0, ',', ' '); ?>
                €</span>
        </div>
    </div>
    <a href=<?php echo "desc_appart.php?bien=" . $unResultat['id_bien']."&type=".$unResultat['type']; ?>>
        <div class="voir_plus">
            <i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i>
            <span>Détails</span>
        </div>
    </a>
</div>