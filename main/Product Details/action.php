<?php

	require ("database_connection.php");

	///////// FOR productDetails
	if(isset($_POST['PRODUCT_ID']) && $_POST['open'] == 1)
	{
		
		$PRODUCT_ID = $_POST['PRODUCT_ID'];

		$sql = "SELECT * FROM PRODUCT 
		WHERE PRODUCT_ID = :prodID AND ROWNUM=1";
		
		$stmt = $conn->prepare($sql);
		$stmt->bindvalue('prodID', $PRODUCT_ID, PDO::PARAM_STR);
		$stmt->execute();
		$prodDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$output=array();

		foreach ($prodDetail as $row) {
			$output["PRODUCT_ID"] = $row["PRODUCT_ID"];
			$output["PRODUCT_NAME"] = $row["PRODUCT_NAME"];
			$output["SUPPLIER_ID"] = $row["SUPPLIER_ID"];
			$output["PRODUCT_TYPE_ID"] = $row["PRODUCT_TYPE_ID"];
			$output["PRODUCT_PRICE"] = $row["PRODUCT_PRICE"];
			$output["PRODUCT_DISCOUNT"] = $row["PRODUCT_DISCOUNT"];
			$output["PRODUCT_DESC"] = $row["PRODUCT_DESC"];
			$output["PRODUCT_STATUS"] = $row["PRODUCT_STATUS"];
		}	   

		echo json_encode($output);
	}



	if(isset($_POST['status']) && $_POST['status'] == "update" )
	{

		$sql = "UPDATE PRODUCT SET PRODUCT_NAME=:PRODUCT_NAME, SUPPLIER_ID=:SUPPLIER_ID, PRODUCT_TYPE_ID=:PRODUCT_TYPE_ID, PRODUCT_PRICE=:PRODUCT_PRICE, PRODUCT_DISCOUNT=:PRODUCT_DISCOUNT, PRODUCT_DESC=:PRODUCT_DESC, PRODUCT_STATUS=:PRODUCT_STATUS, MODIFIED_AT=systimestamp WHERE PRODUCT_ID=:PRODUCT_ID";

		$stmt = $conn->prepare($sql);
		$stmt->bindvalue(':PRODUCT_ID', $_POST['PRODUCT_ID'], PDO::PARAM_STR);
		$stmt->bindvalue(':PRODUCT_NAME', $_POST['PRODUCT_NAME'], PDO::PARAM_STR);
		$stmt->bindvalue(':PRODUCT_DISCOUNT', $_POST['PRODUCT_DISCOUNT'],PDO::PARAM_INT);
		$stmt->bindvalue(':PRODUCT_PRICE', $_POST['PRODUCT_PRICE'],PDO::PARAM_INT);
		$stmt->bindvalue(':PRODUCT_DESC', $_POST['PRODUCT_DESC'],PDO::PARAM_STR);
		$stmt->bindvalue(':SUPPLIER_ID', $_POST['SUPPLIER_ID'],PDO::PARAM_INT);
		$stmt->bindvalue(':PRODUCT_TYPE_ID', $_POST['PRODUCT_TYPE_ID'],PDO::PARAM_INT);
		$stmt->bindvalue(':PRODUCT_STATUS', $_POST['PRODUCT_STATUS'],PDO::PARAM_INT);
		$stmt->execute();
		$sql = "commit";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
	}


	///////// FOR orderList
	if(isset($_POST['ORDER_DETAILS_ID']) && $_POST['open'] == 1)
	{
		
		$ORDER_DETAILS_ID = $_POST['ORDER_DETAILS_ID'];

		$sql = "SELECT * FROM ORDER_DETAILS WHERE ORDER_DETAILS_ID = :orDetID AND ROWNUM=1";
		
		$stmt = $conn->prepare($sql);
		$stmt->bindvalue('orDetID', $ORDER_DETAILS_ID, PDO::PARAM_STR);
		$stmt->execute();
		$orderDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$output=array();

		foreach ($orderDetail as $row) {
			$output["ORDER_DETAILS_ID"] = $row["ORDER_DETAILS_ID"];
			$output["QUANTITY"] = $row["QUANTITY"];
			$output["ORDER_DETAILS_STATUS"] = $row["ORDER_DETAILS_STATUS"];
			$output["PRODUCT_ID"] = $row["PRODUCT_ID"];
			$output["ORDERS_ID"] = $row["ORDERS_ID"];
		}	   

		echo json_encode($output);
	}

	if(isset($_POST['status2']) && $_POST['status2'] == "update2" )
	{
		echo "fish";
		$sql = "UPDATE ORDER_DETAILS SET QUANTITY=:QUANTITY, ORDER_DETAILS_STATUS=:ORDER_DETAILS_STATUS, PRODUCT_ID=:PRODUCT_ID, ORDERS_ID=:ORDERS_ID, MODIFIED_AT=systimestamp WHERE ORDER_DETAILS_ID=:ORDER_DETAILS_ID";

		$stmt = $conn->prepare($sql);
		$stmt->bindvalue(':ORDER_DETAILS_ID', $_POST['ORDER_DETAILS_ID'], PDO::PARAM_STR);
		$stmt->bindvalue(':QUANTITY', $_POST['QUANTITY'], PDO::PARAM_INT);
		$stmt->bindvalue(':ORDER_DETAILS_STATUS', $_POST['ORDER_DETAILS_STATUS'], PDO::PARAM_INT);
		$stmt->bindvalue(':PRODUCT_ID', $_POST['PRODUCT_ID'], PDO::PARAM_STR);
		$stmt->bindvalue(':ORDERS_ID', $_POST['ORDERS_ID'], PDO::PARAM_STR);
		$stmt->execute();
		$sql = "commit";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
	}


	///////// FOR sellerDetails
	if(isset($_POST['SELLER_ID']) && $_POST['open'] == 1)
	{
		
		$SELLER_ID = $_POST['SELLER_ID'];

		$sql = "SELECT * FROM SELLER WHERE SELLER_ID = :sellDetID AND ROWNUM=1";

		$stmt = $conn->prepare($sql);
		$stmt->bindvalue('sellDetID', $SELLER_ID, PDO::PARAM_STR);
		$stmt->execute();
		$sellDetail = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$output=array();

		foreach ($sellDetail as $row) {
			$output["SELLER_ID"] = $row["SELLER_ID"];
			$output["SELLER_NAME"] = $row["SELLER_NAME"];
			$output["SELLER_PH"] = $row["SELLER_PH"];
			$output["SELLER_EMAIL"] = $row["SELLER_EMAIL"];
			$output["SELLER_STATUS"] = $row["SELLER_STATUS"];
		}	   

		echo json_encode($output);
	}

	if(isset($_POST['status3']) && $_POST['status3'] == "update3" )
	{

		$sql = "UPDATE SELLER SET SELLER_NAME=:SELLER_NAME, SELLER_PH=:SELLER_PH, SELLER_EMAIL=:SELLER_EMAIL, SELLER_STATUS=:SELLER_STATUS, MODIFIED_AT=systimestamp WHERE SELLER_ID=:SELLER_ID";

		$stmt = $conn->prepare($sql);
		$stmt->bindvalue(':SELLER_ID', $_POST['SELLER_ID'], PDO::PARAM_STR);
		$stmt->bindvalue(':SELLER_NAME', $_POST['SELLER_NAME'], PDO::PARAM_STR);
		$stmt->bindvalue(':SELLER_PH', $_POST['SELLER_PH'], PDO::PARAM_STR);
		$stmt->bindvalue(':SELLER_EMAIL', $_POST['SELLER_EMAIL'], PDO::PARAM_STR);
		$stmt->bindvalue(':SELLER_STATUS', $_POST['SELLER_STATUS'], PDO::PARAM_INT);
		$stmt->execute();
		$sql = "commit";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
	}

?>

