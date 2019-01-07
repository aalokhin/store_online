<?php
    session_start();
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


    <?php 
      if ($goods != NULL)
      {
       
       

          echo display_product_mix($goods);
        
      }
    ?>
 </body>


 
<footer>
  

<div class="navbar">
  <a href="index.php" class="active">Home</a>
  <a href="categories.php">Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="cart.php">Cart</a>
  <a href="authorization.php">Log In</a>
  <a href="create_acc.php">Sign Up</a>
  <a href="contact.php">Contact</a>
</div>

</footer>
 
</html>