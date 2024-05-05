<?php

include ('php/database/database.php');
include ('php/connection/users.php');

if (
    isset($_POST['crpseudo']) and isset($_POST['crpass1']) and isset($_POST['crpass2'])
    and !empty($_POST['crpseudo']) and !empty($_POST['crpass1'])
    and $_POST['crpass1'] = $_POST['crpass2']
) {

    echo "<span class='msg'>" . AddUser($_POST['crpseudo'], $_POST['crpass1']) . "</span>";

}

if (
    isset($_POST['pseudo']) and isset($_POST['pass'])
    and !empty($_POST['pseudo']) and !empty($_POST['pass'])
) {

    echo "<span class='msg'>" . CheckUser($_POST['pseudo'], $_POST['pass']) . "</span>";

}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Forum de discution">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles/phone.style.css">
    <title>DiScUsS</title>
</head>

<body>

    <nav class="inactive">

        <div id="content">
            <a href="#menu">Acceuil</a>
            <a href="#signin">Creer un compte</a>
            <a href="#login">Se connecter</a>
        </div>

    </nav>

    <button class="inactive">+</button>

    <main id="menu">

        <h1 id="title">DiScUsS</h1>
        <span>Serveur de discussion</span>
        <a href="page/chat.php">ALLER AU CHAT</a>

    </main>

    <hr />

    <section id="signin">

        <form action="index.php#signin" method="post">

            <input type="text" name="crpseudo" id="crpseudo" maxlength="20" placeholder="Pseudo" autocomplete="off" required />
            <input type="password" name="crpass1" id="crpass1" placeholder="Mot de passe" required />
            <input type="password" name="crpass2" id="crpass2" placeholder="Confirmer mot de passe" required />
            <input type="submit" id="createUser" value="VALIDER" />

            <p>Déjà un compte ?</p>
            <a href="#login">Connectez-vous ici</a>

        </form>

    </section>

    <hr />

    <section id="login">

        <form action="index.php#login" method="post">

            <input type="text" name="pseudo" id="pseudo" maxlength="20" placeholder="Pseudo" autocomplete="off" required />
            <input type="password" name="pass" id="pass" placeholder="Mot de passe" required />
            <input type="submit" id="connectUser" value="VALIDER" />

            <p>Pas de compte ?</p>
            <a href="#signin">Inscrivez-vous ici</a>

        </form>

    </section>

    <script src="javascript/script.js"></script>
    <script src="javascript/connection/login.js"></script>

</body>

</html>