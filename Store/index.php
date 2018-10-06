<?php
		include ("src/help.php");
		include ("src/help2.php");
		include ("src/help3_display.php");

		$title = 'PHP: just a simple Online Ecommerce Store';
		$body  = ' We want to sell you things that make you happy';
		data_ini();
		$goods = pull_goods();

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
  <?php echo $body;?>

  <p><a href="index.php">Главная</a> | <a href="contact.php">Contacts</a> | <a href="admin_area.php">Admin Area</a> | <a href="cart.php">Cart</a></p>

</header>

<hr />
Welcome to our Online Store!

		<?php 
			if ($goods != NULL)
				echo display_product_mix($goods);
		?>
 </body>
</html>