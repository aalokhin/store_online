<?php


	session_start();


	function data_ini()
	{
		if (file_exists("base") == 0)
		{
			mkdir("base");
		}
		if (file_exists("base/goods") == 0)
		{
			touch("base/goods");
		}
		if (file_exists("base/cats") == 0)
		{
			touch("base/cats");
		}
		if (file_exists("base/users") == 0)
		{
			$array[0] = array('login' => "admin", 'password' => hash("md5", "mypass"), 'type' => "admin");
			file_put_contents("base/users", serialize($array));
		}
	}


	function categories_button_display()
	{
		if (file_exists("base/cats") == 0)
			return ;
		else
		{
			$cats = unserialize(file_get_contents("base/cats"));
		
			$output = "<ul>";
			foreach($cats as $array)
			{
				
			}
			$output = $output."</ul>";
			return $output;
		}
	}


	
?>