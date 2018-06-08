<?php
    if (!empty($_POST['filter_prix_min'])) {
        $filter_prix_min = $_POST['filter_prix_min'];
    } else {
        $filter_prix_min = $unResultat['prix'];
    }
    if (!empty($_POST['filter_prix_max'])) {
        $filter_prix_max = $_POST['filter_prix_max'];
    } else {
        $filter_prix_max = $unResultat['prix'];
    }
    if (!empty($_POST['filter_ville'])) {
        $filter_ville = $_POST['filter_ville'];
    } else {
        $filter_ville = $unResultat['ville'];
    }
    if (!empty($_POST['filter_piece'])) {
        $filter_piece = $_POST['filter_piece'];
    } else {
        $filter_piece = $unResultat['piece'];
    }
    if (!empty($_POST['filter_surface'])) {
        $filter_surface = $_POST['filter_surface'];
    } else {
        $filter_surface = $unResultat['surface'];
    }
    if (!empty($_POST['filter_statut'])) {
        $filter_statut = $_POST['filter_statut'];
    } else {
        $filter_statut = $unResultat['statut'];
    }
    if (!empty($_POST['filter_eaux'])) {
        $filter_eaux = $_POST['filter_eaux'];
    } else {
        $filter_eaux = $unResultat['eaux'];
    }
    if (!empty($_POST['filter_chambre'])) {
        $filter_chambre = $_POST['filter_chambre'];
    } else {
        $filter_chambre = $unResultat['chambre'];
    }
    if (!empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = $unResultat['type'];
}
    if ($unResultat['type'] === "maison") {
        if (!empty($_POST['filter_surface_du_terrain'])) {
            $filter_surface_terrain = $_POST['filter_surface_du_terrain'];
        }else {
            $filter_surface_terrain = $unResultat['surface_terrain'];
        }
        if (!empty($_POST['filter_cave'])) {
            $filter_cave = 1;
        }else {
            $filter_cave = $unResultat['cave'];
        }
        if (!empty($_POST['filter_grenier'])) {
            $filter_grenier = 1;
        }else {
            $filter_grenier = $unResultat['grenier'];
        }
    }
    if ($unResultat['type'] === "appartement") {
        if (!empty($_POST['ascenseur'])) {
            $filter_ascenseur = 1;
        }else {
            $filter_ascenseur = $unResultat['ascenseur'];
        }
        if (!empty($_POST['filter_balcon'])) {
            $filter_balcon = 1;
        }else {
            $filter_balcon = $unResultat['balcon'];
        }
        if (!empty($_POST['filter_place_parking'])) {
            $filter_place_parking = 1;
        }else {
            $filter_place_parking = $unResultat['place_parking'];
        }
    }
?>