<?php
$connect = mysqli_connect("localhost", "root", "", "cias_dev");
		if (isset($_POST["order_total"])) {
            $order_total = $_POST["order_total"];
			$query = '';
            for($count = 0; $count<count($order_total); $count++)
            {
				$order_total_clean = mysqli_real_escape_string($connect, $order_total[$count]);

				if ($order_total_clean != '') {
					$query .= '
                    INSERT INTO cias_orderextra(product_price) 
                    VALUES("' . $order_total_clean. '"); 
   ';
				}
            }
			if ($query != '') {
				if (mysqli_multi_query($connect, $query)) {
					echo 'Item Data Inserted';
				} else {
					echo 'Error';
				}
			} else {
				echo 'All Fields are Required';
			}
        
        }
        ?>