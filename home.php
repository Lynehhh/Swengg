<!DOCTYPE html>
<html lang="en">
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>

    </style>
    

</head>

<body class="body-wrapper">

<?php include 'topbar.php' ?>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Rent a Vehicle Today! </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Categories</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> SUV</a></li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Sedan</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Pickup</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Minivan</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Campervan</a>
							</li>
						</ul>
					</div>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
                    <!-- PHP FOR FORM -->
					<form action="#">
                        <div style="margin-top: 25px;"> <!-- For magin spacing-->
                            <div class="row" style="margin-top: 25px;">
                                <!-- PHP FOR BRAND SEARCHING -->
                                <div class="col-lg-12 col-md-12">                                
                                    <div class="block d-flex">
                                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Search for Brand">
                                    </div>
                                </div>
                                <!-- END OF PHP FOR BRAND SEARCHING -->  
                            </div>

                            <div class="row" style="margin-top: 15px;">
                                <!-- PHP FOR SEAT SEARCHING -->
                                <div class="col-lg-4 col-md-12">
                                    <section class="block d-flex">
                                        <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0">
                                            <option disabled="disabled" selected="selected">Select Seater<i class="fa fa-angle-down"></i></option>
                                            <option value="1">4</option>
                                            <option value="2">6</option>
                                            <option value="3">8</option>
                                            <option value="4">12</option>
                                            <option value="5">14+</option>
                                        </select>									
                                    </section>
                                </div>
                                <!-- END OF PHP FOR SEAT SEARCHING -->
                                
                                <!-- PHP FOR CATEGORY SEARCHING -->
                                <div class="col-lg-4 col-md-12">
                                    <section class="block d-flex">
                                        <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0">
                                            <option disabled="disabled" selected="selected">Select Category<i class="fa fa-angle-down"></i></option>
                                            <option value="1">SUV</option>
                                            <option value="2">Sedan</option>
                                            <option value="3">Pickup</option>
                                            <option value="4">Minivan</option>
                                            <option value="5">Campervan</option>
                                        </select>									
                                    </section>
                                </div>
                                <!-- END OF PHP FOR CATEGORY SEARCHING -->
                                
                                <!-- PHP FOR FUEL SEARCHING -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="block d-flex">
                                        <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" >
                                            <option disabled="disabled" selected="selected">Select Fuel Type</option>
                                            <option value="1">Gasoline</option>
                                            <option value="2">Diesel</option>
                                            <option value="3">Liquefied Petroleum</option>
                                            <option value="4">Compressed Natural Gas</option>
                                            <option value="5">Ethanol</option>
                                            <option value="6">Bio-diesel</option>
                                        </select>	
                                    </div>
                                </div>
                                <!-- END OF PHP FOR FUEL SEARCHING -->
                            </div>
                        </div>
                        
                        <!-- PHP FOR SEARCH BUTTON -->
                        <div class="d-flex" style="display: inline-flex; ">
                            <div class="col-lg-10 col-md-12" style="margin-top: 30px; display: flex; float: right;">
                                    
                                </div>
                                <div class="col-lg-6 col-md-12" style="margin-top: 30px;">
                                    <div class="block d-flex">									
                                        <!-- Search Button -->
                                        <button class="btn btn-main">SEARCH</button>
                                    </div>
                                </div>
                            </div>
						<!-- END OF PHP FOR SEARCH BUTTON -->
					</form>
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->

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



