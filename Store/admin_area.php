<?php

	session_start();
	if($_GET['do'] == 'logout')
	{
		unset($_SESSION['admin']);
		session_destroy();
	}
 
	if(!$_SESSION['admin'])
	{
		header("Location: authorization.php");
 		exit;
 	}
 	else
 		echo '<p>Hey Admin! Whasupp? </p>';


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['error']))
		echo "<div class='error_block'>".$_SESSION['error']."</div>";
		$_SESSION['error'] = NULL;
	?>
	<header>
	  <?php echo $body;?>
	  <p><a href="index.php">Главная</a> | <a href="contact.php">Contacts</a> | <a href="admin_area.php">Admin Area</a> | <a href="cart.php">Cart</a></p>

	</header>
	<a href="admin_area.php?do=logout">Выход</a>

	<!-- adding a category -->


		 <form action="add_cat.php" method="GET">
		 	<legend>
		 		Add a new category here:
		 	</legend>
		 	Title: <input type="text" placeholder="title" name="category" required><br>
		 	<input type="submit" name="add" value="add category">
		 </form>

		<form action="add_item.php" method="get">
			<legend>
				Add a new item here:
			</legend>
			Title: <input type="text" placeholder="title" name="title" required><br>
			Price: <input type="text" placeholder="price" name="price" required><br>
			Image URL: <input type="text" placeholder="img url" name="image_url" required><br>
			Categories: <input type="text" placeholder="categories" name="categories" required><br>
			<textarea name="descr" placeholder="description" cols="30" rows="10"></textarea>
			<input type="submit" name="add" value="add">
		</form>

		
	</div>
</body>
</html>