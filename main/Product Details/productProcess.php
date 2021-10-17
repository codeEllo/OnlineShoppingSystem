<?php
	try {
		require ("../Product Details/database_connection.php");
	$sql = "INSERT INTO PRODUCT (PRODUCT_NAME,PRODUCT_DISCOUNT,PRODUCT_PRICE,PRODUCT_DESC,SUPPLIER_ID,PRODUCT_TYPE_ID) VALUES (:PRODUCT_NAME,:PRODUCT_DISCOUNT,:PRODUCT_PRICE,:PRODUCT_DESC,:SUPPLIER_ID,:PRODUCT_TYPE_ID)";
		
	$statement = $conn->prepare($sql);

	$statement->bindParam(':PRODUCT_NAME', $PRODUCT_NAME,PDO::PARAM_STR);
	$statement->bindParam(':PRODUCT_DISCOUNT', $PRODUCT_DISCOUNT,PDO::PARAM_INT);
	$statement->bindParam(':PRODUCT_PRICE', $PRODUCT_PRICE,PDO::PARAM_INT);
	$statement->bindParam(':PRODUCT_DESC', $PRODUCT_DESC,PDO::PARAM_STR);
	$statement->bindParam(':SUPPLIER_ID', $SUPPLIER_ID,PDO::PARAM_INT);
	$statement->bindParam(':PRODUCT_TYPE_ID', $PRODUCT_TYPE_ID,PDO::PARAM_INT);
	
	if(isset($_POST['submit']))
	{
		if(isset($_POST['PRODUCT_NAME']) && isset($_POST['PRODUCT_DISCOUNT']) && isset($_POST['PRODUCT_PRICE']) && isset($_POST['PRODUCT_DESC']) && isset($_POST['SUPPLIER_ID']) && isset($_POST['PRODUCT_TYPE_ID']))
		{
			$PRODUCT_NAME = $_POST['PRODUCT_NAME'];
			$PRODUCT_DISCOUNT = $_POST['PRODUCT_DISCOUNT'];
			$PRODUCT_PRICE = $_POST['PRODUCT_PRICE'];
			$PRODUCT_DESC = $_POST['PRODUCT_DESC'];
			$SUPPLIER_ID = (isset($_POST['SUPPLIER_ID']) ? $_POST['SUPPLIER_ID'] : '');
			$PRODUCT_TYPE_ID = (isset($_POST['PRODUCT_TYPE_ID']) ? $_POST['PRODUCT_TYPE_ID'] : '');
			$statement->execute();
	
		echo "alert('Product successfuly added!');";
		header('Location: ../Product Details/productDetails.php',true,301);
		}
	}
	}
	catch(PDOException $e) 
	{
	echo $sql . "<br>" . $e->getMessage();
	}
?>

