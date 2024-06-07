<?php

include "connexion/connexion.php";

$sql = "SELECT * FROM reservation ";

$requete = $db->query($sql);

$resultat = $requete->fetchAll();

$heur1 = new DateTime("22:00:00");

$heur2 = new DateTime("00:00:30");

$heur = $heur1->diff($heur2)->i;



foreach($resultat as $resultats){

    if($resultats["heur"] == $heur1){

        return true;
    }

    return false;

}






var_dump(($heur1->modify('+15 minutes')));

?>