<?php

session_start();
header('Location: admin_area.php');

$file = "base/u";
$i = 0;


if ($_POST['remove']) 
{
    if ($_POST['login'])
    {
        $ac = unserialize(file_get_contents("$file"));
        $flag = 0;
        foreach ($ac as $account) 
        {
            if ($_POST['login'] == $account['login'])
            {
                unset($ac[$i]);
                $ac = array_merge($ac);
                file_put_contents("$file", serialize($ac));
                return ;
            }
            $i++;
        }
        $_SESSION['error'] = "Login was nowhere to be found\n";
    }
    else
    {
        $_SESSION['error'] = "ERROR: username  wasn't entered\n";
    }
}


?>