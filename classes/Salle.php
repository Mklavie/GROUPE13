<?php

class Salle {
    private $idS;
    private $nomS;
    private $capacite;
    private $image;
    private $disponible;

    public function __construct(){
    }

    public function getId(){
        return $this->id;
    }

    public function getNoms(){
        return $this->nomS;
    }

    public function getCapacite(){
        return $this->capacite;
    }

    public function getImage(){
        return $this->image;
    }

    public function getDisponible(){
        return $this->disponible;
    }

    public function setDisponible($disponible){
        $this->disponible = $disponible;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNoms($nomS){
        $this->nomS = $nomS;
    }

    public function setCapacite($capacite){
        $this->capacite = $capacite;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function afficheSalle($pdo){
        $requete = $pdo->query("SELECT * FROM salle");
        $salle = $requete->fetchAll();
        if($salle){
            return $salle;
        }else{
            return false;
        }
    } 

    public function afficheSalleDispo($pdo){
        $requete = $pdo->query("SELECT * FROM salle WHERE disponible = '1'");
        $salle = $requete->fetchAll();
        if($salle){
            return $salle;
        }else{
            return false;
        }
    }

    public function afficheSalleNDispo($pdo){
        $requete = $pdo->query("SELECT * FROM salle WHERE disponible = '0'");
        $salle = $requete->fetchAll();
        if($salle){
            return $salle;
        }else{
            return false;
        }
    }

    public function ajouSalle($pdo, $id){
        $requete = $pdo->query("UPDATE salle SET disponible ='1' WHERE ids = $id");
        if($requete){
            return true;
        }else{
            return false;
        }
    }

    public function supprimSalle($pdo, $id){
        $requete = $pdo->query("UPDATE salle SET disponible = '0' WHERE ids = $id");
        if($requete){
            return true;
        }else{
            return false;
        }
    }
}

?>