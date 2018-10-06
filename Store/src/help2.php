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