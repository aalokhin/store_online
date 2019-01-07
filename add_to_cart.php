<?php
    session_start();

    if (!$_SESSION['login']) {
        $file = "base/anonim_cart";
        if (!file_exists($file))
            touch($file);
        $array=unserialize(file_get_contents($file));
        $array[] = array('user' => "anonim", 'title' => $_GET['add']);
        file_put_contents($file, serialize($array));
        header("Location: index.php");
    }
    else {
        if (!file_exists($file)) {
            touch("base/user_cart");
        }
        $array = unserialize(file_get_contents('base/user_cart'));
        $array[] = array('user' => $_SESSION['login'], 'title' => $_GET['add']);
        file_put_contents("base/user_cart", serialize($array));
        header("Location: index.php");
    }
?>