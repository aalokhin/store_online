<?php
session_start();
if($_GET['but']=='OK') {
    $temp=unserialize(file_get_contents("base/user_cart"));
    $res=array();
    foreach ($temp as $item){
        if($item['user'] ==$_SESSION["login"]){
            unset($item);
        }
        $res[]=$item;
    }
    $res=array_values(array_filter($res));
    file_put_contents("base/user_cart",serialize($res));
}
else{
    $_GET['but'] =urldecode($_GET['but']);
    echo $_GET['but'];
    $temp=unserialize(file_get_contents("base/user_cart"));
    $res=array();
    foreach ($temp as $item){
        if($item['user'] ==$_SESSION["login"] && $_GET['but']==$item['title']){
            unset($item);
        }
        $res[]=$item;
    }
    $res=array_values(array_filter($res));
    file_put_contents("base/user_cart",serialize($res));
}
header("Location:cart.php");
?>