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
    echo "<div style='padding-top: 10%'>
          <center>
           <h1 style='color: #666e76'><strong> Vous êtes connecter</strong></h1><br>
          </center>
     </div>";
    echo "
   <div style='padding-bottom: 30%'>
   <form method ='post'>
     <center>
         <input style='background-color: black' class=\"btn\" type='submit' value ='Déconnexion' name='deco'>   
     </center>
     </form>
   </div>";
    if (isset($_POST['deco'])) {
        session_destroy();
        header("Refresh:0");
    }
} else {
    echo "<div class=\"container-fluid\">
        <div style=\"padding-top: 10%; padding-bottom: 10%; \" class=\"row  justify-content-md-center\">
            <center>
            <div  class=\"col-12\">
                <div style=\"background-color: white\" class=\"col-12 card\">
                    <br>
                    <i class=\"fa fa-users fa-3x\" aria-hidden=\"true\"></i>
                    <br>
                    <h1><strong>Connexion</strong></h1>
                    <br>
                </div>
                <br><br><br>
                <form class=\"center col-12\" method=\"post\" action=\"connexion.php\">
                    <div class=\"md-form form-inline form-group\">
                        <i class=\"fa fa-envelope prefix\" aria-hidden=\"true\"></i>
                        <input type=\"text\" name=\"email\" required>
                        <label for=\"form91\" data-error=\"wrong\" data-success=\"right\">Mail</label>
                    </div>
                    <br>
                    <div class=\"md-form form-inline form-group\">
                        <i class=\"fa fa-unlock-alt  prefix\" aria-hidden=\"true\"></i>
                        <input type=\"password\" name=\"password\" required>
                        <label for=\"form92\" data-error=\"wrong\" data-success=\"right\">Password</label>
                    </div>
                    <br><br>
                    <div class=\"row d-flex align-items-center mb-6\">
                        <div class=\"col-md-6\">
                            <input  style=\"background-color: black\" name=\"valider\" value=\"Connexion\" type=\"submit\"
                                   class=\"btn \">
                        </div>
                        <div class=\"col-md-6\">
                            <a href=\"index.php\">
                                <button style=\"background-color:#f8d61e \" type=\"button\" class=\"btn  btn-block\">Acceuil</button>
                            </a>
                        </div>
                </form><br><br><br><br><br>
            </center>
            </div>
        </div>
    </div>";
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





