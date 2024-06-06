<?php

class Equipement {
    private $idE;
    private $nomE;
    private $typeE;
    private $disponibleE;
    public function __construct(){
    }

    public function getId(){
        return $this->idE;
    }

    public function getNoms(){
        return $this->nomE;
    }

    public function getType(){
        return $this->typeE;
    }

    public function getDisponibleE(){
        return $this->disponibleE;
    }

    public function setDisponible($disponibleE){
        $this->disponibleE = $disponibleE;
    }

    public function setId($idE){
        $this->idE = $idE;
    }

    public function setNoms($nomE){
        $this->nomE = $nomE;
    }

    public function setType($typeE){
        $this->typeE = $typeE;
    }

    public function afficheEquipement($pdo){
        $requete = $pdo->query("SELECT * FROM equipement");
        $equipement = $requete->fetchAll();
        if($equipement){
            return $equipement;
        }else{
            return false;
        }
    } 

    public function afficheEquipementDispo($pdo){
        $requete = $pdo->query("SELECT * FROM equipement WHERE disponible = '1'");
        $equipement = $requete->fetchAll();
        if($equipement){
            return $equipement;
        }else{
            return false;
        }
    }

    public function afficheEquipementN($pdo){
        $requete = $pdo->query("SELECT * FROM equipement WHERE disponible = '0'");
        $equipement = $requete->fetchAll();
        if($equipement){
            return $equipement;
        }else{
            return false;
        }
    }

    public function ajouEquipement($pdo, $id){
        $requete = $pdo->query("UPDATE equipement SET disponible ='1' WHERE ide = $id");
        if($requete){
            return true;
        }else{
            return false;
        }
    }

    public function supprimEquipement($pdo, $id){
        $requete = $pdo->query("UPDATE equipement SET disponible = '0' WHERE ide = $id");
        if($requete){
            return true;
        }else{
            return false;
        }
    }
}

?>