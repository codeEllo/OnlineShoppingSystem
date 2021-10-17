
<?php
 include_once'../.Database_Connection/database_connection.php';
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $conn->prepare('SELECT P.PRODUCT_ID,P.PRODUCT_NAME,P.PRODUCT_DISCOUNT,P.PRODUCT_PRICE,P.PRODUCT_DESC,O.ORDER_DETAILS_ID,O.QUANTITY,O.ORDERs_ID
							FROM PRODUCT P
							LEFT JOIN ORDER_DETAILS O
							ON P.PRODUCT_ID=O.PRODUCT_ID WHERE P.PRODUCT_ID = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}

include'../Header&Footer/header.php';
?>
<title><?=$product['PRODUCT_NAME']?></title>
<html>
<style>

html{
	overflow-x: hidden;
}
div.relative {
  position: relative;
  left: 500px;
  bottom: 400px;
}

div.re{
	position: relative;
  left: 250px;
}
</style>


 <div class="page-notification">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
							<li class="breadcrumb-item"><a href="../Index/index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="indexx.php">Products</a></li>
                                <li class="breadcrumb-item"><a href="#"><?=$product['PRODUCT_NAME']?></a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

			<div class="re" >
								
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
											echo '<img src="../../assets/img/gallery//product_images/0.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P1){											
											echo '<img src="../../assets/img/gallery//product_images/1.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P2){											
											echo '<img src="../../assets/img/gallery//product_images/2.png" width="500" height="600">';	
											break;
										}else if($product['PRODUCT_ID'] == $P3){											
											echo '<img src="../../assets/img/gallery//product_images/3.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P4){											
											echo '<img src="../../assets/img/gallery//product_images/4.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P5){											
											echo '<img src="../../assets/img/gallery//product_images/5.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P6){											
											echo '<img src="../../assets/img/gallery//product_images/6.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P7){											
											echo '<img src="../../assets/img/gallery//product_images/7.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P8){											
											echo '<img src="../../assets/img/gallery//product_images/8.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P9){											
											echo '<img src="../../assets/img/gallery//product_images/9.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P10){											
											echo '<img src="../../assets/img/gallery//product_images/10.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P11){											
											echo '<img src="../../assets/img/gallery//product_images/11.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P12){											
											echo '<img src="../../assets/img/gallery//product_images/12.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P13){											
											echo '<img src="../../assets/img/gallery//product_images/13.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P14){											
											echo '<img src="../../assets/img/gallery//product_images/14.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P15){											
											echo '<img src="../../assets/img/gallery//product_images/15.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P16){											
											echo '<img src="../../assets/img/gallery//product_images/16.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P17){											
											echo '<img src="../../assets/img/gallery//product_images/17.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P18){											
											echo '<img src="../../assets/img/gallery//product_images/18.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P19){											
											echo '<img src="../../assets/img/gallery//product_images/19.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P20){											
											echo '<img src="../../assets/img/gallery//product_images/20.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P21){											
											echo '<img src="../../assets/img/gallery//product_images/21.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P22){											
											echo '<img src="../../assets/img/gallery//product_images/22.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P23){											
											echo '<img src="../../assets/img/gallery//product_images/23.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P24){											
											echo '<img src="../../assets/img/gallery//product_images/24.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P25){											
											echo '<img src="../../assets/img/gallery//product_images/25.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P26){											
											echo '<img src="../../assets/img/gallery//product_images/26.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P27){											
											echo '<img src="../../assets/img/gallery//product_images/27.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P28){											
											echo '<img src="../../assets/img/gallery//product_images/28.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P29){											
											echo '<img src="../../assets/img/gallery//product_images/29.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P30){											
											echo '<img src="../../assets/img/gallery//product_images/30.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P31){											
											echo '<img src="../../assets/img/gallery//product_images/31.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P32){											
											echo '<img src="../../assets/img/gallery//product_images/32.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P33){											
											echo '<img src="../../assets/img/gallery//product_images/33.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P34){											
											echo '<img src="../../assets/img/gallery//product_images/34.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P35){											
											echo '<img src="../../assets/img/gallery//product_images/35.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P36){											
											echo '<img src="../../assets/img/gallery//product_images/36.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P37){											
											echo '<img src="../../assets/img/gallery//product_images/37.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P38){											
											echo '<img src="../../assets/img/gallery//product_images/38.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P39){											
											echo '<img src="../../assets/img/gallery//product_images/39.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P40){											
											echo '<img src="../../assets/img/gallery//product_images/40.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P41){											
											echo '<img src="../../assets/img/gallery//product_images/41.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P42){											
											echo '<img src="../../assets/img/gallery//product_images/42.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P43){											
											echo '<img src="../../assets/img/gallery//product_images/43.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P44){											
											echo '<img src="../../assets/img/gallery//product_images/44.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P45){											
											echo '<img src="../../assets/img/gallery//product_images/45.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P46){											
											echo '<img src="../../assets/img/gallery//product_images/46.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P47){											
											echo '<img src="../../assets/img/gallery//product_images/47.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P48){											
											echo '<img src="../../assets/img/gallery//product_images/48.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P49){											
											echo '<img src="../../assets/img/gallery//product_images/49.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P50){											
											echo '<img src="../../assets/img/gallery//product_images/50.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P51){											
											echo '<img src="../../assets/img/gallery//product_images/51.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P52){											
											echo '<img src="../../assets/img/gallery//product_images/52.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P53){											
											echo '<img src="../../assets/img/gallery//product_images/53.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P54){											
											echo '<img src="../../assets/img/gallery//product_images/54.png" width="400" height="600">';	
											break;
										}else if($product['PRODUCT_ID'] == $P55){											
											echo '<img src="../../assets/img/gallery//product_images/55.png" width="400" height="500">';
											break;
										}else if($product['PRODUCT_ID'] == $P56){											
											echo '<img src="../../assets/img/gallery//product_images/56.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P57){											
											echo '<img src="../../assets/img/gallery//product_images/57.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P58){											
											echo '<img src="../../assets/img/gallery//product_images/58.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P59){											
											echo '<img src="../../assets/img/gallery//product_images/59.png" width="400" height="500">';	
											break;
										}else if($product['PRODUCT_ID'] == $P60){											
											echo '<img src="../../assets/img/gallery//product_images/60.png" width="400" height="500">';	
											break;
										}
										}		?>
				<!--<img src="" width="500" height="500" alt="">-->
				<div class="relative" >
					<h1 class="name"><?=$product['PRODUCT_NAME']?></h1>
					<span class="price">
						RM <?=$product['PRODUCT_PRICE']?>
					</span>
					<form action="indexx.php?page=cart" method="post">
						<input type="number" name="quantity" value="1" min="1" max="1000" placeholder="Quantity" required>
						<input type="hidden" name="product_id" value="<?=$product['PRODUCT_ID']?>"><br><br>
						<input type="submit" value="Add To Cart" class="btn btn-primary btn-xs">
					</form>
					<div class="description">
						<?=$product['PRODUCT_DESC']?>
					</div>
				</div>
			</div>
			
			</html>

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
