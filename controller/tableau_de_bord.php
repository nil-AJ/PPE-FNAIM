<?php
include ("model/model.php");
class Tableau{
	private $unModele;
	public function __construct($serveur, $bdd, $user, $mdp, $table){
		$this->unModele = new model($serveur,$bdd,$user,$mdp);
		$this->unModele->setTable($table);
	}
	public function selectAll(){
		return $this->unModele->selectAll();
	}
	public function setTable($uneTable){
		$this->unModele->setTable($uneTable);
	}
	public function selectLignes($p,$id,$type){
		return $this->unModele->selectLignes($p,$id,$type);
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
	public function insertclient($tab){
		return $this->unModele->insertclient($tab);
	}
    public function selectjoincomercial(){
        return $this->unModele->selectjoincomercial();
    }
    public function selectjoinclient(){
        return $this->unModele->selectjoinclient();
    }
    public function selectJoin(){
        return $this->unModele->selectJoin();
    }
    public function  updateclient($tab){
        return $this->unModele->updateclient($tab);
    }
    public function updatecomercial($tab){
        return $this->unModele->updatecomercial($tab);
    }
    public function mincomvisite($datev,$heurev){
        return $this->unModele->mincomvisite($datev,$heurev);
    }
    public function vueSelectVisiteclient(){
        return $this->unModele->vueSelectVisiteclient();
    }
    public function affichageVisiteCommercial(){
        return $this->unModele->affichageVisiteCommercial();
    }
    public function affichageVisiteClient(){
        return $this->unModele->affichageVisiteClient();
    }
}
?>