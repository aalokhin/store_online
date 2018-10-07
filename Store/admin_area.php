

<?php


	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");

	
	session_start();

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

	<?php
    if (isset($_SESSION['error']))
		echo "<div class='error_block'>".$_SESSION['error']."</div>";
		$_SESSION['error'] = NULL;
	?>



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


<?php

	session_start();
	if($_GET['do'] == 'logout')
	{
		unset($_SESSION['login']);
		session_destroy();
	}
 
	if(!$_SESSION['login'] || $_SESSION['login'] != "admin")
	{
		header("Location: authorization.php");
 		exit;
 	}
 	else
 		echo '<div class="login-lost"> Hey Admin! Whasupp? <br/> Or.... <br/></div>';
?>



	<div class="login-lost"><a href="admin_area.php?do=logout">Sign Out of Admin Area</a></div>

	<!-- adding a category -->

<div class='show_admin_panels'>
	<div class="form-style-3">
		 <form action="add_cat.php" method="GET">
		 <fieldset>
		 	<legend>
		 		Add a new category here:
		 	</legend>
		 	Title: <input type="text" placeholder="title" name="category" required><br>
		 	<input type="submit" name="add" value="add category">
		</fieldset> </form>


		<form action="remove_cat.php" method="GET">
		<fieldset>
		 	<legend>
		 		Remove a category:
		 	</legend>
		 	Title: <input type="text" placeholder="title" name="category" required><br>
		 	<input type="submit" name="remove" value="remove category">
		</fieldset> </form>



		<form action="add_item.php" method="get"><fieldset>
			<legend>
				Add a new item here:
			</legend>
			Title: <input type="text" placeholder="title" name="title" required><br>
			Price: <input type="text" placeholder="price" name="price" required><br>
			Image URL: <input type="text" placeholder="img url" name="image_url" required><br>
			Categories: <input type="text" placeholder="categories" name="categories" required><br>
			<textarea name="descr" placeholder="description" cols="30" rows="10"></textarea>
			<input type="submit" name="add" value="add">
		</fieldset></form>



		</div>	
	</div>
</body>
</html>