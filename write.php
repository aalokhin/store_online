<?php
	session_start();
	if (md5($_POST['norobot']) == $_SESSION['randomnr2']){
        $_SESSION['v'] = 1;
        if($_SESSION['in']==1) {
            unset ($_SESSION['in']);
            header("Location:login.php");
        }
        else {
            unset ($_SESSION['in']);
            header("Location:create_acc.php");
        }
    }	else {
        $_SESSION['v'] = 2;
       header("Location:aa.php");
    }
?>