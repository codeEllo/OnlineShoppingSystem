<?php
//echo '<script>alert("SENDER IS PREPARING TO SHIP YOUR PARCEL")</script>';
//echo '<script>alert("Order Successful");</script>';
require('../.Database_Connection/database_connection.php');
include'../Header&Footer/header.php';

try {
	$sql = "INSERT INTO ORDERS (ORDERS_ID,ORDERS_STATUS,CUST_ID,SELLER_ID,PAYMENT_METHOD_ID) VALUES (:ORDERS_ID,:ORDERS_STATUS,:CUST_ID,:SELLER_ID,:PAYMENT_METHOD_ID)";
		
	$statement = $conn->prepare($sql);
	$statement->bindParam(':ORDERS_ID', $ORDERS_ID,PDO::PARAM_INT); 	
	$statement->bindParam(':ORDERS_STATUS', $ORDERS_STATUS,PDO::PARAM_INT);
	$statement->bindParam(':CUST_ID', $CUST_ID,PDO::PARAM_INT); 
	$statement->bindParam(':SELLER_ID', $SELLER_ID,PDO::PARAM_STR);
	$statement->bindParam(':PAYMENT_METHOD_ID', $PAYMENT_METHOD_ID,PDO::PARAM_INT);
	
	if(isset($_POST['submit']))// change to place order
	{
		if( isset($_POST['ORDERS_ID']) && isset($_POST['ORDERS_STATUS']) && isset($_POST['CUST_ID']) && isset($_POST['SELLER_ID']) && isset($_POST['PAYMENT_METHOD_ID']))
		{
			$ORDERS_ID = $_POST['ORDERS_ID'];
			$ORDERS_STATUS = $_POST['ORDERS_STATUS'];
			$CUST_ID = $_POST['CUST_ID'];
			$SELLER_ID = $_POST['SELLER_ID'];
			$PAYMENT_METHOD_ID =(isset($_POST['PAYMENT_METHOD_ID']) ? $_POST['PAYMENT_METHOD_ID'] : '');			
			$statement->execute();	
		
			echo '<script>alert("Your Payment was Successful");</script>';
			//header('Location: indexx.php?page=OrderSuccess');
		}	
	}
	}
	catch(PDOException $e) 
	{		
		echo '<script>alert("PAYMENT UNSUCCESSFUL");</script>';
		//echo $sql ."<br>". $e->getMessage();
	}
?>

<style>
h1 {text-align: center;}

p {text-align: center;}

div {text-align: center;}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th {
  text-align: center;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<title>Receipt | Shion House</title>
<div class="placeorder content-wrapper" >
    <h1>Your Order Has Been Placed</h1>
    <h1>Sender is preparing you Parcel</h1>	
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
	<br>
	
	
<?php
				require('../.Database_Connection/database_connection.php');
				$sql = "SELECT O.ORDERS_ID, O.ORDERS_STATUS,O.CREATED_AT,P.PAYMENT_METHOD_ID,P.PAYMENT_METHOD_NAME
						FROM ORDERS O
						JOIN PAYMENT_METHOD P 
						ON O.PAYMENT_METHOD_ID=P.PAYMENT_METHOD_ID
						WHERE O.CREATED_AT IN (SELECT MAX(CREATED_AT) FROM ORDERS)";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$viewdetail= $stmt->fetchAll(PDO::FETCH_ASSOC);
				$status1 = "CONFIRMED";
				$status2 = "NOT CONFIRMED";
				
				foreach($viewdetail as $view){
					
					if($view['ORDERS_STATUS']== '1'){
						$view['ORDERS_STATUS']=$status1;
					}else if($view['ORDERS_STATUS']== '0'){
						$view['ORDERS_STATUS']=$status2;						
					}				
				
				?>	
	
	<div class="placeorder content-wrapper">
	<table align="center">
  <tr>
    <th colspan="2"><h1>Order Information</h1></th>
  </tr>
  <tr>
    <td><h2>ORDER ID</h2></td>
    <td><h2><?=$view['ORDERS_ID']?></h2></td>
  </tr>
  <tr>
    <td><h2>STATUS ORDER</h1></td>
	
    <td><h2><?=$view['ORDERS_STATUS']?></h2></td>
  </tr>
  <tr>
    <td><h2>ORDER TIME</td>
    <td><h2><?=$view['CREATED_AT']?></h2></td>
  </tr>
  <tr>
    <td><h2>PAYMENT METHOD</h2></td>
    <td><h2><?=$view['PAYMENT_METHOD_NAME']?></h2></td>
  </tr>
</table>
	
	<?php  }
	?>
	</div>
	
	<br>
	<img src="https://media4.giphy.com/media/vnk9fctnt0ucvht1Wd/giphy.gif" width="200">
	<form action="viewdetails.php" method="POST">	
			
			<div class="form-select" id="default-select">			
				<input type="hidden" name="QUANTITY" value="<?=$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?>"  class="single-input">	 <!--  GET QUANTITY FROM CART-->	
				<input type="hidden" name="ORDER_DETAILS_STATUS" value="0" class="single-input">
				
				
				<?php
					
					$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();// Check the session variable for products in cart
					$count = 0;
					$products = array();
					$subtotal = 0.00;

					if ($products_in_cart) {  // If there are products in cart
					  // There are products in the cart so we need to select those products from the database     // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
							
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
						//	echo '<span>"'.$product['PRODUCT_ID'].'"</span>';
								echo '<input type="hidden" name="PRODUCT_ID" value="'.$product_id_array.'" placeholder="" class="single-input">';
								//echo '<input type="hidden" name="PRODUCT_PRICE" value="'.$product_price_array.'" placeholder="" class="single-input">';
								echo '<input type="hidden" name="quantity-"'.$product['PRODUCT_ID'].'" value="'.$product_qty_array.'">';
								$count++;
								
								//$array= array(
							//array("PRODUCT_ID"=>"'.$product_id_array.'")
							//);
						}					
							//echo '<span>'.$count.'</span>'; //to count how many product item that've been ordered
					}
?>
				
				  <!--  GET PRODUCT FROM CART-->				
				<?php require('../.Database_Connection/database_connection.php');
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
			</div>	

				<div class="buttons" align="right">
					<input type="submit" id="btn" value="Complete" name="order" class="genric-btn success circle" >						
				</div>			
				
			</form>
</div>
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
