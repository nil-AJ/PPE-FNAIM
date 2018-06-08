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
?>
<?php
if (isset($_SESSION['id'])) {
    echo "
<div class=\"container-fluid\">
    <div style='padding-top: 10%; padding-bottom: 10%' class=\"row\">
        <div class=\"col-md-4 col-lg-4 \" align=\"center\">
            <i class=\"fa fa-5x fa-user-circle\" aria-hidden=\"true\"></i> <br>
            <h3 style='padding-top: 3%'>Mon Compte</h3>
            <form style='padding-top: 2%' method ='post' action='index.php'>
               <input style='background-color: black; ' class=\"btn \" type='submit' value = 'Déconnexion' name = 'deco'>           
            </form>
        </div>
        <div class=\" col-md-5 col-lg-5 \">
            <table class=\"table table-bordered table-hover table-user-information\">
                <tbody>
                 <tr>
                    <td><strong>Prénom :</strong></td>
                    <td>" . $_SESSION["prenom"] . "</td>
                </tr>
                <tr>
                    <td><strong>Nom :</strong></td>
                    <td>" . $_SESSION["nom"] . "</td>
                </tr> 
              
                <tr>
                    <td><strong>Email :</strong></td>
                    <td>" . $_SESSION["email"] . "</td>
                </tr>
                <tr>
                    <td><strong>Password :</strong></td>
                    <td style='font-size: 65%'><i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i>
 <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i> <i class=\"fa fa-circle\" aria-hidden=\"true\"></i></td>
                </tr>
                <tr>
                    <td><strong>Telephone :</strong></td>
                    <td>" . $_SESSION["telephone"] . "</td>
                </tr>
                <tr>
                    <td><strong>Date de naissance :</strong></td>
                    <td>" . $_SESSION["date_naissance"] . "</td>
                </tr>
                <tr>
                    <td><strong>Genre :</strong></td>
                    <td>" . $_SESSION["sexe"] . "</td>
                </tr>
                ";
if($_SESSION['statut'] == 1)
{
    echo "      
                <tr>
                    <td><strong>Département :</strong></td>
                    <td>".$_SESSION['departement']."</td>
                </tr>
                 <tr>
                    <td><strong>Date d'inscription :</strong></td>
                    <td>".$_SESSION['date_inscription']."</td>
                </tr>
                </tbody>
            </table>
            <div style='padding-top: 3%'>
            <center>
                       <a href='modifclient.php'><button style='background-color: dodgerblue; ' class=\"btn \" type='submit' name =''>Modifier mon compte</button></a>
            </center>
            </div>
        </div>
    </div>
</div>";
}else if ($_SESSION['statut'] == 2)
{
    echo " <tr>
                    <td><strong>Périmetre d'action :</strong></td>
                    <td>".$_SESSION['perimetre_action']."</td>
                </tr>

                <tr>
                    <td><strong>Date d'emboche :</strong></td>
                    <td>".$_SESSION['date_embauche']."</td>
                </tr>
                <tr>
                    <td><strong>nombre de visite :</strong></td>
                    <td>".$_SESSION['nb_visite']."</td>
                </tr>
                </tbody>
            </table>
            <div style='padding-top: 3%'>
            <center>
                       <a href='modifcomercial.php'><button style='background-color: dodgerblue; ' class=\"btn \" type='submit' name =''>Modifier mon compte</button></a>
            </center>
            </div>
        </div>
    </div>
</div>";
}
    if (isset($_POST['deco'])) {
        session_destroy();
        header("index.php");
    }
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



