<?php


    session_start();
    include_once '../.Database_Connection/database_connection.php';
    include '../Login/function.php';
    include'../Session/userCheckerAfterLogin.php';
    include'../Session/unset_login_session.php';
    include'../Session/unset_password_recovery.php';
    include'../Session/unset_password_reset.php';
    include'../Forgot Password/function.php';

    /////////////////////////////////////////////////LOGIC VALIDATION///////////////////////////////////////////////




    if($_SERVER["REQUEST_METHOD"] == "POST"){


    	if(empty($_POST["useremail"]) || empty($_POST["username"]) || empty($_POST["phonenumber"]) || 
 		   empty($_POST["address1"])  || empty($_POST["address2"]) || empty($_POST["address3"])||
 		   empty($_POST["address4"])  ||empty($_POST["password1"]) || empty($_POST["password1"])){

            
    		$_SESSION["nullablility"] = true;
    		//echo "<script>alert('Step 1 Detected')</script>";
    	}
    	else{

    		unset($_SESSION["nullablility"]);

    		$UserEmail = $_POST["useremail"];

    		if ((!checkEmail($UserEmail)) || 
    			(isset($_SESSION["regEmail"]))
    		   ){

                $_SESSION["em"] = true;
                //echo "<script>alert('Step 2 Detected')</script>";
            } 
            else{

            	unset($_SESSION["em"]);
            	$UserName = $_POST["username"];

            	if(!WordFilter($UserName)){

            		$_SESSION["nm"] = true;
            		//echo "<script>alert('Step 3 Detected')</script>";
            	}
            	else{

            		unset($_SESSION["nm"]);
            		$Phonenumber = $_POST["phonenumber"];

            		if(!CheckNum($Phonenumber)){

            			$_SESSION["ph"] = true;
            			//echo "<script>alert('Step 4 Detected')</script>";
            		}
            		else{

            			unset($_SESSION["ph"]);
            			$Address = array($_POST["address1"],$_POST["address2"],$_POST["address3"],$_POST["address4"]);

            			$Round = true;
            			foreach ($Address as $Adds) {

        					if(!CheckAddrs($Adds)){
        						//echo "<script>alert('Wrong ran')</script>";
            					$Round = false;
            					break;
        					}
            				

            			}

            			if(!$Round){

            				$_SESSION["add"] = true;
            				//echo "<script>alert('Step 5 Detected')</script>";
            			}
            			else{

            				unset($_SESSION["add"]);
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

            					$_SESSION["ps"] = true;
            					//echo "<script>alert('Step 6 Detected')</script>";
            				}
            				else{
            					//echo "<script>alert('GOOD')</script>";

//////////////////////////////////////////////////////////////VALIDATE EMAIL/////////////////////////////////////////////////////////////
            					
            					if($ps1==$ps2){

            						unset($_SESSION["ps"]);


                                    $NewToken = RegularTokenGenerator($conn);

                                    $PickedToken=$NewToken[0];
                                    $Token=$NewToken[1];
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
                                    $mail->AddAddress($UserEmail,$UserName);
                                    $mail->SetFrom("info@System.com", "Our Online Shopping");
                                    $mail->addReplyTo('info@example.com', 'Information');
                                    $mail->addCC('cc@example.com');
                                    $mail->Subject = "Registration For Online Ordering System : ".$UserName;
                                    $content = "<p>Click <a href='localhost/Project/main/Register/confirm_register.php?token=".$Token."'> 
                                                    Here</a> to complete your registration.</p>
                                                <p>Registration made at : ".$Date." </p>";

                                    $mail->MsgHTML($content); 

                                    if($mail->Send()) {

                                        unset($_SESSION["EmailFailed"]);

                                        $NewAddress = "";$next=0;
                                        foreach ($Address as $add){
                                            if($next==3){
                                                $NewAddress.= $add;
                                                break;
                                            }

                                            $NewAddress.= $add." , ";
                                            $next++;
                                        }

                                        $Hashed = password_hash($ps1, PASSWORD_DEFAULT);

                                        $Sql = "INSERT INTO CUSTOMER (Cust_Name,Cust_Email,Cust_Addrs,Cust_Ph,Cust_Password,Cust_Token) VALUES 
                                                (:name,:email,:addrs,:ph,:pass,:token)";

                                        $Statement = $conn->prepare($Sql);
                                        $Statement->bindvalue('name',$UserName,PDO::PARAM_STR);
                                        $Statement->bindvalue('email',$UserEmail,PDO::PARAM_STR);
                                        $Statement->bindvalue('addrs',$NewAddress,PDO::PARAM_STR);
                                        $Statement->bindvalue('ph',$Phonenumber,PDO::PARAM_STR);
                                        $Statement->bindvalue('pass',$Hashed,PDO::PARAM_STR);
                                        $Statement->bindvalue('token',$PickedToken,PDO::PARAM_STR);
                                        $Statement->execute();

                                        $Sql = "COMMIT";
                                        $Statement = $conn->prepare($Sql);
                                        $Statement->execute();
                                        $_SESSION["RegSuccess"] = true;
                                        header("Location: ../Login/login.php",true,  301);
                                        die();
                                    }
                                    else{
                                        $_SESSION["EmailFailed"]=true;
                                    }



            					}
      

            				}
            			}
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
        <title>Register |  Welcome to our shop</title>
        
        <?php include '../Custom Header&Footer/header.php';?>

    <body>

        <!-- Loader -->
            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg" style="background: url('../../assets/img/bg/bg3.JPG');background-size: cover;background-position: center;"></div>

        <div class="account-pages mt-3 pt-3">
            <div class="container "  >
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-8">
                        <div class="card" style="background-color: rgba(0,0,0,.8);color: #fff;">
                            <div class="card-body " >
                                <div class="text-center mt-4">
                                    
                                </div>
                                <div class="p-3">
                                    <h4 class="font-size-50 mt-4 text-center">One Time Register</h4>
    
                                    <form class="form" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="useremail">Email</label>
                                                <label class="font-size-12 text-danger displayErr" id="disp"></label>
                                                <input type="email" class="form-control verify" id="useremail" name="useremail"  autocomplete="off" placeholder="Enter email">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="username">Name</label>
                                                <input type="text" class="form-control" id="name" name="username"  autocomplete="off" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="phonenumber">Phone number</label>
                                                <input type="text" class="form-control" id="phonenumber" name="phonenumber"  autocomplete="off" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="address1">Address</label>
                                                <input type="text" class="form-control" id="address1" name="address1" autocomplete="off" placeholder="Address 1">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="address2" name="address2" autocomplete="off" placeholder="Address 2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="address3" name="address3" autocomplete="off" placeholder="Address 3">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="address4" name="address4" autocomplete="off" placeholder="Address 4">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="password1">Password</label>
                                                <input type="password" class="form-control" id="password1" name="password1"  autocomplete="off" placeholder="Enter password">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="password2">Re-Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
											      	<input class="form-control"  style="width:85%;" type="password" id="password2" name="password2"  autocomplete="off" placeholder="Re-Enter password">
											        <a class="form-control text-center">
											        	<i class="fa fa-eye-slash " aria-hidden="true" style="hover{color:#333}">
											        	</i>
											        </a>
											    </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6 mb-3">
                                                <button class="btn btn-danger w-md waves-effect waves-light" id="login_page" type="button">Cancel</button>
                                            </div>
                                            <div class="col-md-6 mb-3 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                         </div>
                                        <div class="mb-0 row">
                                            <div class="col-12 ">
                                                <p class=" text-muted mb-0">By registering you agree to the B.E.A.S.T <a href="#">Terms of Use</a></p>
                                            </div>
                                        </div>
                                    </form>
    
                                </div>
    
                            </div>
                        </div>
                        <div class="mt-5 text-center position-relative">
        <?php include '../Custom Header&Footer/footer.php';?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="loader.js"></script>
        <script>
            $(document).ready(function(){

                $("#login_page").click(function(){

                    RedirectLogin();

                })

                $(".verify").keyup(function(e){

                	Checker();

                })
                $("#show_hide_password a").on('click', function(event) {
			
			        ShowPass1();

			    });

            })



        </script>


    </body>
</html>
<!--                        SCREEN LOADER                                          -->
<?php
	$ECHO = "<script>";
	if(isset($_SESSION["nullablility"])){
		$ECHO.="Empty();";
	}
	elseif(isset($_SESSION["em"])){
		$ECHO.="WrongEmail();";
	}
	elseif(isset($_SESSION["nm"])){
		$ECHO.="UserName();";
	}
	elseif(isset($_SESSION["ph"])){
		$ECHO.="Phone();";
	}
	elseif(isset($_SESSION["add"])){
		$ECHO.="Address();";
	}
	elseif(isset($_SESSION["ps"])){
		$ECHO.="Pass();";
	}
    elseif(isset($_SESSION["EmailFailed"])){
        $ECHO.="Error();";
        
    }

	$ECHO.="</script>";

	echo $ECHO;

?>

