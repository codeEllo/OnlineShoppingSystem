<?php

	session_start();
    include_once'../.Database_Connection/database_connection.php';
    include'../Login/function.php';
    include'../Session/userCheckerAfterLogin.php';
    include'../Session/unset_register_session.php';
    include'../Session/unset_login_session.php';
    include'../Session/unset_password_recovery.php';


    if(empty($_GET['token'])|| !isset($_GET['token'])){

        header("Location: ../Login/login.php",true,  301);
        die();

    }
    else{

        $token=$_GET['token'];

        $Sql = "SELECT cust_token,cust_name,cust_id,cust_email FROM CUSTOMER";
        $Stmt = $conn -> prepare($Sql);
        $Stmt -> execute();
        $Result=$Stmt->fetchAll(PDO::FETCH_ASSOC);
        $Change = false;
        $Username = "";
        $UserID = 0;
        $Email = "";

        foreach ($Result as $Row) {
     
            if(password_verify($token, $Row["CUST_TOKEN"])){
                $Username=$Row["CUST_NAME"];
                $UserID=$Row["CUST_ID"];
                $Email=$Row["CUST_EMAIL"];
                $Change=true;
                break;
            }
 
        }

        if($Change){
            $TokensPart = explode("-",$token);
            $Time = end($TokensPart);
            
            $Now =  date("Y/m/d h:i:sa");
            $LimitTime =  date("Y/m/d h:i:sa",strtotime('+15 minutes',strtotime($Time)));

            if($LimitTime>$Now){

                $Posting = true;

            }
        }
        else{
            header("Location: ../Login/login.php",true,  301);
            die();
        }

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        if(!isset($Posting) || $Posting!=true){

            header("Location: ../Login/login.php",true,  301);
            die();

        }
        else{
        
            if(empty($_POST["password1"])||empty($_POST["password2"])){

                $_SESSION["ErrorReqPass"] = true;

            }
            else{

                unset($_SESSION["ErrorReqPass"]);
                $ps1 = $_POST["password1"];
                $ps2 = $_POST["password2"];
                $passwordCombine = array ($ps1,$ps2);
                $Flag = false;

                foreach ($passwordCombine as $Pass ) {
                    
                    if(!(PassApproval($Pass))){
                        $Flag = true;
                    }

                }
                if($Flag){
                    $_SESSION["ErrorPass"] = true;

                }
                else{
                    
                    
                    if($ps1==$ps2){
                        //echo "Yes";
                        unset($_SESSION["ErrorPass"]);
                        $Hashed = password_hash($ps1, PASSWORD_DEFAULT);
                        $Date = date("Y/m/d h:i:sa");
                        
                        require '../../PHPMailer/src/Exception.php';
                        require '../../PHPMailer/src/PHPMailer.php';
                        require '../../PHPMailer/src/SMTP.php';

                        $mail = new PHPMailer\PHPMailer\PHPMailer();
                        $mail->IsSMTP();
                        $mail->Mailer = "smtp";

                        $mail->SMTPDebug  = 0;  
                        $mail->SMTPAuth   = TRUE;
                        $mail->SMTPSecure = "tls";
                        $mail->Port       = 587;
                        $mail->Host       = "smtp.gmail.com";
                        $mail->Username   = "9jeancsouzaoficx@gmail.com";
                        $mail->Password   = "qAVovayPKznY5RQtbKFVqoxtTZ49DYH7LjUDaq4Q8Qef6H3Fzj7oS6b26Apk8U527bTxsL";

                        $mail->IsHTML(true);
                        $mail->AddAddress($Email,$Username);
                        $mail->SetFrom("info@System.com", "Our Online Shopping");
                        $mail->addReplyTo('info@example.com', 'Information');
                        $mail->addCC('cc@example.com');
                        $mail->Subject = "Password Reset Request For User : ".$Username;
                        $content = "<p>PASSWORD HAS BEEN UPDATED SUCCESSFULLY</b>
                                    <p><b>You may relogin with the new password.</b>The old will no longer available.<br>Thank You.</p>
                                    <p>Password Reseted At : ".$Date." </p>";

                        $mail->MsgHTML($content); 

                        if($mail->Send()) {

                            $Sql = "UPDATE CUSTOMER SET cust_token=null,cust_password=:pass,modified_at=systimestamp,cust_status=1 WHERE cust_id=:id";
                            $Stmt=$conn->prepare($Sql);
                            $Stmt->bindvalue('pass',$Hashed,PDO::PARAM_STR);
                            $Stmt->bindvalue('id',$UserID,PDO::PARAM_STR);
                            $Stmt->execute();
                            
                            $Sql = "COMMIT";
                            $Stmt=$conn->prepare($Sql);
                            $Stmt->execute();

                            $_SESSION["UpdatePassSuccess"]=true;
                            header("Location: ../Login/login.php",true,  301);
                            die();
                        }
                        else{
                            $_SESSION["EmailFailed"]=true;
                        }
                        
                        
                    }
                    else{
                        $_SESSION["ErrorPass"] = true;
                    }



                }
            }






        }
        header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
        die();

    }



?>




<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Resetting Your Password | Welcome To Our Shop</title>
        
         <?php include '../Custom Header&Footer/header.php';?>

    <body>

        <!-- Loader -->
            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

         <!-- Begin page -->
         <div class="accountbg" style="background: url('../../assets/img/bg/bg5.jpg');background-size: cover;background-position: center;"></div>

        <div class="account-pages mt-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 col-xl-4">
                        <div class="card" style="background-color: rgba(0,0,0,.8);color: #fff;">
                            <div class="card-body" >
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a href="index.html"><img src="../../assets/img/logo/logo.png" height="30" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h4 class="font-size-18 mt-2 text-center">Resseting Your Password</h4>
                                    <p class="text-muted text-center mb-4">This page is valid 15 minutes only</p>
    
                                    <form class="form-horizontal" method="POST">
    
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="<?php echo $Email;?>" disabled autocomplete="off">
                                        </div>
    
                                        <div class="mb-3">
                                            <label class="form-label" for="password1">Password</label>
                                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter password" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password2">Re-Enter Password</label>
                                            <div class="input-group" id="show_hide_password">
										      	<input class="form-control"  style="width:85%;" type="password" id="password2" name="password2"  autocomplete="off" placeholder="Re-Enter password">
										        <a class="form-control text-center">
										        	<i class="fa fa-eye-slash " aria-hidden="true" style="hover{color:#333}">
										        	</i>
										        </a>
										    </div>
                                        </div>
    
                                        <div class="row mt-4">
                                            <div class="col-sm-12 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Accept Changes</button>
                                            </div>
                                        </div>
                                    </form>
    
                                </div>
    
                            </div>
                        </div>
                        <div class="mt-5 text-center position-relative">
                <?php include '../Custom Header&Footer/footer.php';?>
        <script src="../Register/loader.js"></script>

        <script type="text/javascript">
        	$(document).ready(function(){


        		$("#show_hide_password a").on('click', function(event) {
			
			        ShowPass1();

			    });

        	})
        </script>

    </body>
</html>
<?php
    $ECHO = "<script>";
    if(isset($_SESSION["ErrorReqPass"])){
        $ECHO.="Empty();";
    }
    elseif(isset($_SESSION["ErrorPass"])){
        $ECHO.="Pass();";
    }

    elseif(isset($_SESSION["EmailFailed"])){
        $ECHO.="Error();";
    }
    $ECHO.="</script>";

    echo $ECHO;



?>