<?php

		function display_product_mix($products)
		{
			if ($products == NULL)
				return NULL;
			$str = "<div class='listing'>"; //form a class
			$i = 0;
			$len = count($products);


			while ($i < $len)
			{	
				$str = $str."<div class='item'>
									<img src='{$products[$i][image_url]}'>
									<p>{$products[$i][title]}</p>

									<p>{$products[$i][descr]}</p>
									<p>{$products[$i][price]}</p>
							</div>";
				
				$i++;
			}
			$str = $str."</div>";

			return $str;
		}
?> 