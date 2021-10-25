<?php 
	session_start();
    include_once'../.Database_Connection/database_connection.php';
    include'../Login/function.php';
  //  include'../Session/sellerCheckerAfterLogin.php';
    include'../Session/unset_register_session.php';
    include'../Session/unset_login_session.php';		

?>		
<!doctype html>
	<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Shion House - HOME</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

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
	
</head>
<body class="full-wrapper">
 <!-- ? Preloader Start -->
  <?php
 include "../Header&Footer/headerSeller.php" ?>

		<main>
			<!-- breadcrumb Start-->
		<div class="page-notification page-notification2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center">
								<li class="breadcrumb-item"><a href="../Product Details/home.php">Home</a></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<section class="sample-text-area">
			<div class="container box_1170">
				<h3 class="text-heading">What are we?</h3>
				<p class="sample-text">
					<p><i>Shion House</i> offers online payment services for gamers, youth, millennials and Generation Z. Founded in 2021 and dual-headquartered in Selangor and Johor, X has 3 organized offices and is recognized as the leading brand for gamers in the Malaysia and Singapore..</p>
					
				</p>
			</div>
		</section>
			<div class="section-top-border">
				<h3 class="mb-30">Creator Details</h3>
					<div class="progress-table-wrap">
						<div class="progress-table">
							<div class="table-head">
								<div class="serial">#</div>
								<div class="country">Picture</div>
								<div class="country">Details</div>
							</div>
								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"> <img src="pic/fatin.png" alt="fatin" width="200" height="200"></div>
									<div class="country">
										<ul class="unordered-list">
											<li>Name	:	Fatin Nurul Amalin Binti Faizu</li>
											<li>Student No.	:	2021172885</li>
											<li>Phone No.	:	0193879503 / 0192329181</li>
											<li>Email	:	fatinamalin53@gmail.com</li>
											<li>Role	:	Project Manager ( Database Administrator)</li>
										</ul>
										</div>				
								</div>	
								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"> <img src="pic/naim.jpg" alt="naim" width="200" height="200"></div>
									<div class="country">
										<ul class="unordered-list">
											<li>Name	:	Muhammad Naim Bin Rizali</li>
											<li>Student No.	:	2021102747</li>
											<li>Phone No.	:	011-11720180</li>
											<li>Email	:	muhammadnaimrizali376@gmail.com</li> 
											<li>Role	:	Programmer </li>
										</ul>
										</div>				
								</div>	
								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"> <img src="pic/elly.jpeg" alt="elly" width="200" height="200"></div>
									<div class="country">
										<ul class="unordered-list">
											<li>Name	:	Nur Ellya Nadhirah Binti Mohd Ghazali</li>
											<li>Student No.	:	2021120523</li>
											<li>Phone No.	:	0197378675</li>
											<li>Email	:	ellyanadhirah@gmail.com</li>
											<li>Role	:	Database Designer</li>

										</ul>
										</div>				
								</div>
								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"> <img src="pic/asiah.jpg" alt="asiah" width="200" height="200"></div>
									<div class="country">
										<ul class="unordered-list">
											<li>Name	:	Siti Asiah binti Basarudin
											<li>Student No.	:  	2021113699
											<li>Phone No.	:	019-5287681
											<li>Email	:	siti.asiah1750@gmail.com 
											<li>Role	:	Programmer 

										</ul>
										</div>				
								</div>	
								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"> <img src="pic/farah.jpg" alt="farah" width="200" height="200"></div>
									<div class="country">
										<ul class="unordered-list">
											<li>Name	:	Nur Farah Waheeda Binti Che Aziz</li>
											<li>Student No.	:	2021102903 </li>
											<li>Phone No.	:	014-8180545</li>
											<li>Email	:	farrahwaheedaaziz@gmail.com</li>
											<li>Role	:	System Analyst</li>
										</ul>
										</div>				
								</div>	
						</div>
					</div>
			</div>
		</div>								
	</main>
	<?php
 include "../Header&Footer/footer.php" ?>
</footer>
		<div id="back-top" >
			<a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
			</div>
		<!-- JS here -->
		<!-- Jquery, Popper, Bootstrap -->
<script src="../../assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/slick.min.js"></script>
<script src="../../assets/js/jquery.slicknav.min.js"></script>

<!-- One Page, Animated-HeadLin, Date Picker -->
<script src="../../assets/js/wow.min.js"></script>
<script src="../../assets/js/animated.headline.js"></script>
<script src="../../assets/js/jquery.magnific-popup.js"></script>
<script src="../../assets/js/gijgo.min.js"></script>

<!-- Nice-select, sticky,Progress -->
<script src="../../assets/js/jquery.nice-select.min.js"></script>
<script src="../../assets/js/jquery.sticky.js"></script>
<script src="../../assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="../../assets/js/jquery.counterup.min.js"></script>
<script src="../../assets/js/waypoints.min.js"></script>
<script src="../../assets/js/jquery.countdown.min.js"></script>
<script src="../../assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="../../assets/js/contact.js"></script>
<script src="../../assets/js/jquery.form.js"></script>
<script src="../../assets/js/jquery.validate.min.js"></script>
<script src="../../assets/js/mail-script.js"></script>
<script src="../../assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="../../assets/js/plugins.js"></script>
<script src="../../assets/js/main.js"></script>
		</body>
	</html>