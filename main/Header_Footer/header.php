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
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../Index/index.php">HOME</a></li> 
                                        <!--<li><a href="shop.html">shop</a></li>-->
                                        <li><a href="../About/about.php">ABOUT</a></li>
                                        <li><a href="../Shop/indexx.php">PRODUCT</a></li>
                                        <li><a href="../Contact/contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>   
                        </div>
                        <div class="header-right1 d-flex align-items-center">
							
							
							<?php  
								require ('../.Database_Connection/database_connection.php');
								
								 if(isset($_SESSION["u3p6HYa6EqZksaoSmj5Q3m8z4y7NB474gwPYtRUmH58sJ6M5tx"]))  
									 {  
										  echo '<h3><b>'.$_SESSION["B2aSd9qgHCk5dU4bETBcs8oMb494RmWmY943TxfToER436z3jR"].'</b> &nbsp; &nbsp</h3>';
										    echo '<h3 style="color:black;"><a href="indexx.php?page=purchased">MY PURCHASED &nbsp; &nbsp</a></h3>';                             
										    echo '<h3 style="color:black;"><a href="../Session/session_kill.php">LOGOUT &nbsp; &nbsp</a></h3>';  
									 }  
									 else  
									 {  
											echo '<h3><a href="../Login/login.php"><i title="LOGIN">LOGIN &nbsp;&nbsp;</i></a></h3> ' ;    
										    echo '<h3><a href="../Register/register.php"><i title="SIGN UP">SIGNUP&nbsp;&nbsp;&nbsp;</i></a></h3>';
									 }
							?>
							
                            <div class="search d-none d-md-block">
                                <ul class="d-flex align-items-center">
                                    <!--<li class="mr-15">
                                        <div class="nav-search search-switch">
                                            <i class="ti-search"></i>
                                        </div>
                                    </li>-->
                                    <li>
                                        <div class="card-stor">
                                            <a href ="indexx.php?page=cart"><img src="../../assets/img/gallery/card.svg">											
                                            <span><?=$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </header>