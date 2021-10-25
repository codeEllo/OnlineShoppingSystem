<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="../../assets/css/gijgo.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/animated-headline.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/slick.css">
    <link rel="stylesheet" href="../../assets/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/style.css">    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    
</head>
<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../../assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>


<header>
        <div class="header-area ">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="../Index/index.php"><img src="../../assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Main-menu --> 
                        </div>
						
						
							<?php  
								require ('../.Database_Connection/database_connection.php');
								
								 if(isset($_SESSION["u3p6HYa6EqZksaoSmj5Q3m8z4y7NB474gwPYtRUmH58sJ6M5tx"]))  
									 {  //after login		  
										echo '<div class="main-menu  d-none d-lg-block">';
										  echo  ' <nav>';
											 echo  '  <ul id="navigation">';
												 echo   ' <li><a href="../Product Details/home.php">HOME</a></li>' ;
												 echo   ' <li><a href="../Product Details/about.php">ABOUT</a></li>';
												  echo	' <li><a href="#">SELLER</a>';
													echo    ' <ul class="submenu">';
													  echo     '  <li><a href="../Product Details/sellerAddNew.php">Add New Seller</a></li>';
													   echo     '  <li><a href="../Product Details/sellerDetails.php">Seller Details / Update</a></li> ' ;                
													  echo  ' </ul>';
												  echo  ' </li>';
												  echo  ' <li><a href="#">PRODUCT</a>';
													echo    ' <ul class="submenu">';
													   echo     ' <li><a href="../Product Details/productAddNew.php">Add New Product</a></li>';
													 echo       ' <li><a href="../Product Details/productDetails.php">Product Details / Update</a></li>';
												   echo  ' </ul>';
												  echo  ' </li>';
												 echo   ' <li><a href="../Product Details/orderList.php">Order\'s Details</a></li>';
											  echo '  </ul> '  ;                             
										   echo ' </nav>   ' ;                                                       
									  echo  ' </div>';
									  
									  echo '<h3><b>'.$_SESSION["B2aSd9qgHCk5dU4bETBcs8oMb494RmWmY943TxfToER436z3jR"].'</b> &nbsp; &nbsp</h3>';
									 echo '<h3 style="color:black;"><a href="../Session/session_kill_seller.php">LOGOUT &nbsp; &nbsp</a></h3>';  

													   
									 }  
									 else  
									 {  //before login
										echo '<li><a href="../Product Details/home.php">HOME</a></li> ';
                                       echo ' <li><a href="../Product Details/about.php">ABOUT</a></li>';
                                       echo ' <li><a href="../Login/login.php">LOGIN</a></li>';
									 }
							?>
						
						
                        <div class="header-right1 d-flex align-items-center">
							
							
							
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </header>