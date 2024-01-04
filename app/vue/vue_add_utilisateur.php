<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <style>
        * {
            margin : 5px;
        }
        form {
            width : 25%;
            display : flex;
            flex-direction : column;
            flex-wrap : wrap;
        }
        input {
            /* align-self : flex-end; */
        }
    </style>
</head>
<body>
    <?php include_once './app/vue/vue_navbar.php'?>
    <h1>Ajouter un utilisateur :</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nom">Saisir votre nom :</label>
        <input type="text" name="nom">
        <label for="prenom">Saisir votre prénom :</label>
        <input type="text" name="prenom">
        <label for="email">Saisir votre email :</label>
        <input type="email" name="email">
        <label for="pass">Saisir votre mot de passe :</label>
        <input type="password" name="pass">
        <label for="pass_verif">Confirmer votre mot de passe :</label>
        <input type="password" name="pass_verif">
        <label for="img">Importer une image (facultatif) :</label>
        <input type="file" name="img">
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <p><?=$message?></p>
</body>
</html>
