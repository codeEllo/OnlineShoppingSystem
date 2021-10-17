<?php

include_once'../.Database_Connection/database_connection.php';
include'../Header&Footer/header.php';

function generateCode($limit){
$code = '';
for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
return $code;
}

if (isset($_GET['submit']) && is_numeric($_GET['submit']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['submit']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['submit']]);
}



?>
<title>Place New Order</title>
			<h1 align="center">Payment Option</h1>
						<form action="indexx.php?page=OrderSuccess" method="POST">		

							<div class="mt-10">
								<div class="form-select" id="default-select">			
									<input type="hidden" name="ORDERS_ID" value="<?=generateCode(16)?>"  class="single-input">
								</div>	
							</div>
							
							<div class="mt-10">
								<div class="form-select" id="default-select">
										<?php 
										//require ("database_connection.php");
										$sql="SELECT * FROM PAYMENT_METHOD ORDER BY PAYMENT_METHOD_ID ASC";
										$statement = $conn->prepare($sql);
										$statement->execute();
										$PAYMENT_METHOD = $statement->fetchAll(PDO::FETCH_ASSOC);
										?>												
										<select name="PAYMENT_METHOD_ID" required>
										<option value="">Select Payment Method</option>
										<?php
										foreach ($PAYMENT_METHOD as $row) {
										echo '<option value="'.$row['PAYMENT_METHOD_ID'].'">'.$row['PAYMENT_METHOD_NAME'].'</option>';
										}													
										?>
									  </select>
								</div>	
							</div>
							

							<div class="mt-10">
								<div class="form-select" id="default-select">			
									<input type="hidden" name="ORDERS_STATUS" value="1"  class="single-input">
								</div>	
							</div>	
							
							<div class="mt-10">
								<div class="form-select" id="default-select">		
									
							<?php  
								
								 if(isset($_SESSION["u3p6HYa6EqZksaoSmj5Q3m8z4y7NB474gwPYtRUmH58sJ6M5tx"]))  
									 {  
											echo '<input type="hidden" name="CUST_ID" value="'.$_SESSION["u3p6HYa6EqZksaoSmj5Q3m8z4y7NB474gwPYtRUmH58sJ6M5tx"].'" class="single-input" >';
											echo '</div>';	
									 }
							?>
								</div>	
							</div>
							
							
							<div class="mt-10">
								<div class="form-select" id="default-select">			
									<input type="hidden" name="SELLER_ID" value="102" placeholder="Seller ID" class="single-input">
								</div>	
							</div>							
							
														
							<div class="button-group-area mt-40" align="right">
								<a href="indexx.php?page=cart" class="genric-btn success circle">BACK</a>
								<input type="submit" value="PLACE ORDER" name="submit" class="genric-btn success circle">
								
							</div>
						</form>
<?php
require ("../Header&Footer/footer.php");
?>
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
</html>