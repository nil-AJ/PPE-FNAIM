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
	include("view/vue_modifcomercial.php");
	if(isset($_POST['enregModif'])){
		$tab = array();
		$tab['id_personne'] = $_SESSION["id"];
		$tab['nom'] = $_POST['nom'];
		$tab['prenom'] = $_POST['prenom'];
		$tab['email'] = $_POST['email'];
        $tab['telephone'] = $_POST['telephone'];
        $tab['password'] = sha1($_POST["password"]);
		$tab['sexe'] = $_POST['gender'];
		$tab['date_naissance'] = $_POST['bday'];
        $tab['droits'] = "user";
        $tab['perimetre_action'] = $_SESSION['perimetre_action'];
		$unControleur->updatecomercial($tab);
    echo "	<center>
        <div style=\" background-color:#00C851\" id=\"info2\" class=\"notification\">
        <span><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Modification enregistré!</span>
</div>
</center>";
} else {
        echo "
<center>
    <div style=\" background-color: #ff4444\" id=\"info1\" class=\"notification\">
        <span><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> err !</span>
    </div>
</center>
		";
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
