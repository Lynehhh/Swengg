<!DOCTYPE html>
<html lang="en">
    <?php session_start(); 
        require_once("connection.php");
    ?>
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GOGO Biyahe</title>
  
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">

  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .mb-20 {
            margin-bottom: 20px;
        }
        .starrr{
            color: #f8d90f;
        }
        .fa-star{
            color: #f8d90f;
        }
    </style>
    
    <script>
        function set_todate(date) {
            document.getElementById("reserve_edate").disabled = false;
            document.getElementById("reserve_edate").setAttribute("min", date);
            document.getElementById("reserve_edate").setAttribute("value", date);
        }

        function show_price(sdate, edate, price){
            if(sdate > edate){
                alert("Invalid dates. Please try again.");
            }
            else{
                var date1 = new Date(sdate);
                var date2 = new Date(edate);
                var label = 'days';
                var days = Math.floor((date2 - date1) / (1000*60*60*24) + 1);

                if(days == 1){
                    label = 'day';
                }
                var totalprice = price * days;
                document.getElementById("price_area").innerHTML = "<table><tr><td>₱"+price+" x "+days+" "+label+"</td><td>₱"+totalprice+"</td></tr><tr><td><b>Total</b></td><td><b>₱"+totalprice+"</b></td></tr></table>";
            }
        }
    </script>

</head>

