<?php
include ("model/model.php");
class Tableau{
	private $unModele;
	public function __construct($serveur, $bdd, $user, $mdp){
		$this->unModele = new model($serveur,$bdd,$user,$mdp);
	}
	public function selectAll(){
		return $this->unModele->selectAll();
	}
	public function showTable(){
		return $this->unModele->showTable();
	}
	public function setTable($uneTable){
		$this->unModele->setTable($uneTable);
	}
	public function selectLignes($p,$id){
		return $this->unModele->selectLignes($p,$id);
	}
	public function connexion(){
		return $this->unModele->connexion();
	}
	public function insert($tab){
		return $this->unModele->insert($tab);
	}
	public function rechercher($tab,$mot_cle){
		return $this->unModele->rechercher($tab,$mot_cle);
	}

}
?>