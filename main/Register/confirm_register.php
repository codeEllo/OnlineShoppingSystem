<?php
    session_start();

	include_once'../.Database_Connection/database_connection.php';
    include'../Login/function.php';
    include'../Session/userCheckerAfterLogin.php';
    include'../Session/unset_register_session.php';
    include'../Session/unset_login_session.php';
    include'../Session/unset_password_recovery.php';
    include'../Session/unset_password_reset.php';



	if(empty($_GET['token'])|| !isset($_GET['token'])){

        header("Location: ../Login/login.php",true,  301);
        die();

    }
    else{

        $token=$_GET['token'];

        $Sql = "SELECT cust_id,cust_token FROM CUSTOMER WHERE cust_token IS NOT NULL";
        $Stmt = $conn -> prepare($Sql);
        $Stmt -> execute();
        $Result=$Stmt->fetchAll(PDO::FETCH_ASSOC);
        $Change = false;
        $UserID = 0;

        
        foreach ($Result as $Row) {
     		 
            if(password_verify($token, $Row["CUST_TOKEN"])){
            	$UserID = $Row["CUST_ID"];
                $Change=true;
                break;
            }
 
        }

        if($Change){
            
        	$Sql = "UPDATE CUSTOMER SET cust_token=null,cust_status=1,modified_at=systimestamp WHERE cust_id=:UserID";
            $Stmt=$conn->prepare($Sql);
            $Stmt->bindvalue('UserID',$UserID,PDO::PARAM_STR);
            $Stmt->execute();
            
            $Sql = "COMMIT";
            $Stmt=$conn->prepare($Sql);
            $Stmt->execute();

            $_SESSION["RegistrationCompleted"]=true;
            header("Location: ../Login/login.php",true,  301);
            die();




        }
        else{
           header("Location: ../Login/login.php",true,  301);
           die();
        }

    }



?>