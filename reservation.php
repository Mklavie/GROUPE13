<?php
error_reporting(0);
session_start();

if(!$_SESSION["personnelle"]){

    header("location:index.php");
    exit();

}

include "classes/Reservation.php";
include "classes/Personnelle.php";

include "connexion/connexion.php";

$requete = $db->query("SELECT * FROM salle WHERE disponible = '1'");
$salle = $requete->fetchAll();

$requete = $db->query("SELECT * FROM equipement WHERE disponible = '1'");
$equipement = $requete->fetchAll();

$requete = $db->query("SELECT * FROM personne");
$personne = $requete->fetchAll();

if(!empty($_POST)){
    if(isset($_POST["datte"], $_POST["heur"], $_POST["dure"], $_POST["salle"], $_POST["equipement"], $_POST["personne"], $_POST["departement"], $_POST["mail"], $_POST["pass"], $_POST["titre"])
        && !empty($_POST["datte"]) && !empty($_POST["heur"]) && !empty($_POST["dure"]) && !empty($_POST["salle"]) && !empty($_POST["equipement"]) 
        && !empty($_POST["personne"]) && !empty($_POST["departement"]) && !empty($_POST["mail"]) && !empty($_POST["pass"]) && !empty($_POST["titre"])){
        if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
            die("adresse email invalide");
        }

        $personne = new Personnelle(null, $_POST["mail"], $_POST["pass"], $_POST["titre"]);
        $personnes = $personne->verifiePesonnelle($db);

        if(!password_verify($_POST["pass"], $personnes["pass"])){
            die("mot de passe incorrecte");
        }

        $reservation = new Reservation();
       $numero = $reservation->reserver($db, $_POST["datte"], $_POST["heur"], $_POST["dure"], $_POST["salle"], $_POST["equipement"], $_POST["personne"], $_POST["departement"]);
            //die("reservation sffectue!");
        if($numero){ 

            $erreur = "reservation effectuer sur le numero $numero";

       }
        

}else{
    $erreur = "FORMULAIRE INCOMPLET";
}


}






include "html/header.php";
include "html/navder.php";

?>

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i><?=$_SESSION["personnelle"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>

<h3><?=$erreur ?? " "?></h3>
   <div class="exterier">
    <form method="post">
    <div class="form plus">
    <h1 class="htitre">INFORMATION DU RESERVATION</h1>
    <div class="interier">
        <div>
            <label for="datte">Datte:</label>
            <input type="date" name="datte" id="datte">
        </div>
        <div>
            <label for="heur">Heure:</label>
            <input type="time" name="heur" id="heur">
        </div>
        <div>
            <label for="dure">Dure:</label>
            <select name="dure" id="dure">
                <option value=""></option>
                <option value="1H">1H</option>
                <option value="2H">2H</option>
                <option value="3H">3H</option>
                <option value="4H">4H</option>
                <option value="5H">5H</option>
                <option value="6H">6H</option>
            </select>
        </div>
        <div>
            <label for="salle">Salle:</label>
            <select name="salle" id="salle">
                <option value=""></option>
                <?php foreach($salle as $salles) : ?>
                <option value="<?=$salles["ids"]?>"><?=$salles["noms"]?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="equpement">Equipement:</label>
            <select name="equipement" id="equipement">
                <option value=""></option>
                <?php foreach($equipement as $equipements) : ?>
                <option value="<?=$equipements["ide"]?>"><?=$equipements["nome"]?><?=$equipements["type"]?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="form plus">
    <h1 class="htitre">INFORMATION DU PERSONNELLE</h1>
    <div class="interier">
        <div>
            <label for="personne">Personne:</label>
            <select name="personne" id="personne">
                <option value=""></option>
                <?php foreach($personne as $personnes) : ?>
                <option value="<?=$personnes["id_pr"]?>"><?=$personnes["nom"]?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="titre">Titre:</label>
            <select name="titre" id="titre">
                <option value=""></option>
                <option value="Mr">Mr.</option>
                <option value="Dr">Dr.</option>
                <option value="Pr">Pr.</option>
            </select>
        </div>
        <div>
            <label for="departement">Departement:</label>
            <select name="departement" id="departement">
                <option value=""></option>
                <option value="BIOLOGIE">BIOLOGIE</option>
                <option value="CHIMIE">CHIMIE</option>
                <option value="GEOLOGIE">GEOLOGIE</option>
                <option value="MATH-INFO">MATH-INFO</option>
                <option value="PHISIQUE">PHISIQUE</option>
            </select>
        </div>
        <div>
            <label for="mail">E-mail:</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div>
            <label for="pass">Passe:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <input type="submit" value="valider">
    </div>
    </div>
    </form>
</div>


<?php
include "html/fooder.php";
?>