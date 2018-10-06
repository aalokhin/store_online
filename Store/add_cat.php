<?php

	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");

	
	session_start();
	header('Location: admin_area.php');

	if ($_GET['category'] != NULL && $_GET['add'] != NULL)
	{
		$i = 0;
		$categories = unserialize(file_get_contents("base/cats"));

		
		foreach ($categories as $value) {
			if ($value['category'] == $_GET['category'])
			{
				$_SESSION['error'] = "There is already a category with this name\n";
				return ;
			}
			$i++;
		}
		$categories[$i] = array('category' => $_GET['category']);


		file_put_contents("base/cats", serialize($categories));
	}
?>