<?php
include_once'../.Database_Connection/database_connection.php';
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $conn->prepare('SELECT P.PRODUCT_ID,P.PRODUCT_NAME,P.PRODUCT_DISCOUNT,P.PRODUCT_PRICE,P.PRODUCT_DESC,O.ORDER_DETAILS_ID,O.QUANTITY,O.ORDERS_ID
							FROM PRODUCT P
							LEFT JOIN ORDER_DETAILS O
							ON P.PRODUCT_ID=O.PRODUCT_ID WHERE P.PRODUCT_ID = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: indexx.php?page=cart');
    exit;
}
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
	echo '<script>alert("Item Added to Cart!");</script>';
    header('location: indexx.php?page=cart');
    exit;
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['place_order']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	//echo '<script>alert("SENDER IS PREPARING TO SHIP YOUR PARCEL")</script>';
	header('Location: indexx.php?page=place_order');  
    exit;
}

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();// Check the session variable for products in cart

$products = array();
$subtotal = 0.00;

if ($products_in_cart) {  // If there are products in cart
  // There are products in the cart so we need to select those products from the database     // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)

    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $conn->prepare('SELECT * FROM PRODUCT WHERE PRODUCT_ID IN (' . $array_to_question_marks . ')');    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);    // Fetch the products from the database and return the result as an Array
 
    foreach ($products as $product) {
        $subtotal += (float)$product['PRODUCT_PRICE'] * (int)$products_in_cart[$product['PRODUCT_ID']];   // Calculate the subtotal
    }
}

include'../Header&Footer/header.php';
?>
<title>My Cart(<?=$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?>) | Shion House</title>
<meta charset="utf-8">
<style>
div.relative {
  position: relative;
  left: 600px;
  bottom: 400px;
}

div.re{
	position: relative;
  left: 200px;
}
table {
  border-collapse: collapse;
  width: 70%;
}

th {
  height: 70px;
}
</style>

<div class="page-notification">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="indexx.php">Products</a></li>
                                <li class="breadcrumb-item"><a href="indexx.php?page=cart">Shopping Cart</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


