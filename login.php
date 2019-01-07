

<?php

$title = 'PHP: just a simple Online Ecommerce Store';
        $body  = ' We want to sell you things that make you happy';
    ?>

<!DOCTYPE html>

<html>
 <head>
    <meta charset="UTF-8">
    <title>Signing in</title>
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
<hr/>


<p class='select_category'>Signing in WEBpage.</p>
<form class='login' method="post">
    <div class="login-lost"> username: </div> <input class="login-input" name="login" type="text"  />
    <br/>
    <div class="login-lost"> password: </div><input class='login-input' name="passwd" type="password" />
    <br/>
    <input class='login-button' name="submit" type="submit" value="Sign In" />
</form>
<div class="login-lost"> 
    Don't have an account?<br/> <a class="create_acc" href="create_acc.php">   Create it!</a>
</div>

<?php
session_start();
function auth($login, $passwd)
{
    $file = "base/u";
    $ac = unserialize(file_get_contents("$file"));
    foreach ($ac as $v) {
        if ($v["login"] == $login && $v['passwd'] == hash('md5', $passwd))
            return true;
    }
    return false;
}
    $_SESSION['in']=1;
if (!$_SESSION['v'] || $_SESSION['v'] ==2)
    header("Location:aa.php");
if($_POST['submit']) {
    unset($_SESSION['v']);
    if($_SESSION['login'])
        echo "You are already signed in\n";
    elseif ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['login'] = $_POST['login'];
        header("Location:index.php");
        echo "Hello, " . $_SESSION['login'] . "\n";
    } else {
        echo "ERROR, login or password was incorrect\n";
        $_SESSION['login'] = '';
    }
}
?>
</body>
<footer>
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="categories.php" >Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="cart.php">Cart</a>
  <a href="authorization.php" class="active">Log In</a>
  <a href="create_acc.php">Sign Up</a>
  <a href="contact.php">Contact</a>
</div>
</footer>
