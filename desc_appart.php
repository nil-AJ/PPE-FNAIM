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
	$bien = $_GET['bien'];
	include ("controller/tableau_de_bord.php");
	$unControleur = new Tableau ("localhost","essaippe","root","","bien");
	$result = $unControleur->selectLignes("id_bien",$bien,$_GET['type']);
	include("view/Viewdesc.php");
	if(isset($_POST['pvisite'])){
        $unControleur->mincomvisite($_POST['datevisite'],$_POST['heurevisite'].":00");
    }
	echo "";
	?>
</body>
</html>