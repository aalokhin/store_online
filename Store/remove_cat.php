<?php

	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");

	
	session_start();


	header('Location: admin_area.php');

	if ($_GET['category'] != NULL && $_GET['remove'] != NULL)
	{
		$i = 0;

		$categories = unserialize(file_get_contents("base/cats"));
		
		foreach ($categories as $value)
		{
			if ($value['category'] == $_GET['category'])
			{
				 unset($categories[$i]);
				 $categories = array_merge($categories);
				 file_put_contents("base/cats", serialize($categories));	
				 return ;		
			}
			$i++;
		}
		$_SESSION['error'] = "There is no category with this name\n";
		return ;
	}
?>