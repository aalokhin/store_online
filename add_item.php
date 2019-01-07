<?php
	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");


	header('Location: admin_area.php');

	if ($_GET['title'] != NULL && $_GET['price'] != NULL && $_GET['image_url'] != NULL && $_GET['categories'] != NULL && $_GET['add'] != NULL)
	{
		$products = pull_goods();
		$cats = ft_split($_GET['categories']);
		if (check_categories($cats) == 0)
		{
			$_SESSION['error'] = "There are not such categories\n";
			return ;
		}

		
		$i = 0;
		foreach ($products as $prod) {
			if ($_GET['title'] == $prod['title'])
			{
				$_SESSION['error'] = "The item already exists\n";
				return ;
			}
			$i++;
		}


		if (!is_numeric($_GET['price']) || $_GET['price'] < 0)
		{
			$_SESSION['error'] = "Invalid data\n";
			return ;
		}


		$products[$i] = array('title' => $_GET['title'], 'price' => $_GET['price'], 'image_url' => $_GET['image_url'], 'categories' => $cats, 'descr' => $_GET['descr']);
		file_put_contents("base/goods", serialize($products));
	}

?>