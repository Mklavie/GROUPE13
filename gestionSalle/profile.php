<?php
error_reporting(0);
session_start();

if(!$_SESSION["personnelle"]){

    header("location:index.php");
    exit();

}

include "html/header.php";
include "html/navder.php";
?>


<div class="contenu">
    <div class="accueil">
        <h1 class="accueil-titre">GESITION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i><?=$_SESSION["personnelle"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
    </div>
    <div class="images">
        <div class="image">
            <h1>SALLE 150AFS</h1>
            <img src="image/150A.jpg" alt="">
            <p>une salle tres confortable avec des tables banc et un taleau verte</p>
        </div>
        <div class="image">
            <h1>SALLE 150AFS</h1>
            <img src="image/150A.jpg" alt="">
            <p>une salle tres confortable avec des tables banc et un taleau verte</p>
        </div>
        <div class="image">
            <h1>SALLE 150AFS</h1>
            <img src="image/150A.jpg" alt="">
            <p>une salle tres confortable avec des tables banc et un taleau verte</p>
        </div>    
    </div>
</div>

<?php

include "html/fooder.php";

?>