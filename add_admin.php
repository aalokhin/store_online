<?php
	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");


	header('Location: admin_area.php');

	if ($_POST['login'] != NULL && $_POST['password'] != NULL && $_POST['add'] != NULL)
	{
		$admins = pull_admins();


		$i = 0;
		foreach ($admins as $admin)
		{
			if ($_POST['login'] == $admin['login'])
			{
				$_SESSION['error'] = "This admin is already added\n";
				return ;
			}
			$i++;
		}


		$admins[$i] = array('login' => $_POST['login'], 'password' => hash("md5", $_POST['password']));
		file_put_contents("base/users", serialize($admins));
	}

?>


