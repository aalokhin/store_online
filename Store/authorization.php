
<?php
session_start();

if($_SESSION['admin'])
{
		header("Location: admin_area.php");
		exit;
}

	$admin = 'admin';
	$pass = 'a029d0df84eb5549c641e04a9ef389e5';
?>


<header>
  <?php echo $body;?>

  <p><a href="index.php">Главная</a> | <a href="contact.php">Contacts</a> | <a href="admin_area.php">Admin Area</a> | <a href="cart.php">Cart</a></p>

</header>
<hr />
Это страница авторизации.
<br />
<form method="post">
 Username: <input type="text" name="user" /><br />
 Password: <input type="password" name="pass" /><br />
 <input type="submit" name="submit" value="Войти" />
</form>

<?php

if($_POST['submit']){
 if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
 $_SESSION['admin'] = $admin;
 header("Location: admin_area.php");
 exit;
 }else echo '<p>Логин или пароль неверны!</p>';
}


?>
