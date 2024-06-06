<?php
class Reservation{
    private $idR;
    private $datte;
    private $heur; 
    private $dure;
    private $reserver;

    public function __construct(){
    }

    public function afficheReservation($pdo){
        $sql = "SELECT * FROM reservation,salle,personne,equipement WHERE reservation.idp = personne.id_pr AND reservation.ids = salle.ids AND reservation.ide = equipement.ide AND reserver = '1'";
        $requete = $pdo->query($sql);
        $reservation =$requete->fetchAll();
        if($reservation){
            return $reservation;
        }else{
            return false;
        }
    }


    public function afficheTReservation($pdo){
        $sql = "SELECT * FROM reservation,salle,personne,equipement WHERE reservation.idp = personne.id_pr AND reservation.ids = salle.ids AND reservation.ide = equipement.ide";
        $requete = $pdo->query($sql);
        $reservation =$requete->fetchAll();
        if($reservation){
            return $reservation;
        }else{
            return false;
        }
    }

    public function afficheReservationNV($pdo){
        $sql = "SELECT * FROM reservation,salle,personne,equipement WHERE reservation.idp = personne.id_pr AND reservation.ids = salle.ids AND reservation.ide = equipement.ide AND reserver = '0'";
        $requete = $pdo->query($sql);
        $reservation =$requete->fetchAll();
        if($reservation){
            return $reservation;
        }else{
            return false;
        }
    }

    public function confirmeReservation($pdo, $idr){
        $sql = "UPDATE reservation SET reserver = '1' WHERE idr = $idr ";
        $requete = $pdo->query($sql);
        if($requete){
            return true;
        }else{
            return false;
        }
    } 

    public function supprimReservation($pdo, $idr){
        $sql = "DELETE FROM reservation WHERE idr = $idr";
        $requete = $pdo->query($sql);
        if($requete){
            return true;
        }else{
            return false;
        }
    }

    public function verifiReservation($pdo, $datte, $heur, $ids){

        $sql = "SELECT * FROM reservation WHERE datte = :datte AND heur = :heur AND ids = :ids ";
        $requete = $pdo->prepare($sql);
        $requete->bindValue(":datte", $datte);
        $requete->bindValue(":heur", $heur);
        $requete->bindValue(":ids", $ids);
        $requete->execute();
        $verifi = $requete->fetch();
        if($verifi){
            return true;
        }else{
            return false;
        }
    }

    public function reserver($pdo, $datte, $heur, $dure, $ids, $ide, $idp, $departement){

        $verifi = $this->verifiReservation($pdo, $datte, $heur, $ids);
        if(!$verifi){

        $sql = "INSERT INTO reservation (datte, heur, dure, ids, ide, idp, departement) VALUES (:datte, :heur, :dure, :ids, :ide, :idp, :departement)";
        $requete = $pdo->prepare($sql);
        $requete->bindValue(":datte", $datte);
        $requete->bindValue(":heur", $heur);
        $requete->bindValue(":dure", $dure);
        $requete->bindValue(":ids", $ids);
        $requete->bindValue(":ide", $ide);
        $requete->bindValue(":idp", $idp);
        $requete->bindValue(":departement", $departement);
        if($requete->execute()){

            $numero = $pdo->lastInsertId();

            return $numero;
        }else{
            return false;
        }

         }

         return false;

    }
}