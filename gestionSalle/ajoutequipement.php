<?php

if(!isset($_GET["id"]) || empty($_GET["id"])){
    header("location:gerequipement.php");
    exit();
}
$id = strip_tags($_GET["id"]);
    include "connexion/connexion.php";
    include "classes/Equipement.php";
    $equipement = new Equipement();
    if($equipement->ajouEquipement($db, $id)){
        header("location:gerequipement.php");
        exit();
    }




?>