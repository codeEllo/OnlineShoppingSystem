<?php
include_once'../.Database_Connection/database_connection.php';
//include'../Header&Footer/header.php';

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

<?php
					
					$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();// Check the session variable for products in cart
					$count = 0;
					$products = array();
					$subtotal = 0.00;

					if ($products_in_cart) {  							
						$array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
						$stmt = $conn->prepare('SELECT P.PRODUCT_ID,P.PRODUCT_NAME,P.PRODUCT_DISCOUNT,P.PRODUCT_PRICE,P.PRODUCT_DESC,O.ORDER_DETAILS_ID,O.QUANTITY,O.ORDERS_ID
							FROM PRODUCT P
							LEFT JOIN ORDER_DETAILS O
							ON P.PRODUCT_ID=O.PRODUCT_ID WHERE P.PRODUCT_ID IN (' . $array_to_question_marks . ')');    // We only need the array keys, not the values, the keys are the id's of the products
						$stmt->execute(array_keys($products_in_cart));
						$products = $stmt->fetchAll(PDO::FETCH_ASSOC);    // Fetch the products from the database and return the result as an Array
					 
						foreach ($products as $product) {
							$subtotal += (float)$product['PRODUCT_PRICE'] * (int)$products_in_cart[$product['PRODUCT_ID']];   // Calculate the subtotal
							$product_id_array = $product['PRODUCT_ID'];
							$product_price_array = $product['PRODUCT_PRICE'];
							$product_qty_array = $products_in_cart[$product['PRODUCT_ID']];
								echo '<input type="hidden" name="PRODUCT_ID" value="'.$product_id_array.'" placeholder="" class="single-input">';
								echo '<input type="hidden" name="quantity-"'.$product['PRODUCT_ID'].'" value="'.$product_qty_array.'">';
								$count++;
						}					
					}
					
					
					
				$sql = "SELECT O.ORDERS_ID, O.ORDERS_STATUS,O.CREATED_AT,P.PAYMENT_METHOD_ID,P.PAYMENT_METHOD_NAME
						FROM ORDERS O
						JOIN PAYMENT_METHOD P 
						ON O.PAYMENT_METHOD_ID=P.PAYMENT_METHOD_ID
						WHERE O.CREATED_AT IN (SELECT MAX(CREATED_AT) FROM ORDERS)";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$viewdetail= $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($viewdetail as $view){
					$order_id_array = $view['ORDERS_ID'];
				echo '<input type="hidden" name="ORDERS_ID" value="'.$order_id_array.'" placeholder="" class="single-input">';	
				}
				?>





<title>My Purchased History | Shion House</title>
<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">
						
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

table {
  table-layout: fixed;
  border-collapse: collapse;
  width = 10%;
}
</style>
<?php 

include'../Header&Footer/header.php';?>
<h1 align="center">My Purchased</h1>
<br><br>
<body>
<?php

	$cust = $_SESSION["u3p6HYa6EqZksaoSmj5Q3m8z4y7NB474gwPYtRUmH58sJ6M5tx"];
	$sql="SELECT * FROM ORDERS WHERE CUST_ID ='$cust' ORDER BY CREATED_AT DESC";
	$ss = $conn->prepare($sql);
	$ss->execute();
	$purchase= $ss->fetchAll(PDO::FETCH_ASSOC);
	
	
	foreach($purchase as $purchased){
		$product = $purchased['ORDERS_ID'];
		
		
	?>
<div class="w3-container">

  <table class="w3-table-all w3-card-4" align="center">       
    <tr>
	  <th colspan="1">Order ID | <?= $product ?></th>
	  <th></th>
	  <th></th>
      <th colspan="1">Order Time | <?= $purchased['CREATED_AT'] ?></th>
    </tr>
    <tr>
	<?php 
	$total_order = 0;
	$sql="SELECT  O.ORDER_DETAILS_ID,o.ORDER_DETAILS_STATUS,O.QUANTITY, O.PRODUCT_ID, O.ORDERS_ID,P.PRODUCT_NAME,P.PRODUCT_PRICE,P.PRODUCT_DESC,P.PRODUCT_TYPE_ID
			FROM ORDER_DETAILS O
			JOIN PRODUCT P
			ON O.PRODUCT_ID = P.PRODUCT_ID WHERE ORDERS_ID = '$product'";
	$ss = $conn->prepare($sql);
	$ss->execute();
	$purchase_pro= $ss->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($purchase_pro as $purchase){
		?>
		<td><?=$purchase['PRODUCT_ID']?></td>
      <td><?=$purchase['PRODUCT_NAME']?></td>
      <td>X <?=$purchase['QUANTITY']?></td>
      <td>RM <?=$purchase['PRODUCT_PRICE'] * $purchase['QUANTITY'] ?></td>
    </tr>
		<?php
		$total_order+=($purchase['PRODUCT_PRICE'] * $purchase['QUANTITY']);
		} 
		?>
	<tr>
	<td></td>
      <td colspan="1"></td>
      <td><b>Order Total</b></td>
      <td><b>RM <?=$total_order?><b></td>
    </tr>
	
	<tr>
	<td>    <?php 
				$status1 = "COMPLETED";
				$status2 = "IMCOMPLETE";
				
				if($purchase['ORDER_DETAILS_STATUS']== '1'){
					$purchase['ORDER_DETAILS_STATUS']=$status1;
				}else if($purchase['ORDER_DETAILS_STATUS']== '0'){
					$purchase['ORDER_DETAILS_STATUS']=$status2;						
				} ?>	
				
				
				
				STATUS ORDER: <b><?= $purchase['ORDER_DETAILS_STATUS']  ?><b></td>
	<td></td>
      <td>Payment Method</td>
	  
	  
	 <?php 
	$sql="SELECT  O.ORDERS_ID, P.PAYMENT_METHOD_ID, P.PAYMENT_METHOD_NAME
		  FROM ORDERS O
		  JOIN PAYMENT_METHOD P 
		  ON O.PAYMENT_METHOD_ID=P.PAYMENT_METHOD_ID WHERE O.ORDERS_ID = '$product'";
	$ss = $conn->prepare($sql);
	$ss->execute();
	$pay= $ss->fetchAll(PDO::FETCH_ASSOC);
	  foreach($pay as $payment){
	  
	  ?>
	<td><?=$payment['PAYMENT_METHOD_NAME'];?></td>
	  <?php }
	  ?>
    </tr>
  </table>
  
  <br>
  <br>
  
									
</div>
 <?php
  }
	 ?>
</body>		
						
						
						
						
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