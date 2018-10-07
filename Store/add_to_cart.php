<?php
    session_start();

    if (!$_SESSION['login']) {
        echo '<p>Please <a href="login.php">log in</a> to view your Shopping Cart.</p>';
    }
    $file = "base/user_cart";
    if (!file_exists($file)) {
        touch("base/user_cart");
    }
    $array = unserialize(file_get_contents('base/user_cart'));
    $array[] = array('user' => $_SESSION['login'], 'title' => $_GET['add']);
    print_r($array);
    file_put_contents("base/user_cart",serialize($array));
    header("Location: index.php");
?>