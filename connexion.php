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
	include ("controller/tableau_de_bord.php");
	$unControleur = new Tableau ("localhost","essaippe","root","","personne");
	include("view/vue_connexion.php");
    $result = $unControleur->connexion();
    $unControleurcomercial = new Tableau("localhost","essaippe","root","","commercial");
    $resultcomercial = $unControleurcomercial->selectjoincomercial();
    $unControleurclient = new Tableau("localhost","essaippe","root","","client");
    $resultclient = $unControleurclient->selectjoinclient();
	if(isset($_POST['valider'])){
		if(!$result){
			echo "<center>
    <div style=\" background-color: #ff4444\" id=\"info1\" class=\"notification\">
        <span><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Mauvais identifiant ou mot de passe !</span>
    </div>
</center>";
		} else{
			echo "
			<center>
        <div style=\" background-color:#00C851\" id=\"info2\" class=\"notification\">
        <span><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Vous êtes connecté !</span>
</div>
</center>";

            echo "";

			$_SESSION["id"] = $result['id_personne'];
			$_SESSION["nom"] = $result['nom'];
            $_SESSION["prenom"] = $result['prenom'];
            $_SESSION["email"] = $result['email'];
            $_SESSION["telephone"] = $result['telephone'];
            $_SESSION["password"] = $result['password'];
            $_SESSION["sexe"] = $result['sexe'];
            $_SESSION["date_naissance"] = $result['date_naissance'];
            $_SESSION['statut'] = $result['statut'];
            if($_SESSION['statut'] == 1)
            {
                foreach ($resultclient as $value){
                    if ($value['id_personne'] == $result['id_personne']){
                        $departement = $value['departement'];
                        $dateInscription = $value['date_inscription'];
                        $_SESSION['departement'] = $departement;
                        $_SESSION["date_inscription"] = $dateInscription;
                    }
                }
            }else if ($_SESSION['statut'] == 2)
            {
                foreach ($resultcomercial as $value){
                    if ($value['id_personne'] == $result['id_personne']){
                        $perimetreaction = $value['perimetre_action'];
                        $dateembauche = $value['date_embauche'];
                        $nbvisite = $value['nb_visite'];
                        $_SESSION['perimetre_action'] = $perimetreaction;
                        $_SESSION["date_embauche"] = $dateembauche;
                        $_SESSION['nb_visite'] = $nbvisite;
                    }
                }
            }
        }
	}
?>
<!-----alertR------>
<script>
    setTimeout('cacheDiv1()', 10000);
    function cacheDiv1() {
        $("#info1").hide("slow");
    }
</script>
<!-----alertG------>
<script>
    setTimeout('cacheDiv2()', 10000);
    function cacheDiv2() {
        $("#info2").hide("slow");
    }
</script>
<style type="text/css">
    .notification{
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