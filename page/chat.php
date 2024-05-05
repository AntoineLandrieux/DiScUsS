<?php

include ('../php/database/database.php');
include ('../php/connection/users.php');
include ('../php/chat/messages.php');


if (CheckUUID(isset($_COOKIE["token"]) ? $_COOKIE["token"] : "") == null) {

    header("Location:/#login");
    exit();

}

if (isset($_POST["msg"])) {

    SendMessage($_POST["msg"], CheckUUID($_COOKIE["token"]));
    unset($_POST["msg"]);

}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles/chat.style.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>DiScUsS Chat</title>
</head>

<body>

    <form method="post">
        <input type="text" id="message" name="msg" placeholder="Votre message..." maxlength="500" autocomplete="off" />
        <input type="submit" id="submit" value="Envoyer" />
    </form>

    <section id="wrapper">
        <?php GetMessages(isset($_GET['messages']) ? intval($_GET['messages']) : 20); ?>
    </section>

    <script src="../javascript/chat/chat.js"></script>

</body>

</html>