<?php
    // Méthode pour chercher un utilisateur par son mail
    function getUtilisateurByMail(PDO $bdd, $email){
        try {
            $requete = $bdd->prepare('SELECT id_utilisateur,nom_utilisateur FROM utilisateur WHERE
            email_utilisateur = ?');
            $requete->bindParam(1,$email,PDO::PARAM_STR);
            $requete->execute();
            return $requete->fetch(PDO::FETCH_ASSOC);
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }

    // Méthode pour ajouter un utilisateur
    function insertUtilisateur(PDO $bdd,string $nom,string $prenom,string $email,string $pass,$img,$role):void{
        try {
            $requete = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur,prenom_utilisateur,email_utilisateur,pass_utilisateur,image_utilisateur,id_roles) 
            VALUES (?,?,?,?,?,?)');
            $requete->bindParam(1,$nom,PDO::PARAM_STR);
            $requete->bindParam(2,$prenom,PDO::PARAM_STR);
            $requete->bindParam(3,$email,PDO::PARAM_STR);
            $requete->bindParam(4,$pass,PDO::PARAM_STR);
            $requete->bindParam(5,$img,PDO::PARAM_STR);
            $requete->bindParam(6,$role,PDO::PARAM_INT);
            $requete->execute();
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
?>