<?php

function AddUser(string $name, string $password)
{

    global $db;

    $req = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
    $req->execute(['pseudo' => htmlspecialchars($name)]);
    $result = $req->fetch();

    if (!$result) {

        $token = md5(uniqid() . rand(100000000, 999999999));
        $crpass = htmlspecialchars(password_hash($password, PASSWORD_BCRYPT, ['cost' => 12,]));

        $users = $db->prepare("INSERT INTO users(uuid, pseudo, password) VALUES (?,?,?)");
        $users->execute(array($token, htmlspecialchars($name), $crpass));

        setcookie("token", $token, time() + (60 * 60 * 24 * 30), '/');

        header("Location: /page/chat.php");
        exit();

    } else {
        return "Ce pseudo est déjà utilisé par une autre personne !";
    }

}

function CheckUser(string $name, string $password)
{

    global $db;

    $req = $db->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
    $req->execute(['pseudo' => htmlspecialchars($name)]);
    $result = $req->fetch();

    if ($result) {

        if (password_verify(htmlspecialchars($password), $result['password'])) {

            setcookie("token", $result["uuid"], time() + (60 * 60 * 24 * 30), '/');
            header("Location: /page/chat.php");
            exit();

        } else {
            return "Mot de passe ou pseudo incorrect";
        }

    } else {
        return "Mot de passe ou pseudo incorrect";
    }

}

function CheckUUID($UUID)
{

    global $db;

    $req = $db->prepare("SELECT * FROM users WHERE uuid=:uuid");
    $req->execute(["uuid" => $UUID]);

    $result = $req->fetch();
    return $result ? $result["pseudo"] : null;

}

?>