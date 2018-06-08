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
$unControleur = new Tableau ("localhost","essaippe","root","","bien");
$tab = array("surface","prix","statut","adresse");
$result = $unControleur->rechercher($tab,$_POST['search']);
if ($result){
    echo "";
}else{
    echo "<div class='resulta'><center><h1 style='color: #666e76'>0 Résultat trouvé</h1><br>
<h3 style='color: #666e76'>réessayer</h3>
</center></div>";
}
include("view/vue_acc.php");
echo "";
?>
<style>
    .resulta{
        position: absolute;
        padding-top: 10%;
        padding-left: 50%;
    }
</style>
</body>
</html>