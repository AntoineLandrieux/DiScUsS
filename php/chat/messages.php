<?php

if (isset($_GET["count"])) {

    include ('../database/database.php');
    include ('../connection/users.php');

    GetMessages(intval($_GET['count']));

}

function GetMessages(int $count)
{

    global $db;

    $req = $db->query("SELECT * FROM chat ORDER BY id DESC LIMIT " . $count);

    function showuser($res)
    {

        global $db;

        $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute(array($res[1]));

        if ($req->rowCount() == 1) {
            return '<span style="cursor:pointer; font-weight:bold;">' . $res[0] . '</span>';
        }

        return $res[0];

    }

    while ($res = $req->fetch()) {

        if ($res['user'] == CheckUUID($_COOKIE['token'])) {
            $nametag = "me";
        } else { $nametag = "to"; }

        $message = "<div class='bubble-" . $nametag . "'><b>" . $res['user'] . ":</b><p>" . $res['msg'] . "</p><b>" . htmlspecialchars($res['date']) . "</b></div>";
        $message = preg_replace_callback('#@([A-Za-z0-9]+)#', 'showuser', $message);

        echo $message;
    }

    echo "<a href='?messages=" . $count + 20 . "' id='more'>PLUS DE MESSAGES</a>";

}

function SendMessage(string $msg, string $name)
{

    global $db;

    $req = $db->prepare("INSERT INTO chat(ip, user, msg) VALUES (?, ?, ?)");
    $req->execute(array($_SERVER['REMOTE_ADDR'], htmlspecialchars($name), htmlspecialchars($msg)));

}

?>