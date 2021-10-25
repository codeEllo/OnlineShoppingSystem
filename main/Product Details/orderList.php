<!doctype html>
<html class="no-js" lang="zxx">
<head>
<style>
main {
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}
* {
  box-sizing: border-box;
}
	#myInput {
  background-image: url('/pic/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>
</style>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shion House - Order Details List</title>
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
	
</head>
<?php include '../Header&Footer/headerSeller.php'; ?>
	<main>
		<!-- breadcrumb Start-->
		<div class="page-notification page-notification2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center">
								<li class="breadcrumb-item"><a href="../Product Details/home.php">Home</a></li>
								<li class="breadcrumb-item"><a href="../Product Details/orderList.php">Order Details List</a></li> 
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb End-->
		<div class="section-top-border">
			<form>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search">
			</form>

					<?php 
						require ("../Product Details/database_connection.php");
						$count=0;
						$sql="SELECT ORDER_DETAILS.ORDER_DETAILS_ID,ORDERS.ORDERS_ID,CUSTOMER.CUST_NAME,PRODUCT.PRODUCT_NAME,ORDER_DETAILS.QUANTITY, ORDER_DETAILS.CREATED_AT,ORDER_DETAILS.ORDER_DETAILS_STATUS, ORDER_DETAILS.MODIFIED_AT FROM ORDER_DETAILS JOIN PRODUCT ON ORDER_DETAILS.PRODUCT_ID=PRODUCT.PRODUCT_ID JOIN ORDERS ON ORDERS.ORDERS_ID=ORDER_DETAILS.ORDERS_ID JOIN CUSTOMER ON ORDERS.CUST_ID=CUSTOMER.CUST_ID ORDER BY ORDER_DETAILS.CREATED_AT DESC";
						$statement = $conn->prepare($sql);
						$statement->execute();
						$ORDERS= $statement->fetchAll(PDO::FETCH_ASSOC);
					?>							

		<div style="overflow-x:auto;">
			<h3 class="mb-30">ORDER DETAILS LIST</h3>
			
				<table id="myTable" cellspacing="0" width="100%">
					<form class="header">
					
					<tr>
						<th class="th-sm">ID</th>
						<th class="th-sm">Order ID</th>
						<th class="th-sm">Customer Name</th>
						<th class="th-sm">Product Name</th>
						<th class="th-sm">Quantity</th>
						<th class="th-sm">Created At</th>
						<th class="th-sm">Modified At</th>
						<th class="th-sm">Status</th>
						<th class="th-sm">Action</th>
					</tr>

					<?php
						// show the Order Details
					foreach($ORDERS as $row)
						{?>	
							<tr>
							<td><?php echo $row['ORDER_DETAILS_ID']; ?></td>
							<td><?php echo $row['ORDERS_ID']; ?></td>
							<td><?php echo $row['CUST_NAME']; ?></td>
							<td><?php echo $row['PRODUCT_NAME']; ?></td>
							<td><?php echo $row['QUANTITY']; ?></td>
							<td><?php echo $row['CREATED_AT']; ?></td>
							<td><?php echo $row['MODIFIED_AT']; ?></td>
							<td><?php 
										if($row['ORDER_DETAILS_STATUS']==1)
											echo "Completed"; 
										else 
											if($row['ORDER_DETAILS_STATUS']==0)
											echo "Incomplete";
									?></td>

						<td><button type="button" order_details_id='<?php echo $row["ORDER_DETAILS_ID"] ?>' class="btn btn-warning btn-xs update">Update</button></td></td>
							</tr>
							<?php $count++;
					}?>

					</form>
				</table>
				<div class="product-total">	Total : <?php echo $count; ?> ORDERS</div>	
			</div>
		</div>		
			
	</main>	
	<?php include '../Header&Footer/footer.php'; ?>
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
<script>
	function myFunction() {

	  // Declare variables 
	  var input = document.getElementById("myInput");
	  var filter = input.value.toUpperCase();
	  var table = document.getElementById("myTable");
	  var trs = table.tBodies[0].getElementsByTagName("tr");

	  // Loop through first tbody's rows
	  for (var i = 1; i < trs.length; i++) {

	    // define the row's cells
	    var tds = trs[i].getElementsByTagName("td");

	    // hide the row
	    trs[i].style.display = "none";

	    // loop through row cells
	    for (var i2 = 0; i2 < tds.length; i2++) {

	      // if there's a match
	      if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {

	        // show the row
	        trs[i].style.display = "";

	        // skip to the next row
	        continue;

	      }
	    }
	  }
	}
</script>	
</body>
</html>

<div id="orDetailsModal" class="modal fade">
	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<form method="POST">
	          	<div class="modal-header">
	            	<h2 class="modal-title">UPDATE ORDER STATUS</h2>
	          	</div>
          		<div class="modal-body">
	              	<div class="container">
	                  <label>ID</label>
	                    <input type="text" name="ORDER_DETAILS_ID" id="ORDER_DETAILS_ID" class="form-control" disabled>
	                  <br/>
	                  <label>Order ID</label>
	                  	<input type="text" name="ORDERS_ID" id="ORDERS_ID" class="form-control" disabled>
	                  <br>
	                  <label>Product ID</label>
	                    <input type="text" name="PRODUCT_ID" id="PRODUCT_ID" class="form-control" disabled>
	                  <br/>
	                  <label>Quantity</label>
	                    <input type="text" name="QUANTITY" id="QUANTITY" class="form-control" disabled>
	                  <br/>
	                  <label>Status</label>
	                    <!--<input type="text" name="ORDER_DETAILS_STATUS" id="ORDER_DETAILS_STATUS" class="form-control">-->
	                    <select class="form-control" name="ORDER_DETAILS_STATUS" id="ORDER_DETAILS_STATUS">
	                    	<option value="1">Completed</option>
	                    	<option value="0">Incomplete</option>
                    	</select>
	                  <br/>
	             	</div>   
          		</div>

	          	<div class="modal-footer">
	            	<button id="saveChanges" class="btn btn-success" value="Update">Save Changes</button>
	            	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	         	</div>
        	</form>
    	</div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).on('click', '.update', function(){

		var ORDER_DETAILS_ID = $(this).attr("order_details_id");
		
		//This code will fetch any admin id from attribute id with help of attr() JQuery method
		var open = 1;   //We have define action variable value is equal to select
		$.ajax(
		{
			url:"action.php",   //Request send to "action.php page"
			method:"POST",    //Using of Post method for send data
			data:{ORDER_DETAILS_ID:ORDER_DETAILS_ID, open:open},//Send data to server 

			dataType:"json",   //Here we have define json data type, so server will send data in json format.
			success:function(data)
			{
				$('#orDetailsModal').modal('show');   //It will display modal on webpage

				//$('#type').val(data.admin_type_name);  //It will assign value to modal first name texbox
				//$('#staff_code').val(data.PRODUCT_NAME); //It will assign value of modal last name textbox

				$('#ORDER_DETAILS_ID').val(data.ORDER_DETAILS_ID);
				$('#QUANTITY').val(data.QUANTITY);
				$('#ORDER_DETAILS_STATUS').val(data.ORDER_DETAILS_STATUS);
				$('#PRODUCT_ID').val(data.PRODUCT_ID);
				$('#ORDERS_ID').val(data.ORDERS_ID);
				
				//alert(data.ORDER_DETAILS_ID);
			}
		});
	});
	$(document).on('click', '#saveChanges', function(){
		var ORDER_DETAILS_ID = $('#ORDER_DETAILS_ID').val();
		var QUANTITY = $('#QUANTITY').val();
		var ORDER_DETAILS_STATUS = $('#ORDER_DETAILS_STATUS').val();
		var PRODUCT_ID = $('#PRODUCT_ID').val();
		var ORDERS_ID = $('#ORDERS_ID').val();
		var status2 = "update2";
		$.ajax(
		{
			url:"action.php",   //Request send to "action.php page"
			method:"POST",    //Using of Post method for send data
			data:{ORDER_DETAILS_ID:ORDER_DETAILS_ID,
			      QUANTITY:QUANTITY,
			      ORDER_DETAILS_STATUS:ORDER_DETAILS_STATUS,
			      PRODUCT_ID:PRODUCT_ID,
			      ORDERS_ID:ORDERS_ID,
			      status2:status2},//Send data to server 


			dataType:"json",   //Here we have define json data type, so server will send data in json format.
			success:function()
			{
				alert("omaigosh fish");
				$('#orDetailsModal').modal('close');   //It will display modal on webpage

				//$('#type').val(data.admin_type_name);  //It will assign value to modal first name texbox
				//$('#staff_code').val(data.PRODUCT_NAME); //It will assign value of modal last name textbox

				//$('#PRODUCT_ID').val(data.PRODUCT_ID);
				

				//alert(data.PRODUCT_ID);
			}
		});

		/*var PRODUCT_ID = $(this).attr("admin_id");

		//This code will fetch any admin id from attribute id with help of attr() JQuery method
		var open = 1;   //We have define action variable value is equal to select
		$.ajax(
		{
			url:"action.php",   //Request send to "action.php page"
			method:"POST",    //Using of Post method for send data
			data:{PRODUCT_ID:PRODUCT_ID},//Send data to server 


			dataType:"json",   //Here we have define json data type, so server will send data in json format.
			success:function(data)
			{
				$('#customerModal').modal('show');   //It will display modal on webpage

				//$('#type').val(data.admin_type_name);  //It will assign value to modal first name texbox
				//$('#staff_code').val(data.PRODUCT_NAME); //It will assign value of modal last name textbox

				//$('#PRODUCT_ID').val(data.PRODUCT_ID);
				$('#PRODUCT_NAME').val(data.PRODUCT_NAME);
				$('#SUPPLIER_NAME').val(data.SUPPLIER_NAME);
				$('#PRODUCT_TYPE_NAME').val(data.PRODUCT_TYPE_NAME);
				$('#PRODUCT_PRICE').val(data.PRODUCT_PRICE);
				$('#PRODUCT_DISCOUNT').val(data.PRODUCT_DISCOUNT);
				$('#PRODUCT_DESC').val(data.PRODUCT_DESC);

				//alert(data.PRODUCT_ID);
			}
		});*/
	});
</script>