<?php
    // Méthode pour ajouter un utilisateur
    function addUtilisateur($bdd){ 
        $message = "";
        if(isset($_POST["submit"])){
            if(!empty($_POST["nom"])
            AND !empty($_POST["prenom"])
            AND !empty($_POST["email"])
            AND !empty($_POST["pass"])
            AND !empty($_POST["pass_verif"])){
                if($_POST["pass"] === $_POST["pass_verif"]){
                    if(empty(getUtilisateurByMail($bdd,$_POST["email"]))){
                        if(!empty($_FILES["img"]["tmp_name"])){
                            $img = "./public/media/".$_FILES["img"]["name"];
                            move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                        }
                        else{
                            $img = "./public/media/yann.jpg";
                        }
                        $nom = cleanInput($_POST["nom"]);
                        $prenom = cleanInput($_POST["prenom"]);
                        $email = cleanInput($_POST["email"]);
                        $hash = password_hash($_POST["pass"],PASSWORD_DEFAULT);
                        $role = 1;
                        insertUtilisateur($bdd,$nom,$prenom,$email,$hash,$img,$role);
                        $message = "Compte ajouté à la BDD.";
                    }
                    else $message = "L'utilisateur existe déjà!";
                }
                else{
                    $message = "Les mots de passes ne correspondent pas!";
                }
            }
            else{
                $message = "Veuillez remplir tous les champs obligatoires !";
            }
        }
        //appel de la vue
        include_once './app/vue/vue_add_utilisateur.php';
    } 
?>