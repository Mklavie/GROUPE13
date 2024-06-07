<?php
if(!isset($_GET["id"]) || empty($_GET["id"])){
    header("location:geresalle.php");
    exit();
}
$id = strip_tags($_GET["id"]);
    include "connexion/connexion.php";
    include "classes/Salle.php";
    $salle = new Salle();
    if($salle->ajouSalle($db, $id)){
        header("location:geresalle.php");
        exit();
    }

?>