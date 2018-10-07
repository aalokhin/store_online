 <?php
        session_start();
		include ("src/help.php");
		include ("src/help2.php");
		include ("src/help3_display.php");

		$title = 'PHP: just a simple Online Ecommerce Store';
		$body  = ' We want to sell you things that make you happy';
		$title = 'PHP: just a simple Online Ecommerce Store';
		$body  = ' We want to sell you things that make you happy';
		$goods = pull_goods();
		$categories = unserialize(file_get_contents("base/cats"));

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
        echo " / ".'<a href="logout.php" >Logout</a>'."</h2>";
    }
  ?>

  <p><a href="index.php">Homepage</a>  <a href="contact.php">Contacts</a>  <a href="admin_area.php">Admin Area</a>  <a href="cart.php">Cart</a>   <a href="categories.php"> Категории</a>  </p>
</div>
</header>
<hr />





	<?php


		if ($categories != NULL)
		{


			echo display_categories_mix($categories);
		}
		$i = 0;
		$len = count($goods);
		$flag = 0;
		echo "<p class='select_category'>Your search has been processed! <br/>Products for the category \"{$_GET['category']}\":</p>";
		while($i < $len)
		{
			$arr = $goods[$i]['categories'];


			if (find_category($_GET['category'], $arr) == 1)
			{
					$flag = 1;
					echo "<div class='item'>
				
					<h3>{$goods[$i][title]}</h3>
					<img class='picture' src='{$goods[$i][image_url]}'>
					<p class='description'>{$goods[$i][descr]}</p>
					<p class='price'> Price: {$goods[$i][price]} $</p>
					<form action='cart.php' method='get'>
					<button class='add_p' type='submit' name='add' value='$s'>
						Add to cart
					</button>
					</form>
				</div>";
			}
			$i++;
		}
		if ($flag === 0)
		{
			echo "<p class='select_category'>Ooops..... Nothing found for your request: \"{$_GET['category']}\" :c Sorry! </p>";
		}

	?>



<!-- if value == ok 
$_SESSION['category'] = 'category' -->

</body>

<footer>
  

<div class="navbar">
  <a href="index.php">Home</a>
  <a href="categories.php" class="active">Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="cart.php">Cart</a>

</div>

</footer>