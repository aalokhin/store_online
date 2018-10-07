<?php

        $title = 'PHP: just a simple Online Ecommerce Store';
        $body  = ' We want to sell you things that make you happy';
?>


<!DOCTYPE html>

<html>
 <head>
 	<meta charset="UTF-8">
 	<title>Contacts</title>
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
</body>
</html>