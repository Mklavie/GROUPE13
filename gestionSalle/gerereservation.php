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
include "classes/Reservation.php";
include "connexion/connexion.php";

$reservation = new Reservation();

//$reservation->confirmeReservation($db, 1);
$toutes = $reservation->afficheTReservation($db);
$reservations = $reservation->afficheReservation($db);
$dispo = $reservation->afficheReservationNV($db);

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
        <section>
            <h1>LES RESERVATIONS</h1>
        <table>
        <thead>
                <tr>
                    <th class="reduire">numero</th>
                    <th class="reduire">departement</th>
                    <th>reserveur</th>
                    <th>salle</th>
                    <th>equipement et type</th>
                    <th>datte</th>
                    <th>heure</th>
                    <th>duree</th>
                    <th>annuler</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($reservations as $reservationr) : ?>
                <tr>
                    <td class="reduire"><?=$reservationr["idr"]?></td>        
                    <td class="reduire"><?=$reservationr["departement"]?></td>
                    <td><?=$reservationr["titre"]?><?=$reservationr["nom"]?></td>
                    <td><?=$reservationr["noms"]?></td>
                    <td><?=$reservationr["nome"]?><?=$reservationr["type"]?></td>
                    <td><?=$reservationr["datte"]?></td>
                    <td><?=$reservationr["heur"]?></td>
                    <td><?=$reservationr["dure"]?></td>
                    <td class="ajouter"><a href="annulerreservation.php?id=<?=$reservationr["idr"]?>" class="annuler">annuler</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>
        <section>
            <h1>LES RESERVATIONS A CONFIRMER</h1>
        <table>
            <thead>
                <tr>
                    <th class="reduire">numero</th>
                    <th class="reduire">departement</th>
                    <th>reserveur</th>
                    <th>salle</th>
                    <th>equipement et type</th>
                    <th>datte</th>
                    <th>heure</th>
                    <th>duree</th>
                    <th>annuler</th>
                    <th>confirmer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($dispo as $dispos) : ?>
                <tr>
                    <td class="reduire"><?=$dispos["idr"]?></td>        
                    <td class="reduire"><?=$dispos["departement"]?></td>
                    <td><?=$dispos["titre"]?><?=$dispos["nom"]?></td>
                    <td><?=$dispos["noms"]?></td>
                    <td><?=$dispos["nome"]?><?=$dispos["type"]?></td>
                    <td><?=$dispos["datte"]?></td>
                    <td><?=$dispos["heur"]?></td>
                    <td><?=$dispos["dure"]?></td>
                    <td class="supprime" ><a href="annulerreservation.php?id=<?=$dispos["idr"]?>" class="annuler">annuler</a></td>
                    <td class="ajouter"><a href="confirmreservation.php?id=<?=$dispos["idr"]?>" class="valider">confirmer</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>
    </div>
    <div>
        <section>
            <h1>LES RESERVATIONSs</h1>
        <table>
        <thead>
                <tr>
                    <th class="reduire">numero</th>
                    <th class="reduire">departement</th>
                    <th>reserveur</th>
                    <th>salle</th>
                    <th>equipement et type</th>
                    <th>datte</th>
                    <th>heure</th>
                    <th>duree</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($toutes as $toute) : ?>
                <tr>
                    <td class="reduire"><?=$toute["idr"]?></td>        
                    <td class="reduire"><?=$toute["departement"]?></td>
                    <td><?=$toute["titre"]?><?=$toute["nom"]?></td>
                    <td><?=$toute["noms"]?></td>
                    <td><?=$toute["nome"]?><?=$toute["type"]?></td>
                    <td><?=$toute["datte"]?></td>
                    <td><?=$toute["heur"]?></td>
                    <td><?=$toute["dure"]?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>
        <section>
    </div>


</div>

<?php
include "html/fooder.php";
?>