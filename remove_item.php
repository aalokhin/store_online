<?php
	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");


	header('Location: admin_area.php');

	if ($_GET['title'] != NULL && $_GET['remove'] != NULL)
	{
		$products = pull_goods();
		$i = 0;
		foreach ($products as $prod)
		{
			if ($_GET['title'] == $prod['title'])
			{
				unset($products[$i]);
				$products = array_merge($products);
				file_put_contents("base/goods", serialize($products));	
				return ;			
			}
			$i++;
		}
		$_SESSION['error'] = "The item is not found\n";
		return ;	
	}

?>