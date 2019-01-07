<?php


	function check_categories($categories)
	{
		$all = unserialize(file_get_contents("base/cats"));

		foreach($categories as $category)
		{
			$flag = 0;
			foreach ($all as $one_category)
			{
				if ($category == $one_category['category'])
				{
					$flag = 1;
					break ;
				}
			}
			if ($flag != 1)
				return 0;
		}
		if ($flag == 1)
			return 1;
		return 0;
	}

	function pull_admins() //get_all_goods
	{
		if (file_exists("base/users") == 1)
		{
			return unserialize(file_get_contents("base/users"));
		}
		else
			return NULL;
	}

	function find_admin($name)
	{
		$i = 0;
		$flag = 0;
		$admins = pull_admins();
		while($admins[$i])
		{
			if($admins[$i]['login'] == $name)
			{
				$flag = 1;
				return (1);

			}

			$i++;
		}
		if ($flag == 0)
		{
			$_SESSION['error'] = "No admin found\n";
			return (0);
		}
		return (0);

	}

	function pull_pass($name)
	{
		$i = 0;
		$admins = pull_admins();
		while($admins[$i])
		{
			if($admins[$i]['login'] == $name)
			{
				  
				return ($admins[$i]['password']);

			}

			$i++;

		}
		return ;

	}
	function pull_goods() //get_all_goods
	{
		if (file_exists("base/goods") == 1)
		{
			return unserialize(file_get_contents("base/goods"));
		}
		else
			return NULL;
	}

	function ft_split($string)
	{
		$arr = array_filter(explode(',', $string), strlen);
		return array_values($arr);
	}
?>