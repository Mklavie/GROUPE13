<?php
error_reporting(0);
session_start();

/*if(!$_SESSION["personnelle"]){

    header("location:index.php");
    exit();

}*/

include "html/header.php";
include "html/navder.php";
include "connexion/connexion.php";
include "classes/Reservation.php";


$reservation = new Reservation();

//$reservation->confirmeReservation($db, 1);
$toutes = $reservation->afficheTReservation($db);
$reservations = $reservation->afficheReservation($db);
$dispo = $reservation->afficheReservationNV($db);

?>

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i> <?=$_SESSION["personnelle"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning">LES PLANNINGS</button>
        </div>
</div>

<div class="reservation">
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
                </tr>
            </thead>
            <tbody>
            <?php foreach($reservations as $reservationr) : ?>
                <tr>
                    <td class="reduire"><?=$reservationr["idr"]?></td>        
                    <td class="reduire"><?=$reservationr["departement"]?></td>
                    <td><?=$reservationr["titre"]?><?=$reservationr["nom"]?></td>
                    <td><?=$reservationr["noms"]?></td>
                    <td><?=$reservationr["nome"]?> <?=$reservationr["type"]?></td>
                    <td><?=$reservationr["datte"]?></td>
                    <td><?=$reservationr["heur"]?></td>
                    <td><?=$reservationr["dure"]?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </section>
</div>
<?php



include "html/fooder.php";
?>