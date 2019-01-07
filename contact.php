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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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





<!-- Add font awesome icons -->

<a href="https://www.facebook.com/yaroslav.stasiv.1" class="fa fa-facebook"></a>
<a href="https://www.facebook.com/profile.php?id=100008398957699" class="fa fa-facebook"></a>
<a href="https://twitter.com/stalingulag" class="fa fa-twitter"></a>


<div class="select_category">UNIT FACTORY, Dorohozhytska St, 3, Kyiv, 04119</div>

<div class="select_category"> Welcome guys!</div>





</body>
<footer>
  

<div class="navbar">
  <a href="index.php" >Home</a>
  <a href="categories.php">Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="cart.php">Cart</a>
  <a href="authorization.php">Log In</a>
  <a href="create_acc.php">Sign Up</a>
  <a href="contact.php" class="active">Contact</a>
</div>

</footer>
</html>