<?php
error_reporting(0);
session_start();

if(!empty($_POST)){
    if(isset($_POST["mail"], $_POST["pass"]) && !empty($_POST["mail"]) && !empty($_POST["pass"])){
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];

        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $erreur = "adresse email invalide";
        }else{
            include "classes/Personnelle.php";
            include "connexion/connexion.php";
            $user = new personnelle(null, $mail, $pass, null);
            if(!$user->seconnecter($db)){
                $erreur = "adresse email / mot de passe incorrect";
            }
        }

    }else{
        $erreur = "formulaire incomplaite";
    }
}

include "html/header.php";
include "html/navder.php";
?>

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <div class="buttons">
            <button class="buttonsalle"><a href="index.php">revenir à l'accueil</a></button>
           <!-- <button class="buttonplanning"><a href="lerservation.php">LES PLANNINGS</a></button>-->
        </div>
</div>

<h3><?=$erreur ?? " "?></h3>

<div class="form">
<h1 class="htitre">connectez-vous</h1>
    <form method="post">
        
        <div>
            <label for="mail">E-mail:</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div>
            <label for="pass">Passe:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <input class="button" type="submit" value="Connecter">
        <p ><a class="lien" href="inscription.php">S'inscrire</a></p>
    </form>
</div>

<?php
include "html/fooder.php";

?>