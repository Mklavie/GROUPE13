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

include "classes/Salle.php";
include "connexion/connexion.php";

$salle = new Salle();

$lesalle = $salle->afficheSalle($db);
$toute = $salle->afficheSalleNDispo($db);
$dispo = $salle->afficheSalleDispo($db);

?>
<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i><?=$_SESSION["admin"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>

<div class="contenue">
    <div>
        <section class="tablesalle">
        <h1>LES SALLES DISPONIBLE</h1>
        <table class="tableplus">
            <thead>
                <tr>
                    <th>numero</th>
                    <th>salle</th>
                    <th>capaciter</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($dispo as $dispos) : ?>
                <tr>
                    <td><?=$dispos["ids"]?></td>        
                    <td><?=$dispos["noms"]?></td>
                    <td><?=$dispos["capacite"]?></td>
                    <td class="supprime"><a href="supprimesalle.php?id=<?=$dispos["ids"]?>" class="button-sup">supprimer</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>

        <section class="tablesalle">
        <h1>LES SALLES NON DISPONIBLE</h1>
        <table class="tableplus">
            <thead>
                <tr>
                    <th>numero</th>
                    <th>salle</th>
                    <th>capacite</th>
                    <th>ajouter</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($toute as $toutes) : ?>
                <tr> 
                    <td><?=$toutes["ids"]?></td>     
                    <td><?=$toutes["noms"]?></td>
                    <td><?=$toutes["capacite"]?></td>
                    <td class="ajouter"><a href="ajousalle.php?id=<?=$toutes["ids"]?>" class="button-ajout">ajouter</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>
    </div>

    <div>
    <section class="tablesalle">
    <h1>TOUTES LES SALLES</h1>
        <table class="tableplus">
            <thead>
                <tr>
                    <th>numero</th>
                    <th>salle</th>
                    <th>capaciter</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lesalle as $lesall) : ?>
                <tr>
                    <td><?=$lesall["ids"]?></td>        
                    <td><?=$lesall["noms"]?></td>
                    <td><?=$lesall["capacite"]?></td>
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