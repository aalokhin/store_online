<?php
	include ("src/help.php");
	include ("src/help2.php");
	include ("src/help3_display.php");


	header('Location: admin_area.php');

	if ($_POST['login'] != NULL && $_POST['remove'] != NULL)
	{
		$admins = pull_admins();

		$i = 0;
		foreach ($admins as $admin)
		{
			if ($_POST['login'] == $admin['login'])
			{
				if ($i == 0)
				{
					$_SESSION['error'] = "cannot remove root\n";
					return ;
				}
				unset($admins[$i]);
				$admins = array_merge($admins);
				file_put_contents("base/users", serialize($admins));	
			}
			$i++;
		}
		$_SESSION['error'] = "No admin with this name exists in database\n";
		return ;
		
	}

?>