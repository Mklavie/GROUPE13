<?php
error_reporting(0);
session_start();

if(!$_SESSION["personnelle"]){

    header("location:index.php");
    exit();

}

if(!$_SESSION["admin"]){

    header("location:index.php");
    exit();

}

include "html/header.php";
include "html/navder.php";
include "classes/Equipement.php";
include "connexion/connexion.php";

$equipement = new Equipement();

$equipe = $equipement->afficheEquipement($db);
$toute = $equipement->afficheEquipementN($db);
$dispo = $equipement->afficheEquipementDispo($db);

?>

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i> <?=$_SESSION["admin"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>

<div class="contenue">
    <div>
        <section class="tablesalle">
        <h1>LES EQUIPEMENTS DISPONIBLES</h1>
        <table class="tableplus">
            <thead>
                <tr>
                    <th>munero</th>
                    <th>equipement</th>
                    <th>type</th>
                    <th>ajouter</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($dispo as $dispos) : ?>
                <tr>
                    <td><?=$dispos["ide"]?></td>        
                    <td><?=$dispos["nome"]?></td>
                    <td><?=$dispos["type"]?></td>
                    <td class="supprime"><a href="supprimequipement.php?id=<?=$dispos["ide"]?>" class="button-sup">supprimer</a></td>
                    
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>

        <section class="tablesalle" >
        <h1>TOUTES LES EQUIPEMENTS</h1>
        <table class="tableplus" >
            <thead>
                <tr>
                    <th>munero</th>
                    <th>equipement</th>
                    <th>type</th>
                    <th>supprimer</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach($toute as $toutes) : ?>
                <tr>
                    <td><?=$toutes["ide"]?></td>        
                    <td><?=$toutes["nome"]?></td>
                    <td><?=$toutes["type"]?></td>
                    <td class="ajouter"><a href="ajoutequipement.php?id=<?=$toutes["ide"]?>" class="button-ajout">ajouter</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>
    </div>
    <div>

        <section class="tablesalle" >
                <h1>LES EQUIPEMENTS DISPONIBLES</h1>
            <table class="tableplus" >
                <thead>
                    <tr>
                        <th>munero</th>
                        <th>equipement</th>
                        <th>type</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($equipe as $equip) : ?>
                    <tr>
                        <td><?=$equip["ide"]?></td>        
                        <td><?=$equip["nome"]?></td>
                        <td><?=$equip["type"]?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </section>

    </div>


</div>


<?php

include "html/fooder.php";

?>