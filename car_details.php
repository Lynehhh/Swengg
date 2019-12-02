<!DOCTYPE html>
<?php session_start(); 
require_once("connection.php");
?>
<html lang="en">
<head>
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
        .mt-30{
            margin-top: 30px;
        }
    </style>

</head>

<body class="body-wrapper">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
    <div class="container mt-30" style="display: block;">
        <div class="justify-content-center mb-20 ">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:70%; height: auto; left: 15%;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper/ Images for slides -->
                <div class="carousel-inner ">
                    <div class="item active">
                        <?php echo "<img src='".$row["location"]."' style='width:auto;height:250px;'>"; ?>
                    </div>
                    <?php
                        if(isset($_GET['searched_car'])){
                            $_SESSION['searched_car'] = $_GET['searched_car'];
                        }
                            $sql1="select location from car_images where carID=".$_SESSION['searched_car'];
                            $result = $con->query($sql1);
                            if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                        ?>
                      <div class="item">
                          <?php 
                                    echo "<img src='".$row["location"]."' style='width:100%;height:250px;'>";
                                ?>
                      </div>
                        <?php
                                    }
                            } 
                            else {
                                echo "NO PHOTOS AVAILABLE";
                            }
                      ?>
                  
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        
        <?php
         $sql2="select oemail, name, price, brand, car_type, fuel_type, seater, description, ofirst_name from view_catalogue where carID=".$_SESSION['searched_car'];
          $result = $con->query($sql2);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        $carname = $row['name'];
                        $owner = $row['ofirst_name'];
                        $cartype = $row['car_type'];
                        $brand = $row['brand'];
                        $fueltype = $row['fuel_type'];
                        $seats = $row['seater'];
                        $description = $row['description'];
                        $_SESSION['owner_email'] = $row['oemail'];
                        $_SESSION['price'] = $row['price'];
                    }
                }
        ?>
        <div class="row">
            <div class="col-md-4 offset-md-1 col-lg-7 offset-lg-0">
                <div class="product-details mb-20">
                    <h1 class="product-title"><?php echo $carname; ?></h1>
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-o"></i> By <?php echo $owner ?></li>
                            <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Car Type <?php echo $cartype ?></li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="">Manila</a></li>
                        </ul>
                    </div>
                </div>
                <div class="content">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
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
								<p><?php echo $description ?></p>
							</div>
							<div class="tab-pane fade mb-20" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
								  <tbody>
								    <tr>
								      <td>Brand</td>
								      <td><?php echo $brand ?></td>
								    </tr>
								    <tr>
								      <td>Car Type</td>
								      <td><?php echo $cartype ?></td>
								    </tr>
								    <tr>
								      <td>Fuel Type</td>
								      <td><?php echo $fueltype ?></td>
								    </tr>
								    <tr>
								      <td>Name</td>
								      <td><?php echo $carname ?></td>
								    </tr>
								    <tr>
								      <td>Seater</td>
								      <td><?php echo $seats?></td>
								    </tr>
                                    <tr>
								      <td>Rental Price</td>
								      <td><?php echo $_SESSION['price'] ?></td>
								    </tr>
								  </tbody>
								</table>
							</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
							  		<div class="media">
							  			<!-- Avater -->
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
							  					<h5>Jessica Brown</h5>
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
						  							<button type="submit" class="btn btn-main" style="float: right;">Submit</button>
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
                    <h1 class="mb-20"><span>P 1,500.00</span> / day</h1>
                    <!--<h3 class="widget-header user">Renting Information</h3>-->
                    <div class="row mb-20">
                        <form id="reserve_form" method="get">
                            <!-- Date -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">From</label>
                                <input type="date" class="form-control" method="get" id="reserve_sdate" name="start_date" placeholder="From" min="" onchange="set_todate(this.value)"/>
                            </div>
                            <!-- Date -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">To</label>
                                <input type="date" class="form-control" method="get" id="reserve_edate" name="end_date" placeholder="To" min="" value="" disabled />
                            </div>
                        </form>                        
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
                                                <span>P 0.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Initial Gas Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>P 0.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Additional Fees: </span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span>P 0.00</span>
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
                            </font>

                    <!-- Submit button -->
                    <button class="btn btn-transparent" style="width: 100%;">Submit Reservation</button>
                </div>
            </div>
        </div>
    </div>
    

  <!-- JAVASCRIPTS -->
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
