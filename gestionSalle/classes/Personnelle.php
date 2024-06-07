<?php

class Personnelle{
//les attributs;
private $id;
private $nom;
private $mail;
private $pass;
private $titre;

//le constructeur
public function __construct($nom, $mail, $pass, $titre){
    //$this->id = $id;
    $this->nom = $nom;
    $this->mail = $mail;
    $this->pass = $pass;
    $this->titre = $titre;
}

public function getId(){
    return $this->id;
}

public function getTitre(){
    return $this->titre;
}

public function getNom(){
    return $this->nom;
}

public function getMail(){
    return $this->mail;
}

public function getPass(){
    return $this->pass;
}

public function setNom($nom){
    $this->nom = $nom;
}

public function setMail($lmail){
    $this->mail = $mail;
}

public function setPass($pass){
    $this->pass = $pass;
}
public function setTitre($titre){
    $this->titre = $titre;
}

public function verifiePesonnelle($pdo){

    $sql = " SELECT * from personne WHERE mail = :email ";
    $requete = $pdo->prepare($sql);
    $requete->bindValue(":email",$this->mail);
    $requete->execute();
    $resultat = $requete->fetch();
    if($resultat){
      return $resultat;
    }else{
        return false;
    }

}

public function inscritPersonnelle($pdo){

    $personne = $this->verifiePesonnelle($pdo);
    if(!$personne){
        $sql = "INSERT INTO personne (nom,mail,pass, titre) values (:nom, :mail, :pass, :titre)";
        $requete = $pdo->prepare($sql);
        $requete->bindValue(":nom", $this->nom );
        $requete->bindValue(":mail", $this->mail );
        $requete->bindValue(":pass", $this->pass );
        $requete->bindValue(":titre", $this->titre );
        if($requete->execute()){
            $this->id = $pdo->lastInsertId();
        $this->connexion();
        }else{
            return false;
        }
    }else{
        return false;
    }

}

public function seconnecter($pdo){

    $personne = $this->verifiePesonnelle($pdo);
    if($personne){
        if(password_verify($this->pass, $personne["pass"])){
            $this->id = $personne["id_pr"];
            $this->nom = $personne["nom"];
            $this->connexion();
         }else{
             return false;
         }
    }else{
        return false;
    }

}

public function connexion(){
    $_SESSION["personnelle"] = [
        "id" => $this->id,
        "nom" => $this->nom,
        "mail" => $this->mail
    ];
    header("location:profile.php");
    exit();
}

}



?>