<?php

if(!isset($_GET["id"]) || empty($_GET["id"])){
    header("location:gerereservation.php");
    exit();
}
$id = strip_tags($_GET["id"]);
    include "connexion/connexion.php";
    include "classes/Reservation.php";
    $reservation = new Reservation();
    if($reservation->supprimReservation($db, $id)){
        header("location:gerereservation.php");
        exit();
    }

?>