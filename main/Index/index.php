<?php 
	session_start();
    include'../Header&Footer/header.php';
    include_once'../.Database_Connection/database_connection.php';
    include'../Login/function.php';
    //include'../Session/userCheckerAfterLogin.php';
    include'../Session/unset_register_session.php';
    include'../Session/unset_login_session.php';		

?>
     <title>Welcome | Shion House</title>
 
    <main>
        <!-- Hero Area Start-->
        <div class="container-fluid">
            <div class="slider-area">
                <!-- Mobile Device Show Menu-->
                <div class="header-right2 d-flex align-items-center">
                    <!-- Social -->
                    <div class="header-social  d-block d-md-none">
                        <a href="#"><i class=""></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                    <!-- Search Box -->
                    <div class="search d-block d-md-none" >
                        <ul class="d-flex align-items-center">
                            <li class="mr-15">
                                <div class="nav-search search-switch">
                                    <i class="ti-search"></i>
                                </div>
                            </li>
                            <li>
                                <div class="card-stor">
                                    <img src="../../assets/img/gallery/card.svg" alt="">
                                    <span>0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>    

                <div class="slider-active dot-style">
                    <!-- Single -->
                    <div class="single-slider slider-bg1 hero-overly slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
                                        <h1>Great<br>Flexibility</h1>
                                        <!--<a href="../About/about.php" class="btn">About Us</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="single-slider slider-bg2 hero-overly slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
                                        <h1>Genuine<br>Part<br>Replacement</h1>
                                     <!--   <a href="../Register/Register.php" class="btn">Register Now</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single -->
                    <div class="single-slider slider-bg3 hero-overly slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-lg-9">
                                    <!-- Hero Caption -->
                                    <div class="hero__caption">
									<h1>Solid <br>Performance</h1>
                                        <!--<a href="../Login/login.php" class="btn">Login Now</a>-->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->
        <!-- Popular Items Start -->
        <div class="popular-items pt-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="popular-img">
                                <img src="../../assets/img/gallery/cases.png" alt="">
                                <div class="img-cap">
                                    <span>CASES</span>
                                </div>
                                <div class="favorit-items">
                                 <a href="#" class="btn">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>
				
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="popular-img">
                            <img src="../../assets/img/gallery/card.png" alt="">
                            <div class="img-cap">
                                <span>GRAPHIC CARD</span>
                            </div>
                            <div class="favorit-items">
                             <a href="#" class="btn">Shop Now</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                    <div class="popular-img">
                        <img src="../../assets/img/gallery/m2.png" alt="">
                        <div class="img-cap">
                            <span>RGB MEMORY</span>
                        </div>
                        <div class="favorit-items">
                         <a href="#" class="btn">Shop Now</a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                <div class="popular-img">
                    <img src="../../assets/img/gallery/m1.png" alt="">
                    <div class="img-cap">
                        <span>MOTHERBOARD</span>
                    </div>
                    <div class="favorit-items">
                     <a href="#" class="btn">Shop Now</a>
                 </div>
             </div>
         </div>
     </div>
	 
	   <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="popular-img">
                                <img src="../../assets/img/gallery/processor.png" alt="">
                                <div class="img-cap">
                                    <span>PROCESSOR</span>
                                </div>
                                <div class="favorit-items">
                                 <a href="#" class="btn">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>
				 
				   <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="popular-img">
                                <img src="../../assets/img/gallery/ssddd.png" alt="">
                                <div class="img-cap">
                                    <span>Hard Drive</span>
                                </div>
                                <div class="favorit-items">
                                 <a href="#" class="btn">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>
				 
				   <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="popular-img">
                                <img src="../../assets/img/gallery/ssdd.png" alt="">
                                <div class="img-cap">
                                    <span>Solid State Drive</span>
                                </div>
                                <div class="favorit-items">
                                 <a href="#" class="btn">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>
				 
				   <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                            <div class="popular-img">
                                <img src="../../assets/img/gallery/webcam.png" alt="">
                                <div class="img-cap">
                                    <span>ACCESSORIES</span>
                                </div>
                                <div class="favorit-items">
                                 <a href="#" class="btn">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>
		 </div>
</div>
</div>
<!-- Popular Items End -->
<!--? New Arrival Start -->
<div class="new-arrival">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2>OUR TOP<br>PRODUCT</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="popular-img">
                        <img src="../../assets/img/gallery/product_images/CORSAIRGB.png" alt="">
                        <div class="favorit-items">
                            <!-- <span class="flaticon-heart"></span> -->
                            <img src="../../assets/img/gallery/favorit-card.png" alt="">
                        </div>
                    </div>
                    <div class="popular-caption">
                     <h3><a href="#">CORSAIR VENGEANCE RGB PRO 64GB(2x32GB)</a></h3>
                     <div class="rating mb-10">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span>RM 799</span>
                </div>
            </div>
        </div>
        
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
            <div class="popular-img">
                <img src="../../assets/img/gallery/product_images/250GB.png" alt="">
                <div class="favorit-items">
                    <!-- <span class="flaticon-heart"></span> -->
                    <img src="../../assets/img/gallery/favorit-card.png" alt="">
                </div>
            </div>
            <div class="popular-caption">
             <h3><a href="#">SAMSUNG 970 EVO PLUS M.2 NVME 250GB SSD</a></h3>
             <div class="rating mb-10">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <span>RM 125</span>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
        <div class="popular-img">
            <img src="../../assets/img/gallery/product_images/NVIDIA GEFORCE RTX3090.png" alt="">
            <div class="favorit-items">
                <!-- <span class="flaticon-heart"></span> -->
                <img src="../../assets/img/gallery/favorit-card.png" alt="">
            </div>
        </div>
        <div class="popular-caption">
         <h3><a href="#">NVIDIA GEFORCE RTX3090<br>&nbsp;  </a></h3>
         <div class="rating mb-10">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <span>RM 6500</span>
    </div>
</div>
</div>
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
        <div class="popular-img">
            <img src="../../assets/img/gallery/product_images/i7.png" alt="">
            <div class="favorit-items">
                <!-- <span class="flaticon-heart"></span> -->
                <img src="../../assets/img/gallery/favorit-card.png" alt="">
            </div>
        </div>
        <div class="popular-caption">
         <h3><a href="#">INTEL CORE I7-10700 <br>&nbsp;  </a></h3>
         <div class="rating mb-10">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <span>RM 1000</span>
    </div>
</div>
</div>
</div>
<!-- Button -->
<!--<div class="row justify-content-center">
    <div class="room-btn">
        <a href="catagori.html" class="border-btn">Browse More</a>
    </div>
</div>-->
</div>
</div>
<!--? New Arrival End -->
<!--? collection -->
<section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="../../assets/img/hero/hero11.png">
    <div class="container-fluid"></div>
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
            <div class="single-question text-center">
                <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">Create Your Dream Gaming Space</h2>
                <a href="../About/about.php" class="btn class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">More Info About Us</a>
            </div>
        </div>
    </div>
</div>
</section>
<div class="categories-area section-padding40 gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
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
                <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
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
                <div class="single-cat mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
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
                <div class="single-cat wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
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
<!--? Services Area End -->
</main>
<?php
require ("../Header&Footer/footer.php");
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

</body>
</html>