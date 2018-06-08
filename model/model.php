<?php

class model
{
    private $pdo, $table;

    function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = null;
        try {
            $this->pdo = new PDO ("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $e) {
            Echo "Erreur de connexion";
        }
    }

    public function setTable($uneTable)
    {
        $this->table = $uneTable;
    }

    public function showTable()
    {
        return $this->table;
    }

    public function selectAll()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("SELECT * FROM  " . $this->table);
            $sql = $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            return null;
        }
    }

    public function selectVisite()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("");
            $sql = $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            return null;
        }
    }

    public function selectChamps($tab)
    {
        $champs = implode(",", $tab);
        $query = "SELECT " . $champs . " FROM " . $this->table;
        if ($this->pdo != null) {
            $recherche = $this->pdo->prepare($query);
            $recherche->execute();
            $result = $recherche->fetchAll();
        }
        return $result;
    }

    public function insertclient($tab)
    {
        $data = array();
        $parametres = array();
        foreach ($tab as $cle => $value) {
            $parametres[] = ":" . $cle;
            $data[":" . $cle] = $value;
        }
        $chaine = implode(",", $data);
        $query = "CALL insertclient (" . $chaine . ");";
        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($query);
            $insert->execute($data);
        }
    }

    public function insert($tab)
    {
        $data = array();
        $parametres = array();
        foreach ($tab as $cle => $value) {
            $parametres[] = ":" . $cle;
            $data[":" . $cle] = $value;
        }
        $chaine = implode(",", $parametres);
        $query = "INSERT INTO " . $this->table . " VALUES (null," . $chaine . ");";
        echo $query;
        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($query);
            $insert->execute($data);
        }
    }

    public function rechercher($tab, $mot_cle)
    {
        $champs = array();
        foreach ($tab as $value) {
            $champs[] = $value . " like :mot_cle";
        }
        $chaine = implode(" or ", $champs);


        $query = "SELECT * FROM " . $this->table . " WHERE " . $chaine . ";";
        $data = array(":mot_cle" => "%" . $mot_cle . "%");
        if ($this->pdo != null) {
            $recherche = $this->pdo->prepare($query);
            $recherche->execute($data);
            $result = $recherche->fetchAll();
            return $result;
        } else {
            return null;
        }
    }
    public function supprimer($tab)
    {
        $data = array();
        $champs = array();
        foreach ($tab as $key => $value) {
            $champs[] = $key . " = :" . $key;
            $data[":" . $key] = $value;
        }
        $chaine = implode(" and ", $champs);
        $query = "DELETE from " . $this->table . " where " . $chaine . ";";
        if ($this->pdo != null) {
            $delete = $this->pdo->prepare($query);
            $delete->execute($data);
        }

    }
    public function selectLignes($p, $id, $type)
    {
        $query = "SELECT * FROM " . $this->table . " b INNER JOIN " . $type . " t ON b." . $p . " = t." . $p . " and b." . $p . "=" . $id . ";";
        $donnees = array(":" . $p => $id);
        if ($this->pdo != null) {
            $recherche = $this->pdo->prepare($query);
            $recherche->execute($donnees);
            $result = $recherche->fetchAll();
            return $result;
        } else {
            return null;
        }
    }

    public function connexion()
    {
        if (isset($_POST['valider'])) {
            $password = sha1($_POST['password']);
            $email = $_POST['email'];
            $req = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE password = :password AND email = :email');
            $req->execute(array(
                'password' => $password,
                'email' => $email));
            $resultat = $req->fetch();
            return $resultat;
        }
    }

    public function selectjoincomercial()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("SELECT * FROM personne p INNER JOIN commercial r ON p.id_personne = r.id_personne");
            $sql = $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            return null;
        }
    }

    public function selectjoinclient()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("SELECT * FROM personne p INNER JOIN client c ON p.id_personne = c.id_personne");
            $sql = $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            return null;
        }
    }

    public function selectJoin()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("SELECT b.type, b.id_bien, b.surface, b.prix, b.statut, b.adresse, b.ville, b.piece, b.chambre, b.eaux, a.ascenseur, a.balcon, a.place_parking FROM bien b INNER JOIN appartement a ON b.id_bien = a.id_bien");
            $query2 = $this->pdo->prepare("SELECT b.type, b.id_bien, b.surface, b.prix, b.statut, b.adresse, b.ville, b.piece, b.chambre, b.eaux, m.surface_terrain, m.cave, m.grenier FROM bien b INNER JOIN maison m ON b.id_bien = m.id_bien");
            $sql = $query->execute();
            $sql2 = $query2->execute();
            $farray = $query->fetchAll();
            $sarray = $query2->fetchAll();
            $result = array_merge($farray, $sarray);
            return $result;
        } else {
            return null;
        }
    }

    public function updateclient($tab)
    {
        $data = array();
        $parametres = array();
        foreach ($tab as $cle => $value) {
            $parametres[] = ":" . $cle;
            $data[":" . $cle] = $value;
        }
        $chaine = implode(",", $parametres);
        $query = "CALL updateclient (" . $chaine . ");";
        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($query);
            $insert->execute($data);
        }
    }

    public function updatecomercial($tab)
    {
        $data = array();
        $parametres = array();
        foreach ($tab as $cle => $value) {
            $parametres[] = ":" . $cle;
            $data[":" . $cle] = $value;
        }
        $chaine = implode(",", $parametres);
        $query = "CALL updatecommercial (" . $chaine . ");";
        if ($this->pdo != null) {
            $insert = $this->pdo->prepare($query);
            $insert->execute($data);
        }
    }

    public function mincomvisite($datev,$heurev)
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("INSERT INTO visite VALUES (null,'".$datev."','".$heurev."','en cours',".$_GET['bien'].",".$_SESSION['id'].",(select p.id_personne from personne p inner join commercial c on c.nb_visite=(select min(nb_visite) from commercial) and p.id_personne=c.id_personne))");
            $query->execute();
        } else {
            return null;
        }
    }
    public function affichagevisiteCommercial()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("SELECT v.id_visite, v.id_bien, v.date_visite, v.heure, v.etat, v.id_commercial, b.ville, b.adresse, p.nom, p.prenom FROM visite v inner join bien b on v.id_bien = b.id_bien inner join personne p on p.id_personne= v.id_personne");
            $sql = $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            return null;
        }
    }
    public function affichagevisiteClient()
    {
        if ($this->pdo != null) {
            $query = $this->pdo->prepare("SELECT v.id_visite, v.id_bien, v.date_visite, v.heure, v.etat, v.id_personne, b.ville, b.adresse, p.nom, p.prenom FROM visite v inner join bien b on v.id_bien = b.id_bien inner join personne p on p.id_personne= v.id_commercial");
            $sql = $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            return null;
        }
    }
}
?>