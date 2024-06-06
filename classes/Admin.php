<?php
class Admin extends Personnelle{
    private $admine;

    public function __Construct($nom, $mail, $pass, $titre){
        Parent::__Construct($nom, $mail, $pass, $titre);
    }

    public function getAdmine(){
        return $this->admine;
    }

    public function setAdmin($admine){
        $this->admine = $admine;
    }

    public function connecAdmine($pdo){
        $admine = $this->verifiAdmin($pdo);
        if($admine){
            if(!password_verify($this->getPass(), $admine["pass"])){
                return false;
            }else{
                $this->admine = true;
                $this->modeAdmine();
            }
        }else{
            return false;
        }
    }

    public function verifiAdmin($pdo){
        $sql = " SELECT * from personne WHERE personne.mail = :email AND personne.admine = '1' ";
        $requete = $pdo->prepare($sql);
        $requete->bindValue(":email", $this->getMail());
        $requete->execute();
        $resultat = $requete->fetch();
        if($resultat){
          return $resultat;
        }else{
            return false;
        }
    }

    public function inscritAdmin($pdo){
        $admine = $this->verifiAdmin($pdo);
        if(!$admine){
            //UPDATE `personne` SET `admine` = '1' WHERE `personne`.`id_pr` = 8
            $sql = "UPDATE personne SET admine = '1' WHERE personne.mail = :mail";
            $requete = $pdo->prepare($sql); 
            $requete->bindValue(":mail", $this->getMail());
            if($requete->execute()){
                $this->admine = true;
                $this->modeAdmine();
            }
        }else{
            return false;
        }
        
    }

    public function modeAdmine(){
        $_SESSION["admin"] = [
            "id" => $this->getId(),
            "nom" => $this->getNom(),
            "mail" => $this->getMail(),
            "admine" => $this->admine
        ];
        header("location:profile.php");
        exit();
    }
}

?>