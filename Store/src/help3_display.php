<?php


		// function display_product_mix_selected($goods);
		// {
		// 	if ($products == NULL)
		// 		return NULL;

			

		// }
		function find_category($category, $categories)
		{
			foreach($categories as $v)
			{
				if ($v == $category)
					return 1;
			}
			return 0;
		}

		function display_categories_mix($categories)
		{
			if ($categories == NULL)
				return NULL;
			
			$i = 0;

			$str = $str."<p class='select_category'>Please select the category from the list below: </p></h2> <div class='category'>";

			while ($categories[$i])
			{
				$s = $categories[$i];
	
				$str = $str."<ul class='category1'>
									<form action='categories.php' method='get'>
									<button class='category_button' type='submit' name='category' value='{$categories[$i]['category']}'>{$categories[$i]['category']}</a>
									</form> </ul>";
				
				$i++;
			}
			$str = $str."</div>";



			return $str;

		}

		function display_product_mix($products)
		{
			if ($products == NULL)
			{
				
				return NULL;
			}
			$len = count($products);

			$str = $str."<div class='listing'>"; //form a class
			

			$i = 0;
			$flag = 0;

			while ($i < $len)
			{
				$s = $products[$i][title];
				$str = $str."<div class='item'>
				
					<h3>{$products[$i][title]}</h3>
					<img class='picture' src='{$products[$i][image_url]}'>
					<p class='description'>{$products[$i][descr]}</p>
					<p class='price'> Price: {$products[$i][price]} $</p>
					<form action='cart.php' method='get'>
					<button class='add_p' type='submit' name='add' value='$s'>
						Add to cart
					</button>
					</form>
				</div>";
				
				$i++;
			}
			$str = $str."</div>";

			return $str;
		}
?> 