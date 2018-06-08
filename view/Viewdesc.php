<!DOCTYPE html>
<html lang="fr">
<head>
    <title>FNAIM</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" src="img/logo/FNAIM.ico" type="img/logo/FNAIM.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css\font-awesome-4.7.0\css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
include("css/nav/navbar.php");
?>
<?php
foreach ($result

as $unResultat) {
?>
<div style="padding-top: 5%;padding-bottom: 10%;" class="container-fluid">
    <div style="padding-left: 15%;padding-bottom: 5%" class="row justify-content-center">
        <div>
            <img src="img/logo/logo_FNAIM---Copie.png" class="" alt="">
        </div>
        <div class="col-5">
            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> Localisation : <?php echo $unResultat['ville']; ?>
            </h3>
            <h4 style="padding-left: 6%"><?php echo ucfirst($unResultat['adresse']); ?> </h4>
            <br>
            <h4><?php echo ucfirst($unResultat['type']); ?> <?php echo ucfirst($unResultat['statut']); ?> :</h4>
            <span style="margin-top: 10px;border-radius: 3px;font-size: 17px;background-color: #bdbdbd;"
                  class="badge "><?php echo $unResultat['surface'] . " m²"; ?></span>
            <span style="margin-top: 10px;border-radius: 3px;font-size: 17px;background-color: #bdbdbd;"
                  class="badge "><?php echo $unResultat['piece'] . " piéces"; ?></span>
            <span style="margin-top: 10px;border-radius: 3px;font-size: 17px;background-color: #bdbdbd;"
                  class="badge "><?php echo $unResultat['chambre'] . " chambres"; ?></span>
            <span style="margin-top: 10px;border-radius: 3px;font-size: 17px;background-color: #bdbdbd;"
                  class="badge "><?php echo $unResultat['eaux'] . " salle d'eau"; ?></span>
            <p style="padding-top: 4%"><strong>Numéro du bien : <?php echo $unResultat['id_bien']; ?></strong></p>
        </div>
        <div style=" margin-top: 100px" class="col-4">
            <span style="border-radius: 3px;background-color: #FFD700;font-size: 25px;"
                  class="badge"><?php echo number_format($unResultat['prix'], 0, ',', ' '); ?>
                €</span>
        </div>
    </div>
    <?php
    if ($unResultat['type'] == 'appartement') {
        echo "    
     <div style=\"padding-top: 6%\" class=\"row justify-content-center\">
        <div style='margin-right: 3%' class=\"col-4 \">
            <h4>Description :</h4><br>
            <p> 
                L'Appartement fais " . $unResultat['surface'] . " m² et d'ispose de " . $unResultat["piece"] . " piéces avec " . $unResultat['chambre'] . " chambres et de " . $unResultat['eaux'] . " salle d'eau
            </p>
        </div>
        <div class=\"card  mb-3\" style=\"max-width: 18rem;\">
            <center>
                <div style='background-color: #f8d61e' class=\"card-header\"><strong>Réserver une visite ou nous contacter</strong></div>
            ";
        if (isset($_SESSION['id'])) {
            echo "<div class=\"card-body\">
                      <h5 class=\"card-title\"><strong>Demander une visite</strong></h5>
                        <div class=\"card-text\">
                            <input class=\"btn btn-black btn-block\" type=\"button\" data-toggle=\"modal\" data-target=\"#demandevisite\"value=\"Demander une visite\">
                        </div>
                      </div>";
        } else {
            echo "<div style='padding-top: 10%'><center><h1 style='color: #666e76'><strong> Vous devers étre connecter</strong></h1><br>
                            </center></div>";
            echo "<div style='padding-bottom: 20%'><center><a href=\"connexion.php\"><button style='background-color: black' type=\"button\" class=\"btn\" data-toggle=\"modal\" data-target=\"#connexion\">
			                Connexion
				            </button></a><a href=\"inscription.php\"><button style='background-color: #f8d61e' type=\"button\" class=\"btn \" data-toggle=\"modal\" data-target=\"#inscription\" href =\"inscription.php\">
				            Inscription
				            </button></a></center></div>";
        }
        echo "
                <div  class=\"card-footer \">
                <p><strong>Nous contacter</strong></p>
                <p><i class=\"fa fa-phone\" aria-hidden=\"true\"></i> 01 23 45 67 89 </p>
                <p><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> fnaim.nft@cfainsta.fr</p>
                </div>
            </center>
        </div>
    </div>
</div>
<div style='padding-bottom: 10%' class='row justify-content-center'>
    <table class=\"table table-bordered col-6 table-user-information\">
        <tbody>
            <tr>
                <td style=\"background-color: #CECECE\"><strong>le bien se trouve a l'étage N°" . $unResultat['etage'] . "</strong></td>
                <td style=\"background-color: #DCDCDC\"><strong>Il y a un ascenseur " . $unResultat['ascenseur'] . "</strong></td>
                <td style=\"background-color: #CECECE\"><strong>Il y a un balcon" . $unResultat['balcon'] . "</strong></td>
            </tr>
            <tr>
                <td style=\"background-color: #DCDCDC\"><strong>Il y a une place de parking" . $unResultat['place_parking'] . "</strong></td>
            </tr>
        </tbody>
    </table>
</div>";
    } else if ($unResultat['type'] == 'maison') {
        echo "
   <div style=\"padding-top: 6%\" class=\"row justify-content-center\">
        <div style='margin-right: 3%' class=\"col-4 \">
            <h4>Description :</h4><br>
            <p> 
                La Masion fais " . $unResultat['surface'] . " m² et d'ispose de " . $unResultat["piece"] . " piéces avec " . $unResultat['chambre'] . " chambres et de " . $unResultat['eaux'] . " salle d'eau
                
            </p>
        </div>
        <div class=\"card  mb-3\" style=\"max-width: 18rem;\">
            <center>
                <div style='background-color: #f8d61e' class=\"card-header\"><strong>Réserver une visite ou nous contacter</strong></div>
            ";
        if (isset($_SESSION['id'])) {
            echo "<div class=\"card-body\">
                      <h5 class=\"card-title\"><strong>Demander une visite</strong></h5>
                        <div class=\"card-text\">
                            <input class=\"btn btn-black btn-block\" type=\"button\" data-toggle=\"modal\" data-target=\"#demandevisite\"value=\"Demander une visite\">
                        </div>
                      </div>";
        } else {
            echo "<div style='padding-top: 10%'><center><h1 style='color: #666e76'><strong> Vous devers étre connecter</strong></h1><br>
                            </center></div>";
            echo "<div style='padding-bottom: 20%'><center><a href=\"connexion.php\"><button style='background-color: black' type=\"button\" class=\"btn\" data-toggle=\"modal\" data-target=\"#connexion\">
			                Connexion
				            </button></a><a href=\"inscription.php\"><button style='background-color: #f8d61e' type=\"button\" class=\"btn \" data-toggle=\"modal\" data-target=\"#inscription\" href =\"inscription.php\">
				            Inscription
				            </button></a></center></div>";
        }
        echo "
          <div  class=\"card-footer \">
                <p><strong>Nous contacter</strong></p>
                <p><i class=\"fa fa-phone\" aria-hidden=\"true\"></i> 01 23 45 67 89 </p>
                <p><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i> fnaim.nft@cfainsta.fr</p>
         </center>
        </div>
    </div>
</div>
<div style='padding-bottom: 10%' class='row justify-content-center'>
    <table class=\"table table-bordered col-5 table-user-information\">
        <tbody>
             <tr>
                <td style=\"background-color: #CECECE\"><strong>" . $unResultat['surface_terrain'] . "</strong></td>
                <td style=\"background-color: #DCDCDC\"><strong>" . $unResultat['cave'] . "</strong></td>
                <td style=\"background-color: #CECECE\"><strong>" . $unResultat['grenier'] . "</strong></td>
            </tr>
        </tbody>
    </table>
</div>";
    }
    echo "
    <iframe
            width='100%'
            height='400'
            frameborder='0' style='border:0'
            src='https://www.google.com/maps/embed/v1/place?key=AIzaSyDtmteQ8XYMI69oJegqdphqgDSvF-INGp8
    &q=" . str_replace(" ", "+", $unResultat['adresse']) . "," . str_replace(" ", "+", $unResultat['ville']) . "' allowfullscreen>
    </iframe>";
    }
    ?>
    <!-- Modal -->
    <div class="modal fade row" id="demandevisite" tabindex="-1" role="dialog" aria-labelledby="demandevisite"
         aria-hidden="true">
        <form action="<?php echo "desc_appart.php?bien=" . $unResultat['id_bien']."&type=".$unResultat['type']; ?>" method="post">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demandevisite"><strong>Demander une visite</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5><i class="fa fa-map-marker" aria-hidden="true"></i> Localisation
                            : <?php echo $unResultat['ville']; ?> <?php echo ucfirst($unResultat['adresse']); ?></h5>
                        <h5 style="padding-left: 3%">Bien <?php echo ucfirst($unResultat['statut']); ?>, Numéro du bien
                            : <?php echo $unResultat['id_bien']; ?></h5>
                        <div style="padding-top: 3%" class="form-inline">
                        <div class="col-md-5 col-sm-5 col-lg-5">
                            <div class="md-form">
                                <span for="form16">Date :</span>
                               <input type="date" id="form16" name="datevisite" required>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-lg-5">
                            <div class="md-form">
                                <span for="form15">Heure :</span>
                                <input type="time" id="form15" name="heurevisite" required>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button style=" background-color: #f8d61e" type="button" class="btn " data-dismiss="modal">
                            Annuler
                        </button>
                        <button style="background-color: black" type="submit" name="pvisite" class="btn">Confirmer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    include("css/nav/foot.php");
    ?>
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>