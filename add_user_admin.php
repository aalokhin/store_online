<?php

session_start();
header('Location: admin_area.php');
$file = "base/u";
if ($_POST['submit']) {
    if ($_POST['login'] && $_POST['passwd']) {
        if (file_exists("/base") == false)
            mkdir("/base");
        if (file_exists("$file") == false)
            file_put_contents("$file", null);
        $ac = unserialize(file_get_contents("$file"));
        $flag = 0;
        foreach ($ac as $account) {
            if ($_POST['login'] == $account['login'])
                $flag = 1;
        }
        if ($flag == 1) {
            $_SESSION['error'] = "Login is already taken\n";
        } else {
            $t["login"] = $_POST["login"];
            $t["passwd"] = hash('md5', $_POST['passwd']);
            $ac[] = $t;
            file_put_contents("$file", serialize($ac));
            echo "New account was registered\n";
        }
    } else{
        $_SESSION['error'] = "ERROR: username or password wasn't entered\n";
    }
}
?>