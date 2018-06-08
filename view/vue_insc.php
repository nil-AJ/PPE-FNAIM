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
           <h1 style='color: #666e76'><strong> Vous éte connecter</strong></h1><br>
          </center>
     </div>";
    echo "
   <div style='padding-bottom: 30%'>
   <form method ='post' action='index.php'>
     <center>
         <input style='background-color: black' class=\"btn\" type='submit' value ='Déconnexion' name='deco'>   
     </center>
     </form>
   </div>";
    if (isset($_POST['deco'])) {
        session_destroy();
        header("index.php");
    }
} else {
    echo "<br><br><br><br>
<div class=\"container\">
    <div class=\"justify-content-center\">
        <center>
            <div class=\"row\">
                <h2>Formulaire D'inscription</h2><br><br>
            </div>
        </center>
        <form method=\"post\" action=\"inscription.php\">
            <div class=\"row\">
                <div class=\"row\">
                 <div class=\"col-md-8 col-sm-8 col-lg-8\">
                        <div class=\"md-form\">
                            <div class=\"md-form\">
                                <input type=\"text\" name=\"prenom\" id=\"form2\" class=\"form-control\" required>
                                <label for=\"form2\" class=\"\">Prénom</label>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-8 col-sm-8 col-lg-8\">
                        <div class=\"md-form\">
                            <div class=\"md-form\">
                                <input type=\"text\" name=\"nom\" id=\"form1\" class=\"form-control\" required>
                                <label for=\"form1\" class=\"\">Nom</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-8 col-sm-8 col-lg-8\">
                        <div class=\"md-form\">
                            <div class=\"md-form\">
                                <input type=\"email\" name=\"email\" id=\"form3\" class=\"form-control\" required>
                                <label for=\"form3\" class=\"\">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-8 col-sm-8 col-lg-8\">
                        <div class=\"md-form\">
                            <div class=\"md-form\">
                                <input type=\"password\" name=\"password\" id=\"form4\" class=\"form-control\" required>
                                <label for=\"form34\" class=\"\">Password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class=\"row\">
                        <div class=\"col-md-8 col-sm-8 col-lg-8\">
                            <div class=\"md-form\">
                                <div class=\"md-form\">
                                    <input id=\"form5\" type=\"tel\" class=\"form-control\" name=\"phone\" length=\"10\" required>
                                    <label for=\"form5\">Telephone</label>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-8 col-sm-8 col-lg-8\">
                            <div class=\"md-form\">
                                <div class=\"md-form\">
                                    <input type=\"text\" name=\"departement\" id=\"form4\" class=\"form-control\" required>
                                    <label for=\"form34\" class=\"\">Departement</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-8 col-sm-8 col-lg-8\">
                        <div class=\"md-form\">
                            <div class=\"md-form\">
                                <div class=\"md-form\">
                                    <select name=\"gender\" class=\"custom-select\" id=\"form6\">
                                        <option selected>Votre SEXE ...</option>
                                        <option name=\"gender\" value=\"Male\"> Male</option>
                                        <option name=\"gender\" value=\"Female\">Female</option>
                                        <option name=\"gender\" value=\"Other\">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class=\"row\">
                    <div class=\"col-md-12 col-sm-12 col-lg-12\">
                        <div class=\"md-form\">
                            <div class=\"md-form\">
                                <br><br>
                                <input type=\"date\" id=\"form7\" name=\"bday\" required>
                                <label for=\"form7\" class=\"\">Date de naissance :</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <label for=\"form8\" class=\"custom-control custom-checkbox\">
        <input name=\"cd\" id=\"form8\" type=\"checkbox\" class=\"custom-control-input\" required>
        <span class=\"custom-control-indicator\"></span>
        Vous acceptez les Conditions d'utilisation et la Politique de confidentialité, notamment l'utilisation de
        cookies.
    </label>
    <center>
        <div style=\"padding-left: 150px\" class=\"row\">
            <div class=\"col-md-8 col-sm-8 col-lg-8\">
                <div class=\"form-inline\">
                    <button style='background-color: #f8d61e' type=\"submit\" name=\"inscrire\" class=\"btn \"
                            data-toggle=\"modal\" data-target=\"#inscription\" href=\"inscription.php\">
                        Inscription
                    </button>
                    <a href=\"connexion.php\">
                        <button style='background-color: black' type=\"button\" class=\"btn\" data-toggle=\"modal\"
                                data-target=\"#connexion\">
                            Connexion
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </center>
    </form>
</div>
</div>
<br><br><br><br><br><br><br>";
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



