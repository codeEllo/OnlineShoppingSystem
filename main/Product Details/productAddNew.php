	
<!doctype html>
	<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Shion House - Add New Product</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">

		<!-- CSS here -->
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
		<style>
		main {
			  padding-top: 50px;
			  padding-right: 30px;
			  padding-bottom: 50px;
			  padding-left: 80px;
			}
</style>
</head>
<body class="full-wrapper">
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
								<li class="breadcrumb-item"><a href="../Product Details/productAddNew.php">Add New Product</a></li> 
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb End-->
			<div class="section-top-border" align="left" style="inline-block">
				<div class="row">								
					<div class="col-lg-8 col-md-8">
						<h3 class="mb-30">Add New Product</h3>
						<div class="row">
							<div class="col-lg-12">
								<blockquote class="generic-blockquote">Please insert the details.
								</blockquote>
							</div>
						</div>
						<form action="../Product Details/productProcess.php" method="POST">
							<div class="mt-10">
							<input type="text" name="PRODUCT_NAME" placeholder="Product Name"
							onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Name'" required
							class="single-input">
							</div>
							<div class="mt-10">
								<div class="form-select" id="default-select"">
								
									<?php 
									require ("../Product Details/database_connection.php");
										$sql="SELECT * FROM SUPPLIER ORDER BY SUPPLIER_NAME ASC";
										$statement = $conn->prepare($sql);
										$statement->execute();
										$SUPPLIER= $statement->fetchAll(PDO::FETCH_ASSOC);
										
										?>
										<select name="SUPPLIER_ID">
										<option value="">Please Choose Supplier</option>
										<?php
													// show the SUPPLIER
													foreach ($SUPPLIER as $row) {
													echo '<option value="'.$row['SUPPLIER_ID'].'">'.$row['SUPPLIER_NAME'].'</option>';
													}
									?>	
								</select>
								</div>	
							</div>
							<div class="mt-10">
								<div class="form-select" id="default-select"">
									
										<?php 
												$sql="SELECT * FROM PRODUCT_TYPE ORDER BY PRODUCT_TYPE_NAME ASC";
												$statement = $conn->prepare($sql);
												$statement->execute();
												$PRODUCTTYPE= $statement->fetchAll(PDO::FETCH_ASSOC);
												?>
												
												<select name="PRODUCT_TYPE_ID">
												<option value="">Please Choose Product Type</option>
												
												<?php
													// show the $PRODUCT_TYPE
													foreach ($PRODUCTTYPE as $row) {
													echo '<option value="'.$row['PRODUCT_TYPE_ID'].'">'.$row['PRODUCT_TYPE_NAME'].'</option>';
													}
													
										?>
									  </select>
								</div>	
							</div>
							<div class="mt-10">
								<input type="number" name="PRODUCT_PRICE" placeholder="Price"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Price'" required
								class="single-input">
							</div>
							<div class="mt-10">
									<input type="number" name="PRODUCT_DISCOUNT" placeholder="Discount"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Discount'"
								class="single-input">
							</div>								
							<div class="mt-10">
								<textarea class="single-textarea" name="PRODUCT_DESC" placeholder="Description"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" ></textarea>
							</div>
							<div class="button-group-area mt-40" align="right">
								<a href="../Product Details/home.php" class="genric-btn info circle">BACK</a>
								<input type="reset" value="CLEAR" name="reset" class="genric-btn warning circle">
								<input type="submit" value="ADD" name="submit" class="genric-btn success circle">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php
 include "../Header&Footer/footer.php" ?>
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