<body class="body-wrapper">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
    <div class="container">
        <div class="justify-content-center mb-20">
            <?php
                if(isset($_GET['searched_car'])){
                    $_SESSION['searched_car'] = $_GET['searched_car'];
                }
                
                $sql1="select location from car_images where carID=".$_SESSION['searched_car'];
            
                $result = $con->query($sql1);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<img src='".$row["location"]."' style='width:128px;height:128px;'>";
                    }
                } 
                else {
                    echo "NO PHOTOS AVAILABLE";
                } 
                $sql2="select oemail, name, price, brand, fuel_type, seater, description, ofirst_name from view_catalogue where carID=".$_SESSION['searched_car'];
                $result = $con->query($sql2);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
            ?>
        </div>
        
        <div class="row">
            <div class="col-md-4 offset-md-1 col-lg-7 offset-lg-0">
                <div class="product-details mb-20">
                    <h1 class="product-title"><?php echo $row['name']; ?></h1>
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?php echo $row['ofirst_name']; ?></a></li>
                            
                            <!-- ALY INSERT CATEGORY AND LOCATION HERE -->
                            <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href=""><?php   ?></a></li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href=""><?php   ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="content">
						<ul class="nav nav-pills justify-content-center" style="margin-bottom: 20px;" id="pills-tab" role="tablist" >
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active mb-20" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p><?php echo $row['description'] ?></p>
							</div>
							<div class="tab-pane fade mb-20" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
								  <tbody>
								    <tr>
								      <td>Brand</td>
								      <td><?php echo $row['brand']; ?></td>
								    </tr>
								    <tr>
                                        <!-- ALY INSERT CATEGORY HERE -->
								      <td>Car Type</td>
								      <td><?php  ?></td>
								    </tr>
								    <tr>
								      <td>Fuel Type</td>
								      <td><?php echo $row['fuel_type']; ?></td>
								    </tr>
								    <tr>
								      <td>Name</td>
								      <td><?php echo $row['name']; ?></td>
								    </tr>
								    <tr>
								      <td>Capacity</td>
								      <td><?php echo $row['seater']; ?></td>
								    </tr>
								  </tbody>
								</table>
							</div>
                            
                            <?php $_SESSION['owner_email'] = $row['oemail'];
                                    $_SESSION['price'] = $row['price'];
                                    }
                                }
                            ?>
                            
							<div class="tab-pane fade mb-20" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
							  		<div class="media">
							  			<!-- Avatar -->
							  			<img src="images/user/user-thumb.jpg" alt="avater">
							  			<div class="media-body">
							  				<!-- Ratings -->
							  				<div class="ratings">
							  					<ul class="list-inline">
							  						<li class="list-inline-item">
							  							<i class="fa fa-star"></i>
							  						</li>
							  						<li class="list-inline-item">
							  							<i class="fa fa-star"></i>
							  						</li>
							  						<li class="list-inline-item">
							  							<i class="fa fa-star"></i>
							  						</li>
							  						<li class="list-inline-item">
							  							<i class="fa fa-star"></i>
							  						</li>
							  						<li class="list-inline-item">
							  							<i class="fa fa-star"></i>
							  						</li>
							  					</ul>
							  				</div>
							  				<div class="name">
							  					<h5>Pepito the Cockroach</h5>
							  				</div>
							  				<div class="date">
							  					<p>Mar 20, 2018</p>
							  				</div>
							  				<div class="review-comment">
							  					<p>
							  						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape riamipsa eaque.
							  					</p>
							  				</div>
							  			</div>
							  		</div>
							  		<div class="review-submission">
							  			<h3 class="tab-title">Submit your review</h3>
						  				<!-- Rate -->
						  				<div class="rate">
						  					<div class="starrr"></div>
						  				</div>
						  				<div class="review-submit">
						  					<form action="#" class="row">
						  						<div class="col-lg-6">
						  							<input type="text" name="name" id="name" class="form-control" placeholder="Name">
						  						</div>
						  						<div class="col-lg-6">
						  							<input type="email" name="email" id="email" class="form-control" placeholder="Email">
						  						</div>
						  						<div class="col-12">
						  							<textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
						  						</div>
						  						<div class="col-12">
						  							<button type="submit" class="btn btn-main" style="float: right;">Sumbit</button>
						  						</div>
						  					</form>
						  				</div>
							  		</div>
							  	</div>
							</div>
						</div>
					</div>
            </div>
            <div class="col-md-4 offset-md-1 col-lg-5 offset-lg-0">
                <div class="widget">
                    <?php 
                        if(empty($_SESSION['email']) || ($_SESSION['email'] <> $_SESSION['owner_email'])){
                    ?>
                    <h1><span><?php echo $_SESSION['price'] ?></span> / day</h1>
                    <h3 class="widget-header user mb-20">
                        <span class="ratings">
                                <li class="list-inline-item">
                                    <i class="fa fa-star"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-star"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-star"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-star"></i>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-star"></i>
                                </li>						  				
                        </span>  (150 reviews)
                    </h3>
                    <form id="reserve_form" method="get">
                        <!--<h3 class="widget-header user">Renting Information</h3>-->
                        <div class="row mb-20">
                            <!-- Date -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">From</label>
                                <input method="get" type="date" class="form-control" id="reserve_sdate" name="start_date" onchange="set_todate(this.value)">
                            </div>
                            <!-- Date -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">To</label>
                                <input method="get" type="date" class="form-control" id="reserve_edate" name="end_date" step="0.01">
                            </div>
                        </div>

                        <!-- Guests 
                        <div class="form-group">
                            <label for="comunity-name">Guests</label>
                            <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" style="border-color: #ced4da;">
                                <option disabled="disabled" selected="selected">Select Number<i class="fa fa-angle-down"></i></option>
                                <option value="1">1-3</option>
                                <option value="2">4-6</option>
                                <option value="3">7-10</option>
                                <option value="4">More than 10</option>
                            </select>
                        </div> -->
                    
                        <label for="comunity-name">Charges</label>
                        <input method="get" type="button" value="Show Price" onclick="<?php show_price(reserve_sdate.value, reserve_edate.value, '.$_SESSION["price"].') ?>" />
                        <div id="price_area">
                        </div>
                        <!--
                            <font size="3">
                                <table class="table table-responsive product-dashboard-table mb-20">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>P 1,500.00</span>
                                                <span> x </span>
                                                <span>1 day</span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>P 1,500.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Service Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>0.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Initial Gas Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>0.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Additional Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>0.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <span><strong>Total: </strong></span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span><strong>P 1,500.00 </strong></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </font> -->

                        <!-- Submit button -->
                        <button name="reserve" form="reserve_form" onclick="show_ask()" class="btn btn-transparent" style="width: 100%;">Submit Reservation</button>
                    </form>
                    
                    <?php
                                                }
                        if (isset($_GET['reserve'])){
                                $_SESSION['start_date'] = $_GET['start_date'];
                                $_SESSION['end_date'] = $_GET['end_date'];
                                if($_SESSION['start_date'] > $_SESSION['end_date']){
                                    header('location:viewcar.php?Invalid=Invalid dates please try again');
                                }
                            else{
                                // PALITAN SESSION NAME
                                if(empty($_SESSION['email'])){
                                    // SA LOGIN PAGE 
                                    header('location:login.php');
                                }
                                else{
                                    $sql = "INSERT INTO reservation_requests (req_date, date_use, date_return, renter_email, owner_email, carID, ref_req_status) VALUES (now(), '".$_SESSION['start_date']."', '".$_SESSION['end_date']."', '".$_SESSION['email']."', '".$_SESSION['owner_email']."', ".$_SESSION['searched_car'].", 'Pending')";

                                    $result = $con->query($sql);

                                    if($result === true){

                                    }
                                    else{
                                        header('location:viewcar.php?Invalid=Error occured please try again');
                                    }
                                }
                            }  
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    

  <!-- JAVASCRIPTS -->
    <script>
        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear()
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("reserve_sdate").setAttribute("min", today);
    </script>
    
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="plugins/tether/js/tether.min.js"></script>
  <script src="plugins/raty/jquery.raty-fa.js"></script>
  <script src="plugins/bootstrap/dist/js/popper.min.js"></script>
  <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
  <script src="plugins/slick-carousel/slick/slick.min.js"></script>
  <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
  <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script src="js/scripts.js"></script>

</body>

</html>
