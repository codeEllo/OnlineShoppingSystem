<?php

	session_start();
	include_once '../.Database_Connection/database_connection.php';
	include 'function.php';
	

	//Exists email will be denied
	if(isset($_POST["EmailExists"]) && isset($_POST["Email"])){

		$email = $_POST["Email"];


		if(!checkEmail($email)){

			$_SESSION["regEmail"] = true;
			echo "Email not valid";

		}
		else{

			unset($_SESSION["regEmail"]);

			$sql = "SELECT created_at FROM CUSTOMER WHERE cust_email =:email AND ROWNUM = 1";
			$stmt=$conn->prepare($sql);
			$stmt->bindvalue('email',$email,PDO::PARAM_STR);
			$stmt->execute();
			$Rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($Rslt)!=0){
				$_SESSION["regEmail"] = true;
				//Output screen
				echo "Email already exists!";
			}
			else{
				unset($_SESSION["regEmail"]);
				echo "Email allowed";
			}

		}



	}




?>