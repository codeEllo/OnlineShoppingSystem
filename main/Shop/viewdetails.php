<?php
session_start();
//$_SESSION = ['QUANTITY'];
require('../.Database_Connection/database_connection.php');
try{
	
	$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();// Check the session variable for products in cart

	$products = array();
	$subtotal = 0.00;

	if ($products_in_cart) {  
			$array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
			$stmt = $conn->prepare('SELECT * FROM PRODUCT WHERE PRODUCT_ID IN (' . $array_to_question_marks . ')');   
			$stmt->execute(array_keys($products_in_cart));
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);  


			
			$query = "INSERT INTO ORDER_DETAILS (QUANTITY,ORDER_DETAILS_STATUS,PRODUCT_ID,ORDERS_ID) VALUES (:QUANTITY,:ORDER_DETAILS_STATUS,:PRODUCT_ID,:ORDERS_ID)";
		
			$statement = $conn->prepare($query);
			$statement->bindParam(':QUANTITY', $QUANTITY,PDO::PARAM_INT); 
			$statement->bindParam(':ORDER_DETAILS_STATUS', $ORDER_DETAILS_STATUS,PDO::PARAM_INT);
			$statement->bindParam(':PRODUCT_ID', $PRODUCT_ID,PDO::PARAM_STR);
			$statement->bindParam(':ORDERS_ID', $ORDERS_ID,PDO::PARAM_INT);	

			if(isset($_POST['order']))// change to place order
				{
					foreach ($products as $product) {
					$subtotal += (float)$product['PRODUCT_PRICE'] * (int)$products_in_cart[$product['PRODUCT_ID']]; 
					$product_id_array = $product['PRODUCT_ID'];
		
					if(isset($_POST['QUANTITY']) && isset($_POST['ORDER_DETAILS_STATUS']) && isset($_POST['PRODUCT_ID']) && isset($_POST['ORDERS_ID']))
					{
					$QUANTITY = $products_in_cart[$product['PRODUCT_ID']];
					$ORDER_DETAILS_STATUS = "0";
					$PRODUCT_ID = $product_id_array;		
					$ORDERS_ID = (isset($_POST['ORDERS_ID']) ? $_POST['ORDERS_ID'] : '');			
					$statement->execute();	
										
					header('Location: indexx.php',true,301);
					unset($_SESSION['cart']);
					//session_unset();
					
					}
				  }
				}
		    }
     	}
		catch(PDOException $e) 
	{		
		echo '<script>alert("NOT INSERTED");</script>';
	//	echo $sql ."<br>". $e->getMessage();
	}
	
?>


