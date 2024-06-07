<?php
error_reporting(0);
session_start();

if(!$_SESSION["personnelle"]){

    header("location:index.php");

    exit();

}

if(!empty($_POST)){

    if(isset($_POST["mail"], $_POST["pass"]) && !empty($_POST["mail"]) && !empty($_POST["pass"])){
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            include "connexion/connexion.php";
            include "classes/Personnelle.php";
            include "classes/Admin.php";
            $admine = new Admin($_SESSION["personnelle"]["nom"], $mail, $pass, null);
            if(!$admine->connecAdmine($db)){
                $erreur = "vous n'est pas admine";
            }
        }else{
            $erreur = "adresse email invalide";
        }      
    }else{
        $erreur = "formulaire incomplet";
    }
}

include "html/header.php";
include "html/navder.php";
 
?>
<div class="accueil">
        <h1 class="accueil-titre">GESITION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i> <?=$_SESSION["personnelle"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>
<h3><?=$erreur ?? " "?></h3>
<div class="form">
    <h1 class="htitre">PASSEZ EN MODE ADMIN</h1>
    <form method="post">
        <div>
            <label for="mail">E-mail:</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div>
            <label for="pass">Passe:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <input type="submit" value="valider">
    </form>
</div>
<?php
include "html/fooder.php";

?>