<h1 align="center">Shopping Cart</h1>
<div class="re">
    
    <form action="indexx.php?page=cart" method="post">
        <table>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <a href="indexx.php?page=product&id=<?=$product['PRODUCT_ID']?>">
						<?php
								$P0 = "100000";$P1 = "100001";$P2 = "100002";$P3 = "100003";$P4 = "100004";$P5 = "100005";$P6 = "100006";$P7 = "100007";$P8 = "100008";$P9 = "100009";
								$P10 = "100010";$P11 = "100011";$P12 = "100012";$P13 = "100013";$P14 = "100014";$P15 = "100015";$P16 = "100016";$P17 = "100017";$P18 = "100018";$P19 = "100019";
								$P20 = "100020";$P21 = "100021";$P22 = "100022";$P23 = "100023";$P24 = "100024";$P25 = "100025";$P26 = "100026";$P27 = "100027";$P28 = "100028";$P29 = "100029";
								$P30 = "100030";$P31 = "100031";$P32 = "100032";$P33 = "100033";$P34 = "100034";$P35 = "100035";$P36 = "100036";$P37 = "100037";$P38 = "100038";$P39 = "100039";
								$P40 = "100040";$P41 = "100041";$P42 = "100042";$P43 = "100043";$P44 = "100044";$P45 = "100045";$P46 = "100046";$P47 = "100047";$P48 = "100048";$P49 = "100049";
								$P50 = "100050";$P51 = "100051";$P52 = "100052";$P53 = "100053";$P54 = "100054";$P55 = "100055";$P56 = "100056";$P57 = "100057";$P58 = "100058";$P59 = "100059";
								$P60 = "100060";
								$dir = "../../assets/img/gallery/product_images/*.png";
										$images = glob($dir);
										
										foreach($images as $image){ 
										
										if($product['PRODUCT_ID'] == $P0){
											echo '<img src="../../assets/img/gallery//product_images/0.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P1){											
											echo '<img src="../../assets/img/gallery//product_images/1.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P2){											
											echo '<img src="../../assets/img/gallery//product_images/2.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P3){											
											echo '<img src="../../assets/img/gallery//product_images/3.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P4){											
											echo '<img src="../../assets/img/gallery//product_images/4.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P5){											
											echo '<img src="../../assets/img/gallery//product_images/5.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P6){											
											echo '<img src="../../assets/img/gallery//product_images/6.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P7){											
											echo '<img src="../../assets/img/gallery//product_images/7.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P8){											
											echo '<img src="../../assets/img/gallery//product_images/8.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P9){											
											echo '<img src="../../assets/img/gallery//product_images/9.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P10){											
											echo '<img src="../../assets/img/gallery//product_images/10.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P11){											
											echo '<img src="../../assets/img/gallery//product_images/11.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P12){											
											echo '<img src="../../assets/img/gallery//product_images/12.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P13){											
											echo '<img src="../../assets/img/gallery//product_images/13.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P14){											
											echo '<img src="../../assets/img/gallery//product_images/14.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P15){											
											echo '<img src="../../assets/img/gallery//product_images/15.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P16){											
											echo '<img src="../../assets/img/gallery//product_images/16.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P17){											
											echo '<img src="../../assets/img/gallery//product_images/17.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P18){											
											echo '<img src="../../assets/img/gallery//product_images/18.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P19){											
											echo '<img src="../../assets/img/gallery//product_images/19.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P20){											
											echo '<img src="../../assets/img/gallery//product_images/20.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P21){											
											echo '<img src="../../assets/img/gallery//product_images/21.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P22){											
											echo '<img src="../../assets/img/gallery//product_images/22.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P23){											
											echo '<img src="../../assets/img/gallery//product_images/23.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P24){											
											echo '<img src="../../assets/img/gallery//product_images/24.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P25){											
											echo '<img src="../../assets/img/gallery//product_images/25.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P26){											
											echo '<img src="../../assets/img/gallery//product_images/26.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P27){											
											echo '<img src="../../assets/img/gallery//product_images/27.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P28){											
											echo '<img src="../../assets/img/gallery//product_images/28.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P29){											
											echo '<img src="../../assets/img/gallery//product_images/29.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P30){											
											echo '<img src="../../assets/img/gallery//product_images/30.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P31){											
											echo '<img src="../../assets/img/gallery//product_images/31.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P32){											
											echo '<img src="../../assets/img/gallery//product_images/32.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P33){											
											echo '<img src="../../assets/img/gallery//product_images/33.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P34){											
											echo '<img src="../../assets/img/gallery//product_images/34.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P35){											
											echo '<img src="../../assets/img/gallery//product_images/35.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P36){											
											echo '<img src="../../assets/img/gallery//product_images/36.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P37){											
											echo '<img src="../../assets/img/gallery//product_images/37.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P38){											
											echo '<img src="../../assets/img/gallery//product_images/38.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P39){											
											echo '<img src="../../assets/img/gallery//product_images/39.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P40){											
											echo '<img src="../../assets/img/gallery//product_images/40.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P41){											
											echo '<img src="../../assets/img/gallery//product_images/41.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P42){											
											echo '<img src="../../assets/img/gallery//product_images/42.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P43){											
											echo '<img src="../../assets/img/gallery//product_images/43.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P44){											
											echo '<img src="../../assets/img/gallery//product_images/44.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P45){											
											echo '<img src="../../assets/img/gallery//product_images/45.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P46){											
											echo '<img src="../../assets/img/gallery//product_images/46.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P47){											
											echo '<img src="../../assets/img/gallery//product_images/47.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P48){											
											echo '<img src="../../assets/img/gallery//product_images/48.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P49){											
											echo '<img src="../../assets/img/gallery//product_images/49.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P50){											
											echo '<img src="../../assets/img/gallery//product_images/50.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P51){											
											echo '<img src="../../assets/img/gallery//product_images/51.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P52){											
											echo '<img src="../../assets/img/gallery//product_images/52.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P53){											
											echo '<img src="../../assets/img/gallery//product_images/53.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P54){											
											echo '<img src="../../assets/img/gallery//product_images/54.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P55){											
											echo '<img src="../../assets/img/gallery//product_images/55.png" width="150" height="200">';
											break;
										}else if($product['PRODUCT_ID'] == $P56){											
											echo '<img src="../../assets/img/gallery//product_images/56.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P57){											
											echo '<img src="../../assets/img/gallery//product_images/57.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P58){											
											echo '<img src="../../assets/img/gallery//product_images/58.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P59){											
											echo '<img src="../../assets/img/gallery//product_images/59.png" width="150" height="200">';	
											break;
										}else if($product['PRODUCT_ID'] == $P60){											
											echo '<img src="../../assets/img/gallery//product_images/60.png" width="150" height="200">';	
											break;
										}
										}		?>
						</a>
                    </td>
                    <td>
                        <a href="indexx.php?page=product&id=<?=$product['PRODUCT_ID']?>" style="color:black;"><?=$product['PRODUCT_NAME']?></a>
                        <br>
                        <a href="indexx.php?page=cart&remove=<?=$product['PRODUCT_ID']?>" class="remove" style="color:red;">Remove</a>
                    </td>
                    <td class="price">RM <?=$product['PRODUCT_PRICE']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['PRODUCT_ID']?>" value="<?=$products_in_cart[$product['PRODUCT_ID']]?>" min="1" max="1000" placeholder="Quantity">
                    </td>
                    <td class="price">RM <?=$product['PRODUCT_PRICE'] * $products_in_cart[$product['PRODUCT_ID']]?></td> <!-- TU MEANS TOTAL NUMBER OF PRODUCT IN UR CARTS  -->
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
				
				 <div class="subtotal">
				 
				 <tr text-align="right">
					<td >
					</td>
					<td colspan="3">  
						<span class="text" ></span>
					</td>
					<td colspan="">  
						<span class="price">RM <?=$subtotal?>  (Subtotal)</span>
					</td>
				</tr>	
				</div>
        </table>
		
        <div class="buttons" align="center" >
			<a href="indexx.php" class="genric-btn success circle">Back to Product List</a>   
            <input type="submit" value="Update" name="update" class="genric-btn success circle">
            <input type="submit" value="Checkout (<?=$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?>)" name="place_order" class="genric-btn success circle">
			     
        </div>
    </form>
</div>

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
<script src="script.js"></script>