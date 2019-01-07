


<?php
 session_start();
		include ("src/help.php");
		include ("src/help2.php");
		include ("src/help3_display.php");

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

?>





<p class='select_category'> This is Admin Area </p>
<br />
<form class='login' method="post">
  <div class="login-lost"> Username: </div><input class="login-input" type="text" name="user" /><br />
  <div class="login-lost"> Password: </div><input class="login-input" type="password" name="pass" /><br />
 <input class='login-button' type="submit" name="submit" value="Войти" />
</form>

<?php

if($_POST['submit'])
{
if (find_admin($_POST['user']) == 1)
{
	$pass = pull_pass($_POST['user']);
	$str = md5($_POST['pass']);
	

	if($pass == md5($_POST['pass']))
	{
		$_SESSION['login'] = 'admin';
		header("Location: admin_area.php");
		exit;
	}
	else{ echo '<div class="login-lost">Логин или пароль неверны!</div>';}

}
else echo '<div class="login-lost">Логин или пароль неверны!</div>';
}


?>
</body>

<footer>
  

<div class="navbar">
  <a href="index.php" >Home</a>
  <a href="categories.php">Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="authorization.php" class="active">Log In</a>
  <a href="create_acc.php">Sign Up</a>
  <a href="contact.php">Contact</a>
</div>

</footer>
