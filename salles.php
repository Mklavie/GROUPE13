<?php
error_reporting(0);
session_start();
include "html/header.php";
include "html/navder.php";
include "classes/Salle.php";
include "connexion/connexion.php";

$salle = new Salle();

$toute = $salle->afficheSalle($db);
$dispo = $salle->afficheSalleDispo($db);

?>

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i><?=$_SESSION["personnelle"]["mail"]?></a> </P>
        <div class="buttons">
            <button class="buttonsalle">LES SALLES</button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>

<div class="contenu">
    <div class="images">
    <?php foreach($dispo as $dispos) : ?>
            <div class="image">
                <h1 class="accueil-titre"><?=$dispos["noms"]?></h1>
                <img src="image/<?=$dispos["inage"]?>" alt="">
                <p>une salle tres confortable avec des tables banc et un taleau verte</p>
            </div>
    <?php endforeach;?>
    </div>
</div>




<?php

include "html/fooder.php";

?>