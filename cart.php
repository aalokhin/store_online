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
        echo '<div class="select_category"> <a href="login.php"> Sign in</a></div>';
    }
    else {
        echo "<h3> Hello ".$_SESSION['login']."!";
        echo " / ".'<a href="logout.php" >Logout</a>'."</h3>";
    }
  ?>

  
</div>
</header>



<?php
session_start();
if (!$_SESSION['login']){
    echo '<p>Please <a href="login.php">log in</a> to view the products you have previously added to your Shopping Cart.</p>';
    $a= unserialize(file_get_contents("base/anonim_cart"));
    $res = array();
    foreach ($a as $b){
        $res[$b["title"]]++;
    }
    $flag = 0;
    $goods=unserialize(file_get_contents("base/goods"));
    foreach($res as $key=>$item){
        foreach ($goods as $good){
            if($good['title'] == $key){
                $flag=1;
                $price=$good['price']*$item;
                echo "<div class=' item'>
                                    <img class='picture' src='{$good[image_url]}'>
                                    <p>{$good[title]}</p>
                                    <p class='price' >Quantity: {$item}</p>
                                    <p class='price' >Price: {$good[price]}</p>
                                    <p>Total: {$price}</p>
                                    <p><a href='login.php'>Log in </a>to buy!</p>
                      </div>";
            }
        }
    }
    if($flag == 1)
        echo  "<div>
                 <form action='login.php'>
                    <button class='add_p'><img src='http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG46.png' width='30' height='30'>BUY ALL</button>
                </form>
                </div>";
    else
        echo "<p>Yot cart is empty. <a href='index.php'>Back to shopping</a></p>";
}
else {
    echo $_SESSION['login']."'s cart".'<br/>';
    $temp = unserialize(file_get_contents("base/user_cart"));
    if(file_exists("base/anonim_cart")){
        $anonim = unserialize(file_get_contents("base/anonim_cart"));
        foreach ($anonim as $an){
            $an['user'] = $_SESSION['login'];
            array_push($temp, $an);
        }
        file_put_contents("base/anonim_cart", "");
        file_put_contents("base/user_cart", serialize($temp));
    }
    $res = array();
    foreach ($temp as $v){
        if($_SESSION['login'] == $v['user']){
            $res[$v['title']]++;
        }
    }
    $goods=unserialize(file_get_contents("base/goods"));
    $flag = 0;
    foreach ($res as $key=>$item) {
        foreach ($goods as $good){
            if($good['title'] == $key) {
                $flag=1;
                $c=urlencode($good['title']);
                $price=$good['price']*$item;
               echo "<div class=' item'>
                                    <img class='picture' src='{$good[image_url]}'>
                                    <p>{$good[title]}</p>
                                    <p class='price'>Quantity: {$item}</p>
                                    <p class='price'>Price: {$good[price]}</p>
                                    <p>Total: {$price}</p>
                                    <form action='buy_but.php' method='get'>
                                    <button class='add_p' name='but' type='submit' value={$c} ><img src='http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG46.png' width='20' height='20'>BUY</button>
                                    </form>
                </div>";

            }
        }
    }
    if($flag == 1)
        echo  "<div>
                 <form action='buy_but.php' method='get'>
                    <button class='add_p' value='OK' type='submit' name='but'><img src='http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG46.png' width='30' height='30'>BUY ALL</button>
                </form>
                </div>";
    else
        echo "<p>Yot cart is empty. <a href='index.php'>Back to shopping</a></p>";
}
?>

</body>
<footer>
  

<div class="navbar">
  <a href="index.php">Home</a>
  <a href="categories.php">Categories</a>
  <a href="admin_area.php">Admin Area</a>
  <a href="cart.php" class="active">Cart</a>
  <a href="authorization.php">Log In</a>
  <a href="create_acc.php">Sign Up</a>
  <a href="contact.php">Contact</a>
</div>

</footer>
</html>