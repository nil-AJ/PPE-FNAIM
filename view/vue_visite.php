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
<?php
include("css/nav/navbar.php");
if (isset($_SESSION['id'])) {
    echo "
    <div style=\"padding-top: 10%; padding-bottom: 10%\" class=\"row justify-content-center\">
    <div class=\"col-md-10 col-md-offset-1\">
        <div class=\"panel panel-default panel-table\">
            <div class=\"panel-body\">
                <table class=\"table  table-bordered table-hover \">
                    <thead>
                    <th>ID de la visite</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Etat du bien</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>id bien</th>
                    <th>Prénom du client</th>
                    <th>Nom du client</th>
                    <th>Prénom du commecial</th>
                    <th>Nom du commecial</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";

    foreach ($result as $unresultat) {
        if ($_SESSION['statut'] == 1) {
            if ($_SESSION['id'] == $unresultat['id_personne']) {
                echo " <!-----tableaux client------>
                     <tr>
                        <td> " . $unresultat["id_visite"] . "</td>
                        <td>" . $unresultat["date_visite"] . "</td>
                        <td>" . $unresultat["heure"] . "</td>
                        <td>" . utf8_encode($unresultat["etat"]) . "</td>
                        <th>" . $unresultat['ville'] . "</th>
                        <th>" . $unresultat['adresse'] . "</th>
                        <td>" . $unresultat["id_bien"] . "</td>
                        <th>" . $_SESSION['prenom'] . "</th>
                        <th>" . $_SESSION['nom'] . "</th>        
                        <td>" . $unresultat['nom'] . "</td>
                        <td>" . $unresultat['prenom'] . "</td>    
                        </tr>";
            }
        } else if ($_SESSION['statut'] == 2) {
            if ($_SESSION['id'] == $unresultat['id_commercial']) {
                echo "<!-----tableaux commercial------>

                    <tr>
                        <td> " . $unresultat["id_visite"] . "</td>
                        <td>" . $unresultat["date_visite"] . "</td>
                        <td>" . $unresultat["heure"] . "</td>
                        <td>" . utf8_encode($unresultat["etat"]) . "</td>
                        <th>" . $unresultat['ville'] . "</th>
                        <th>" . $unresultat['adresse'] . "</th>
                        <td>" . $unresultat["id_bien"] . "</td>
                        <td>" . $unresultat['nom'] . "</td>
                        <td>" . $unresultat['prenom'] . "</td>    
                        <th>" . $_SESSION['prenom'] . "</th>
                        <th>" . $_SESSION['nom'] . "</th>
                    </tr>";
            }
        }
    }
    echo "

</tbody>
</table>
</div>
</div>
</div>
</div>
";
} else {
    echo "<div style='padding-top: 10%'><center><h1 style='color: #666e76'><strong> Vous devers étre connecter</strong></h1><br>
</center></div>";
    echo "<div style='padding-bottom: 30%'><center><a href=\"connexion.php\"><button style='background-color: black' type=\"button\" class=\"btn\" data-toggle=\"modal\" data-target=\"#connexion\">
						Connexion
						</button></a><a href=\"inscription.php\"><button style='background-color: #f8d61e' type=\"button\" class=\"btn \" data-toggle=\"modal\" data-target=\"#inscription\" href =\"inscription.php\">
						Inscription
						</button></a></center></div>";
}
?>

<?php
include("css/nav/foot.php")
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
