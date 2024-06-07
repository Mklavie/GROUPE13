<?php
error_reporting(0);
session_start();
if(!empty($_POST)){

    if(isset($_POST["nom"], $_POST["email"], $_POST["pass"], $_POST["titre"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["titre"])){
        $nom = strip_tags($_POST["nom"]);
        $titre = strip_tags($_POST["titre"]);
        $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);
        $mail = $_POST["email"];
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $erreur = "adresse email invalide";
        }
        include "connexion/connexion.php";
        include "classes/Personnelle.php";
        $user = new Personnelle($nom, $mail, $pass, $titre);
        if(!$user->inscritPersonnelle($db)){

            $erreur = "inscription echouer";

        }
    }else{

        $erreur = "formulaire incomplet";

    }

}

include "html/header.php";
include "html/navder.php";

?> 

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>

<h3><?=$erreur ?? " "?></h3>

<div class="form">
    <h1 class="htitre">INSCRIVEZ-VOUS</h1>
    <form method="post">
        <div>
            <label for="titre">Titre:</label>
            <select name="titre" id="titre">
                <option value=""></option>
                <option value="Mr.">Mr.</option>
                <option value="Dr.">Dr.</option>
                <option value="Pr.">Pr.</option>
            </select>
        </div>
        <div>
            <label for="nom">Nom et Prenom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="pass">Passe</label>
            <input type="password" name="pass" id="pass">
        </div>
            <input class="button" type="submit" value="Valider">
            <p><a class="lien" href="seconnecter.php">Se-connecter</a></p>
    </form>
</div>

<?php
include "html/fooder.php";


?>