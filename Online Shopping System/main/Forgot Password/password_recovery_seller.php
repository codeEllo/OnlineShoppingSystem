<?php
    
    session_start();
    include_once'../.Database_Connection/database_connection.php';
    include'../Login/function.php';
    include'../Session/userCheckerAfterLogin.php';
    include'../Session/unset_register_session.php';
    include'../Session/unset_login_session.php';
    include'../Session/unset_password_reset.php';
    include'function.php';
    


    if($_SERVER["REQUEST_METHOD"] == "POST"){


        if(empty($_POST["useremail"])){

            $_SESSION["PR_Empty"]=true;

        }
        else{

            $UserEmail = $_POST["useremail"];
            unset($_SESSION["PR_Empty"]);

            if(!checkEmail($UserEmail)){

                $_SESSION["PR_Email"]=true;

            }
            else{

                $Sql = "SELECT seller_id,seller_name FROM SELLER WHERE seller_email=:email";
                $Stmt=$conn->prepare($Sql);
                $Stmt->bindvalue('email',$UserEmail,PDO::PARAM_STR);
                $Stmt->execute();
                $Result=$Stmt->fetchAll(PDO::FETCH_ASSOC);
                //echo "<script>alert(".count($Result).")</script>";
                if(count($Result)==1){

                    unset($_SESSION["PR_Email"]);
                    $Date = date("Y/m/d h:i:sa");

                    $NewToken = AdminTokenCalculation($conn,$Date);

                    $PickedToken=$NewToken[0];
                    $TokenWithTime=$NewToken[1];


                    $ExpireDate = date("Y/m/d h:i:sa",strtotime('+15 minutes',strtotime($Date)));
                    
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
                    $mail->AddAddress($UserEmail,$Result[0]["SELLER_NAME"]);
                    $mail->SetFrom("info@System.com", "Our Online Shopping");
                    $mail->addReplyTo('info@example.com', 'Information');
                    $mail->addCC('cc@example.com');
                    $mail->Subject = "Password Reset Request For Admin : ".$Result[0]['SELLER_NAME'];
                    $content = "<p>Did you request a password recovery?</b>
                                <p>Click <a href='localhost/Project/main/Reset Password/reset_password_seller.php?token=".$TokenWithTime."'> Here</a> to reset your account.</p>
                                <p><b>IF NOT PLEASE IGNORE</b> this email message as the link will be safely removed from the database .</p>
                                <p>Password Reset Request at : ".$Date." </p>
                                <p>Password Reset Link will expired at :".$ExpireDate." </p>";

                    $mail->MsgHTML($content); 

                    if($mail->Send()) {

                        $Sql = "UPDATE SELLER SET seller_token=:token,modified_at=systimestamp WHERE seller_id=:id";
                        $Stmt=$conn->prepare($Sql);
                        $Stmt->bindvalue('token',$PickedToken,PDO::PARAM_STR);
                        $Stmt->bindvalue('id',$Result[0]["SELLER_ID"],PDO::PARAM_STR);
                        $Stmt->execute();
                        
                        $Sql = "COMMIT";
                        $Stmt=$conn->prepare($Sql);
                        $Stmt->execute();

                        $_SESSION["RecoverSuccess"]=true;
                        header("Location: ../Login/login_seller.php",true,  301);
                        die();
                    }
                    else{
                        $_SESSION["EmailFailed"]=true;
                    }


                    


                    

                }
                else{
                    $_SESSION["PR_Email"]=true;
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
        <title>Recover Password | Dev Access</title>
        
        <?php include '../Custom Header&Footer/header.php';?>
    
    </head>

    <body>

        <!-- Loader -->
            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

         <!-- Begin page -->
         <div class="accountbg" style="background: url('../../assets/img/bg/bgS2.jpg');background-size: cover;background-position: center;"></div>

        <div class="account-pages mt-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card" style="background-color: rgba(0,0,0,0.8);color: #fff;">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a href="index.html"><img src="../../assets/img/logo/logo.png" height="30" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h2 class="font-size-18 mt-2 text-center">Reset Password Dev Access</h2>
                                    <p class="text-muted text-center mb-4">Enter your Email and instructions will be sent to you!</p>
    
                                    <form class="form-horizontal" method="POST">

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control verify" id="useremail" name="useremail"placeholder="Enter email" autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <div class="text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                            </div>
                                        </div>
                                    </form>
    
                                </div>
                                <p class="text-black text-center">Remember It ? <a href="../Login/login_seller.php" class="font-weight-bold text-primary"> Sign In Here </a> </p>
    
                            </div>
                        </div>
                        <div class="mt-5 text-center position-relative">
                            
        <?php include '../Custom Header&Footer/footer.php';?>
        <script src="../Register/loader.js"></script>
        <script>
            $(document).ready(function(){

                $("#useremail").val('');
            })
        </script>

    </body>
</html>
<?php
    $ECHO = "<script>";
    if(isset($_SESSION["PR_Empty"])){
        $ECHO.="Empty();";
    }
    elseif(isset($_SESSION["PR_Email"])){
        $ECHO.="WrongEmail();";
    }
    elseif(isset($_SESSION["EmailFailed"])){
        $ECHO.="Error();";
        
    }
    $ECHO.="</script>";

    echo $ECHO;

?>