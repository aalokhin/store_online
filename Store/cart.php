
<?php

$title = 'PHP: just a simple Online Ecommerce Store';
        $body  = ' We want to sell you things that make you happy';
    ?>

<!DOCTYPE html>

<html>
 <head>
    <meta charset="UTF-8">
    <title>Cart</title>
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

  <p><a href="index.php">Главная</a>  <a href="contact.php">Contacts</a>  <a href="admin_area.php">Admin Area</a>  <a href="cart.php">Cart</a>   <a href="categories.php"> Категории</a>  </p>
</div>
</header>



<?php
session_start();
if (!$_SESSION['login']){
    echo '<p>Please <a href="login.php">log in</a> to view the products you have previously added to your Shopping Cart.</p>';
}
else {
    echo $_SESSION['login']."'s cart".'<br/>';
    $temp = unserialize(file_get_contents("base/user_cart"));
    $res = array();
    foreach ($temp as $v){
        if($_SESSION['login'] == $v['user']){
            $res[$v['title']]++;
        }
    }
    $goods=unserialize(file_get_contents("base/goods"));
    foreach ($res as $key=>$item) {
        foreach ($goods as $good){
            if($good['title'] == $key)
            {
                $price=$good['price']*$item;
               echo "<div class=' item'>
									<img src='{$good[image_url]}'>
									<p>{$good[title]}</p>
									<p>Quantity: {$item}</p>
									<p>Price: {$good[price]}</p>
									<p>Total: {$price}</p>
				</div>";
            }
        }
    }
}
?>