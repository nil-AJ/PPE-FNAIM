<!DOCTYPE html>
<html lang="fr">
<head>
    <title></title>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <!-- Collapsible content -->
    <a class="navbar-brand" href="index.php">
        <img src="img/logo/logo_FNAIM.png" width="50" height="40">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link " href="index.php"> <strong>Home</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="apropos.php"><strong>A
                        propos</strong> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="visite.php"><strong>Visite</strong> </a>
            </li>
        </ul>
        <form method="post" action="recherche.php" class="form-inline">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input class="form-control " type="text" name="search" placeholder="Recherché">
            <a style="display: none" href="../../recherche.php"><input type="submit" name="rechercher"
                                                                       value="Rechercher"></a>
        </form>
        <div style="padding-left: 3%; padding-right: 1%">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item form-inline">
                    <i class=" fa fa-2x fa-user-circle" aria-hidden="true"></i>
                </li>
                <li class="nav-item form-inline">
                    <a class="nav-link" href="profil.php">Mon compte</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- menu gauche -->
<div class="nav-gauche container-fluid Disp-ordi">
    <div class="row">
        <div class="text-center">
            <center>
                <br><br>
                <?php
                if (isset($_SESSION['id'])) {
                    echo "<div style='padding-bottom: 30%; padding-left: 15%;'  >";
                    echo "<h1><i style=\"font-size: 65px\" class=\"fa fa-1x fa-user-circle\" aria-hidden=\"true\"></i></h1>";
                    echo "<h4><strong>" . $_SESSION["prenom"] . " " . $_SESSION["nom"] . "</strong></h4><br>";
                    echo "<form method ='post' action=''>";
                    echo "<input style='background-color: #f8d61e; ' class=\"btn \" type='submit' value = 'Déconnexion' name = 'deco'>";
                    echo "</form>";
                    echo  "</div>";
                    if (isset($_POST['deco'])) {
                        session_destroy();
                        header("Refresh:0");
                    }
                } else {
                    echo  "<h1><i style=\"font-size: 65px\" class=\"fa fa-1x fa-user-circle\" aria-hidden=\"true\"></i></h1>";
                    echo "<h4><strong> Mon Compte</strong></h4><br>";
                    echo "<!-- Button trigger modal -->
						<a href=\"connexion.php\"><button style='background-color: black' type=\"button\" class=\"btn\" data-toggle=\"modal\" data-target=\"#connexion\">
						Connexion
						</button></a>";
                    echo "<a href=\"inscription.php\"><button style='background-color: #f8d61e' type=\"button\" class=\"btn \" data-toggle=\"modal\" data-target=\"#inscription\" href =\"inscription.php\">
						Inscription
						</button></a>";
                }
                ?>
            </center>
        </div>
        <br><br><br>
        <?php
        include('vue_filtre_form.php');
        ?>
    </div>
</div>
<div class="container-fluid">
    <br><br><br><br>
    <div class="row marg">
        <?php
        if (isset($_POST['search_filtre'])) {
            foreach ($result as $unResultat) {
                include('vue_filtre_var.php');
                if(isset($unResultat['surface_terrain']) && (isset($_POST["filter_cave"]) || isset($_POST['filter_grenier']) || !empty($_POST['filter_surface_du_terrain']))) {
                    if ($unResultat['statut'] === $filter_statut && $unResultat['ville'] === $filter_ville && $unResultat['surface'] === $filter_surface && $unResultat['piece'] === $filter_piece && $unResultat['prix'] <= $filter_prix_max && $unResultat['prix'] >= $filter_prix_min && $unResultat['surface_terrain'] === $filter_surface_terrain && $unResultat['cave'] == $filter_cave && $unResultat['grenier'] == $filter_grenier && $unResultat['chambre'] === $filter_chambre && $unResultat['eaux'] === $filter_eaux) {
                        include("vue_desc_petite.php");
                    }
                }elseif(isset($unResultat['ascenseur']) && (isset($_POST["filter_balcon"]) || isset($_POST['filter_ascenseur']) || isset($_POST['filter_place_parking']))) {
                    if ($unResultat['statut'] === $filter_statut && $unResultat['ville'] === $filter_ville && $unResultat['surface'] === $filter_surface && $unResultat['piece'] === $filter_piece && $unResultat['prix'] <= $filter_prix_max && $unResultat['prix'] >= $filter_prix_min && $unResultat['ascenseur'] == $filter_ascenseur && $unResultat['balcon'] == $filter_balcon && $unResultat['place_parking'] == $filter_place_parking && $unResultat['chambre'] === $filter_chambre && $unResultat['eaux'] === $filter_eaux) {
                        include("vue_desc_petite.php");
                    }
                }elseif(!isset($_POST['filter_cave']) && !isset($_POST['filter_grenier']) && !isset($_POST['filter_ascenseur']) && !isset($_POST['balcon']) && empty($_POST['filter_surface_du_terrain'])) {

                    if ($unResultat['statut'] === $filter_statut && $unResultat['ville'] === $filter_ville && $unResultat['surface'] === $filter_surface && $unResultat['piece'] === $filter_piece && $unResultat['prix'] <= $filter_prix_max && $unResultat['prix'] >= $filter_prix_min && $unResultat['chambre'] === $filter_chambre && $unResultat['eaux'] === $filter_eaux && $unResultat['type'] === $type) {
                        include("vue_desc_petite.php");
                    }
                }
            }
        } else {
            foreach ($result as $unResultat) {
                include("vue_desc_petite.php");
            }
        }
        ?>
    </div>
</div>
<!--Footer-->
<diV style="padding-top: 60%;">
    <footer style=" background-color: #333;"
            class="page-footer  center-on-small-only pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <center>
                        <br><br>
                        <a type="bouton" classe="btn btn-secondary" style="color: #3b5998;"
                           href="https://fr-fr.facebook.com/"><i class="fa fa-facebook-square fa-2x"
                                                                 aria-hidden="true"></i>
                            <a type="bouton" classe="btn btn-secondary" style="color:red;"
                               href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-2x"
                                                                  aria-hidden="true"></i>
                            </a>
                            <a type="bouton" classe="btn btn-secondary" style="color: #00aced ;"
                               href="https://plus.google.com/"><i class="fa fa-2x fa-twitter-square"
                                                                  aria-hidden="true"></i>
                            </a>
                    </center>
                </div>
            </div>
            <hr style='background-color: #f8d61e'>
            <div class=" Disp droite row justify-content-center">
                <div class="col-2 text-center ">
                    <div class=" nav flex-column">
                        <a class="" style="color: #ddd;" href="index.html">Home</a>
                        <a class="" style="color: #ddd;" href="apropos.html">A propos </a>
                        <a class="" style="color: #ddd;" href="contact.php">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div style='background-color: #f8d61e' class="footer-copyright">
            <div style="color: black;" class="container-fluid">
                © 2017 Copyright ©FNAIM . Tous droits réservés
            </div>
        </div>
    </footer>
</diV>
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
