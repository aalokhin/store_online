


<?php

$title = 'PHP: just a simple Online Ecommerce Store';
        $body  = ' We want to sell you things that make you happy';
    ?>
    
<!DOCTYPE html>

<html>
 <head>
 	<meta charset="UTF-8">
 	<title>Online Shop</title>
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
        echo '<a href="create_acc.php">Registration</a>';
        echo '<a href="login.php"> Sign in</a>';
    }
    else {
        echo "<h2>Hello ".$_SESSION['login'];
        echo " / ".'<a href="logout.php" class="login">Logout</a>'."</h2>";
    }
  ?>

  <p><a href="index.php">Homepage</a>  <a href="contact.php">Contacts</a>  <a href="admin_area.php">Admin Area</a>  <a href="cart.php">Cart</a>   <a href="categories.php"> Категории</a>  </p>
</div>
</header>
<hr />

<?php
session_start();
if($_SESSION['login'] == "admin")
{
    echo "here";
        header("Location: admin_area.php");
        exit;
}
elseif($_SESSION["login"]) {
    echo "<p>To login as admin, firstly <a href='logout.php'>logout</a></p>\n";
}
else {
    $admin = 'admin';
    $pass = 'a029d0df84eb5549c641e04a9ef389e5';
}
?>





<p class='select_category'> This is Admin Area </p>
<br />
<form class='login' method="post">
  <div class="login-lost"> Username: </div><input class="login-input" type="text" name="user" /><br />
  <div class="login-lost"> Password: </div><input class="login-input" type="password" name="pass" /><br />
 <input class='login-button' type="submit" name="submit" value="Войти" />
</form>

<?php

if($_POST['submit']){
 if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
 $_SESSION['login'] = $admin;
 header("Location: admin_area.php");
 exit;
 }else echo '<p>Логин или пароль неверны!</p>';
}


?>
