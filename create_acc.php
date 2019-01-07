<?php
session_start();
?>

<?php

$title = 'PHP: just a simple Online Ecommerce Store';
        $body  = ' We want to sell you things that make you happy';
    ?>

    


<!DOCTYPE html>

<html>
 <head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
    <link rel="stylesheet" href="homepage_layout.css">
    <title><?php echo $title;?></title>
 </head>
 <body>
<header>

<div class="overlay">

  <?php echo "<h1>".$body."</h1>";?>
    <?php
    if(!$_SESSION['login']) {
        echo '<div class="select_category"> <a href="login.php"> Sign in</a></div>';
    }
    else {
        echo "<h3> Hello ".$_SESSION['login']."!";
        echo " / ".'<a href="logout.php" >Logout</a>'."</h3>";
    }
  ?>

  
</div>
</header>

<hr />
<p class='select_category'> Register your account here </p>
<form class='login' method="post">
     <div class="login-lost">username: </div><input class="login-input" name="login" type="text"  />
    <br/>
     <div class="login-lost">password: </div><input class="login-input" name="passwd" type="password" />
    <br/>
    <input class="login-button" name="submit" type="submit" value="Registrate" />
</form>
<div class="login-lost"> Arleady have an account?<br/><a href="login.php">Sign in!</a></div>

<?php
$file = "base/u";
    unset($_SESSION['in']);
    if(!$_SESSION['v'] || $_SESSION['v']==2)
    header("Location:aa.php");
if ($_POST['submit']) {
    unset ($_SESSION['v']);
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
            echo "Login is already taken\n";
        } else {
            $t["login"] = $_POST["login"];
            $t["passwd"] = hash('md5', $_POST['passwd']);
            $ac[] = $t;
            file_put_contents("$file", serialize($ac));
            echo "New account was registered\n";
        }
    } else
        echo "ERROR: username or password wasn't entered\n";
}
?>

</body>
<footer>
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="categories.php" >Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="cart.php">Cart</a>
    <a href="authorization.php">Log In</a>
  <a href="create_acc.php" class="active">Sign Up</a>

  <a href="contact.php">Contact</a>
</div>
</footer>