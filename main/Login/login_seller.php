<?php
    session_start();
    include_once'../.Database_Connection/database_connection.php';
    include'../Login/function.php';
    include'../Session/sellerCheckerAfterLogin.php';
    include'../Session/unset_register_session.php';
    include'../Session/unset_password_recovery.php';
    include'../Session/unset_password_reset.php';



    if($_SERVER["REQUEST_METHOD"] == "POST"){

    
        if((!empty($_POST["useremail"])) && (!empty($_POST["userpassword"]))){

            $UserEmail = trim($_POST["useremail"]);

            $UserPassword = trim($_POST["userpassword"]);
            unset($_SESSION["LoginErrorT"]);
///////////////////////////////////////////       EMAIL VALIDATE           ///////////////////////////////////////////

            
            if (!checkEmail($UserEmail)) {

                $_SESSION["EmailT"] = true;
            } 

            else {

                unset($_SESSION["EmailT"]);
///////////////////////////////////////////       PASSWORD VALIDATIONS          ///////////////////////////////////////////
                
                if(!(strlen($UserPassword)<=31 && strlen($UserPassword)>=8 && PassApproval($UserPassword))){

                    
                    $_SESSION["PasswordT"] = true;

                }

                else{
                    unset($_SESSION["PasswordT"]);

                    $Sql = "SELECT seller_id,seller_name,seller_email,seller_password,seller_status FROM SELLER WHERE seller_email =:email AND ROWNUM = 1";
                    $Statement = $conn->prepare($Sql);
                    $Statement->bindvalue('email',$UserEmail,PDO::PARAM_STR);
                    $Statement->execute();
                    $Result = $Statement->fetchAll(PDO::FETCH_ASSOC);
///////////////////////////////////////////    User Detail VALIDATIONS      /////////////////////////////////////////////
                    
                    if(count($Result)!=1){

                        $_SESSION["Unknown"]  = true; 

                    }

///////////////////////////////////////////    User Password Approval      /////////////////////////////////////////////
                    else{

                        /*if($Result[0]["CUST_STATUS"]==0){

                            $_SESSION["Unknown"]  = true; 

                        }
                        else{*/

                            if(!(password_verify($UserPassword,$Result[0]["SELLER_PASSWORD"]))){
                                
                                $_SESSION["Unknown"]  = true;
                                
                             }
    ///////////////////////////////////////////    Prepare Session Data      /////////////////////////////////////////////
                            else{

                                unset($_SESSION["Unknown"]);
                                $_SESSION["u3p6HYa6EqZksaoSmj5Q3m8z4y7NB474gwPYtRUmH58sJ6M5tx"]=$Result[0]["SELLER_ID"];
                                $_SESSION["B2aSd9qgHCk5dU4bETBcs8oMb494RmWmY943TxfToER436z3jR"]=$Result[0]["SELLER_NAME"];
                                $_SESSION["ExistingEmpire"]=$Result[0]["SELLER_STATUS"];
                                
                                header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
                                die();
                             }
                        //}

                    }
                    
                }

            }

        }

        else{
            unset($_SESSION["EmailT"],$_SESSION["PasswordT"],$_SESSION["Unknown"]);
            $_SESSION["LoginErrorT"] = true;
        }

        header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
        die();
        
    }



?>

<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Login | Dev Access Only</title>
        

        <?php include '../Custom Header&Footer/header.php';?>


    <body>

        <!-- Loader -->
            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

         <!-- Begin page -->
         <div class="accountbg" style="background: url('../../assets/img/bg/bgS1.jpg');background-size: cover;background-position: center;"></div>

        <div class="account-pages mt-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 col-xl-4">
                        <div class="card" style="background-color: rgba(0,0,0,.8);color: #fff;">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a><img src="../../assets/img/logo/logo.png" height="30" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h3 class="font-size-18 mt-2 text-center">Developer Login</h3>
                                    <p class="text-muted text-center mb-4">Sign In To Access Root System.</p>
                                    <?php

                                        if(isset($_SESSION["LoginErrorT"])){
                                            echo "<p class='font-size-18 text-danger text-center mb-4'>Ensure every data is being inputed!</p>";
                                        }
                                    ?>
    
                                    <form class="form-horizontal" method="POST">
    
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Enter email address" autocomplete="off">
                                            <?php
                                                if(isset($_SESSION["EmailT"])){

                                                    echo "<label class='form-label font-size-12 text-danger' for='username'>*Email is not valid!</label>";
                                                }
                                                elseif (isset($_SESSION["Unknown"])) {
                                                    echo "<label class='form-label font-size-12 text-danger' for='username'>*Wrong Email/Password</label>";
                                                }
                                            ?>
                                        </div>
    
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control" style="width:80%;" id="userpassword" name="userpassword" placeholder="Enter password" autocomplete="off">
                                                <a class="form-control text-center" >
                                                    <i class="fa fa-eye-slash" aria-hidden="true" style="hover{color:#333}">
                                                    </i>
                                                </a>        
                                            </div>

                                            <?php
                                                if(isset($_SESSION["PasswordT"])){

                                                    echo "<label class='form-label font-size-12 text-danger' for='userpassword'>*Password requirement haven't met !</label>";
                                                }
                                                
                                            ?>

                                        </div>

    
                                        <div class="row mt-4">
                                            <div class=" text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
    
                                        <div class="mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="../Forgot Password/password_recovery_seller.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                            <div class="col-12 mt-5"> 
                                            </div>
                                        </div>
                                    </form>
    
                                </div>
    
                            </div>
                        </div>
                        <div class="mt-5 text-center position-relative">
                             

        <?php include '../Custom Header&Footer/footer.php';?>
        <script src="../Register/loader.js"></script>
        <script>

            $(document).ready(function(){


                $("#show_hide_password a").on('click', function(event) {
            
                    ShowPass2();

                });

                $("#redirect").click(function(){

                    Redirect();

                })

            })

        </script>

    </body>
</html>
<?php
    

    if(isset($_SESSION["RecoverSuccess"])){
        echo "<script>RecoverSuccess();</script>";
        unset($_SESSION["RecoverSuccess"]);
    }
    elseif(isset($_SESSION["UpdatePassSuccess"])){
        echo "<script>UpdatePassSuccess();</script>";
        unset($_SESSION["UpdatePassSuccess"]);
    }


?>

