<?php
	try {
		require ("../Product Details/database_connection.php");
	$sql = "INSERT INTO SELLER(SELLER_NAME,SELLER_PH,SELLER_EMAIL,SELLER_PASSWORD) VALUES 
	(:SELLER_NAME,:SELLER_PH,:SELLER_EMAIL,:SELLER_PASSWORD)";
		
	$statement = $conn->prepare($sql);

	$statement->bindParam(':SELLER_NAME', $SELLER_NAME,PDO::PARAM_STR);
	$statement->bindParam(':SELLER_PH', $SELLER_PH,PDO::PARAM_INT);
	$statement->bindParam(':SELLER_EMAIL', $SELLER_EMAIL,PDO::PARAM_INT);
	$statement->bindParam(':SELLER_PASSWORD', $SELLER_PASSWORD,PDO::PARAM_STR);
	
	if(isset($_POST['submit']))
	{
		if(isset($_POST['SELLER_NAME']) && isset($_POST['SELLER_PH']) && isset($_POST['SELLER_EMAIL']) && isset($_POST['SELLER_PASSWORD']))
		{
			$SELLER_NAME = $_POST['SELLER_NAME'];
			$SELLER_PH = $_POST['SELLER_PH'];
			$SELLER_EMAIL = $_POST['SELLER_EMAIL'];
			$SELLER_PASSWORD = $_POST['SELLER_PASSWORD'];
			$statement->execute();
	
		echo "alert('Product successfuly added!');";
		header('Location: ../Product Details/sellerDetails.php',true,301);
		}
	}
	}
	catch(PDOException $e) 
	{
	echo $sql . "<br>" . $e->getMessage();
	}
?>

