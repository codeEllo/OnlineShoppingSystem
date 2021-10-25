<?php
include'../Header&Footer/header.php';
require ("../.Database_Connection/database_connection.php");


?>
    <title>Products | Shion House</title>
    <main>
        <!-- breadcrumb Start-->
        <div class="page-notification">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="../Index/index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- listing Area Start -->
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-50">
                            <h2>Products</h2>
                            <!--<p>Browse from 230 latest items</p>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--? Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4 ">
                        <!-- Job Category Listing start -->
                        <div class="category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
								<div class="select-job-items2">
								<?php 
									
									$sql="SELECT PRODUCT_TYPE_NAME FROM PRODUCT_TYPE ORDER BY PRODUCT_TYPE_ID ASC";
									$statement = $conn->prepare($sql);
									$statement->execute();
									$product_type= $statement->fetchAll(PDO::FETCH_ASSOC);
										
								?><select> 
									   <option value="showAll">All Product</option>';
									<?php
                                        foreach ($product_type as $fetch) {
													
										echo '<option value="'.$fetch['PRODUCT_TYPE_ID'].'">'.$fetch['PRODUCT_TYPE_NAME'].'</option>';
										}
										?>
                                   </select>
                                </div>
                                <!--  Select km items End-->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!--?  Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8 ">
                        <!--? New Arrival Start -->
                        <div class="new-arrival new-arrival2" > 
                            <div class="row" id="display">

							<?php 
								$sql="SELECT * FROM PRODUCT ORDER BY PRODUCT_ID ASC ";
								$statement = $conn->prepare($sql);
								$statement->execute();
								$PRODUCT= $statement->fetchAll(PDO::FETCH_ASSOC);
								
							
								
								$P0 = "100000";$P1 = "100001";$P2 = "100002";$P3 = "100003";$P4 = "100004";$P5 = "100005";$P6 = "100006";$P7 = "100007";$P8 = "100008";$P9 = "100009";
								$P10 = "100010";$P11 = "100011";$P12 = "100012";$P13 = "100013";$P14 = "100014";$P15 = "100015";$P16 = "100016";$P17 = "100017";$P18 = "100018";$P19 = "100019";
								$P20 = "100020";$P21 = "100021";$P22 = "100022";$P23 = "100023";$P24 = "100024";$P25 = "100025";$P26 = "100026";$P27 = "100027";$P28 = "100028";$P29 = "100029";
								$P30 = "100030";$P31 = "100031";$P32 = "100032";$P33 = "100033";$P34 = "100034";$P35 = "100035";$P36 = "100036";$P37 = "100037";$P38 = "100038";$P39 = "100039";
								$P40 = "100040";$P41 = "100041";$P42 = "100042";$P43 = "100043";$P44 = "100044";$P45 = "100045";$P46 = "100046";$P47 = "100047";$P48 = "100048";$P49 = "100049";
								$P50 = "100050";$P51 = "100051";$P52 = "100052";$P53 = "100053";$P54 = "100054";$P55 = "100055";$P56 = "100056";$P57 = "100057";$P58 = "100058";$P59 = "100059";
								$P60 = "100060";
										
						foreach($PRODUCT as $product){
							
					?>		
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" class="data"d>
                                <div class="single-new-arrival mb-50 text-center">									
                                    <div class="popular-img">
									<?php
									
										$dir = "../../assets/img/gallery/product_images/*.png";
										$images = glob($dir);
										
										foreach($images as $image){ 
										
										if($product['PRODUCT_ID'] == $P0){
											echo '<img src="../../assets/img/gallery//product_images/0.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P1){											
											echo '<img src="../../assets/img/gallery//product_images/1.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P2){											
											echo '<img src="../../assets/img/gallery//product_images/2.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P3){											
											echo '<img src="../../assets/img/gallery//product_images/3.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P4){											
											echo '<img src="../../assets/img/gallery//product_images/4.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P5){											
											echo '<img src="../../assets/img/gallery//product_images/5.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P6){											
											echo '<img src="../../assets/img/gallery//product_images/6.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P7){											
											echo '<img src="../../assets/img/gallery//product_images/7.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P8){											
											echo '<img src="../../assets/img/gallery//product_images/8.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P9){											
											echo '<img src="../../assets/img/gallery//product_images/9.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P10){											
											echo '<img src="../../assets/img/gallery//product_images/10.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P11){											
											echo '<img src="../../assets/img/gallery//product_images/11.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P12){											
											echo '<img src="../../assets/img/gallery//product_images/12.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P13){											
											echo '<img src="../../assets/img/gallery//product_images/13.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P14){											
											echo '<img src="../../assets/img/gallery//product_images/14.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P15){											
											echo '<img src="../../assets/img/gallery//product_images/15.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P16){											
											echo '<img src="../../assets/img/gallery//product_images/16.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P17){											
											echo '<img src="../../assets/img/gallery//product_images/17.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P18){											
											echo '<img src="../../assets/img/gallery//product_images/18.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P19){											
											echo '<img src="../../assets/img/gallery//product_images/19.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P20){											
											echo '<img src="../../assets/img/gallery//product_images/20.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P21){											
											echo '<img src="../../assets/img/gallery//product_images/21.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P22){											
											echo '<img src="../../assets/img/gallery//product_images/22.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P23){											
											echo '<img src="../../assets/img/gallery//product_images/23.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P24){											
											echo '<img src="../../assets/img/gallery//product_images/24.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P25){											
											echo '<img src="../../assets/img/gallery//product_images/25.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P26){											
											echo '<img src="../../assets/img/gallery//product_images/26.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P27){											
											echo '<img src="../../assets/img/gallery//product_images/27.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P28){											
											echo '<img src="../../assets/img/gallery//product_images/28.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P29){											
											echo '<img src="../../assets/img/gallery//product_images/29.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P30){											
											echo '<img src="../../assets/img/gallery//product_images/30.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P31){											
											echo '<img src="../../assets/img/gallery//product_images/31.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P32){											
											echo '<img src="../../assets/img/gallery//product_images/32.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P33){											
											echo '<img src="../../assets/img/gallery//product_images/33.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P34){											
											echo '<img src="../../assets/img/gallery//product_images/34.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P35){											
											echo '<img src="../../assets/img/gallery//product_images/35.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P36){											
											echo '<img src="../../assets/img/gallery//product_images/36.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P37){											
											echo '<img src="../../assets/img/gallery//product_images/37.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P38){											
											echo '<img src="../../assets/img/gallery//product_images/38.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P39){											
											echo '<img src="../../assets/img/gallery//product_images/39.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P40){											
											echo '<img src="../../assets/img/gallery//product_images/40.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P41){											
											echo '<img src="../../assets/img/gallery//product_images/41.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P42){											
											echo '<img src="../../assets/img/gallery//product_images/42.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P43){											
											echo '<img src="../../assets/img/gallery//product_images/43.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P44){											
											echo '<img src="../../assets/img/gallery//product_images/44.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P45){											
											echo '<img src="../../assets/img/gallery//product_images/45.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P46){											
											echo '<img src="../../assets/img/gallery//product_images/46.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P47){											
											echo '<img src="../../assets/img/gallery//product_images/47.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P48){											
											echo '<img src="../../assets/img/gallery//product_images/48.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P49){											
											echo '<img src="../../assets/img/gallery//product_images/49.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P50){											
											echo '<img src="../../assets/img/gallery//product_images/50.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P51){											
											echo '<img src="../../assets/img/gallery//product_images/51.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P52){											
											echo '<img src="../../assets/img/gallery//product_images/52.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P53){											
											echo '<img src="../../assets/img/gallery//product_images/53.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P54){											
											echo '<img src="../../assets/img/gallery//product_images/54.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P55){											
											echo '<img src="../../assets/img/gallery//product_images/55.png">';
											break;
										}else if($product['PRODUCT_ID'] == $P56){											
											echo '<img src="../../assets/img/gallery//product_images/56.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P57){											
											echo '<img src="../../assets/img/gallery//product_images/57.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P58){											
											echo '<img src="../../assets/img/gallery//product_images/58.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P59){											
											echo '<img src="../../assets/img/gallery//product_images/59.png">';	
											break;
										}else if($product['PRODUCT_ID'] == $P60){											
											echo '<img src="../../assets/img/gallery//product_images/60.png">';	
											break;
										}
										}		?>
									    <div class="favorit-items">
                                          <a href="#"><img src="../../assets/img/gallery/favorit-card.png" alt="" >
                                        </div>
                                    </div>
                                    <div class="popular-caption" title="<?=$product['PRODUCT_ID']?>">
                                     <h3><a href="indexx.php?page=product&id=<?=$product['PRODUCT_ID']?>"><?=$product['PRODUCT_NAME']; ?></a></h3>
                                     <div class="rating mb-10">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>RM <?=$product['PRODUCT_PRICE']; ?></span>									
                                </div>
                            </div>
                        </div>
						<?php
							}
														
					?>	
							</div>
							</div>
							</div>
							</div>
							</div>

<!--? Services Area Start -->
<div class="categories-area section-padding40 gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-50">
                    <div class="cat-icon">
                        <img src="../../assets/img/icon/services1.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-50">
                    <div class="cat-icon">
                        <img src="../../assets/img/icon/services2.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-30">
                    <div class="cat-icon">
                        <img src="../../assets/img/icon/services3.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat">
                    <div class="cat-icon">
                        <img src="../../assets/img/icon/services4.svg" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5>Fast & Free Delivery</h5>
                        <p>Free delivery on all orders</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--? Services Area End -->
</main>
<?php
include'../Header&Footer/footer.php';
?>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- Scroll Up -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type = "text/javascript" src="../../assets/js/fetch_product.js"></script>

<script>
	$(document).ready(function(){
		$("#show_product").on('change',function(){
			$(".data").hide()
			$("#" + $(this).val()).fadeIn(700);			
		}).change();
	});
</script>



</body>
</html>