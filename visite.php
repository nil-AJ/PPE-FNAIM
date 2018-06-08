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
$unControleur = new Tableau ("localhost","essaippe","root","","visite, bien, personne");
if($_SESSION['statut'] == 1) {
    $result = $unControleur->affichageVisiteClient();
}else if ($_SESSION['statut'] == 2){
    $result = $unControleur->affichageVisiteCommercial();
}
include("view/vue_visite.php");
?>
</body>
</html>