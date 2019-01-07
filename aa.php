<?php
session_start();
?>
<!DOCTYPE html>

<html>
 <head>
 	<meta charset="UTF-8">
 	<title>Captcha</title>
 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
 	<link rel="stylesheet" href="homepage_layout.css">
 	<title><?php echo $title;?></title>
 </head>
 <body>



<form class='login' method="post" action="write.php">
	<div class='listing'><img src="captcha.php" />
	<br/>
    <input class="input" type="text" name="norobot" />
    <br/>
    <input class='login-button' type="submit" value="Submit" />
    </div>
</form>


</body>
</html>
<?php
if ($_SESSION['v']==2){
    echo '<div class="listing"><img src= http://pluspng.com/img-png/sassy-woman-png-sassyblackwomanpng-png-465.png></div>';}