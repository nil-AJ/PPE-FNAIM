<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>FNAIM</title>
    <meta charset="utf-8">
</head>
<body>
<?php
    include("controller/tableau_de_bord.php");
        $unControleur = new Tableau ("localhost", "essaippe", "root", "", "personne");
        include("view/vue_insc.php");
            if (isset($_POST['inscrire'])) {
                $tab = array();
                $tab['nom'] = "'".$_POST['nom']."'";
                $tab['prenom'] = "'".$_POST['prenom']."'";
                $tab['email'] = "'".$_POST['email']."'";
                $tab['telephone'] = "'".$_POST['phone']."'";
                $tab['password'] = "'".sha1($_POST['password'])."'";
                $tab['sexe'] = "'".$_POST['gender']."'";
                $tab['date_naissance'] = "'".$_POST['bday']."'";
                $tab['droits'] = "'user'";
                $tab['date_inscription'] = "'".date("Y-m-d")."'";
                $tab['departement'] = (int)$_POST['departement'];
                $tab['statut'] = 1;
                $unControleur->insertclient($tab);
             echo "<center>
            <div style=\" background-color:#00C851\" id=\"info4\" class=\"notification\">
            <span><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Vous êtes inscrit !</span>
            </div>
            </center>";
        }
echo "";
?>
<!-----alertG------>
<script>
    setTimeout('cacheDiv4()', 10000);

    function cacheDiv4() {
        $("#info4").hide("slow");
    }
</script>
<style type="text/css">
    .notification {
        display: block;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
        padding-top: 40px;
        position: fixed;
        top: 10%;
        color: white;
        right: auto;
        left: auto;
        border-radius: 4px;
    }
</style>
</body>
</html>		