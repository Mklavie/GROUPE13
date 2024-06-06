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

if(!empty($_POST)){
    if(isset($_POST["mail"]) && !empty($_POST["mail"])){

        $mail = $_POST["mail"];
        
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            die("adresse email invalide");
        }

        include "connexion/connexion.php";
        include "classes/personnelle.php";
        include "classes/Admin.php";
        $admin = new Admin(null, $mail, null, null);
        if(!$admin->inscritAdmin($db)){
            die("admin existe");
        }


    }else{
        die("le formulaire incomplait");
    }
}



include "html/header.php";
include "html/navder.php";

?>

<div class="accueil">
        <h1 class="accueil-titre">GESTION DES SALLES</h1>
        <P><a href="#"><i class="fas fa-envelope icon"></i><?=$_SESSION["admin"]["mail"]?></a></P>
        <div class="buttons">
            <button class="buttonsalle"><a href="salles.php">LES SALLES</a></button>
            <button class="buttonplanning"><a href="lereservation.php">LES PLANNINGS</a></button>
        </div>
</div>

<div class="form">
    <h1 class="htitre">AJOUTER UN ADMIN</h1>
    <form method="post">
        <div>
            <label for="mail">E-mail:</label>
            <input type="email" name="mail" id="mail">
        </div>
        <input type="submit" value="ajouter">
    </form>
</div>
<?php
include "html/fooder.php";
?>