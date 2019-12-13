<!DOCTYPE html>
<?php session_start(); 
require_once("connection.php");
?>
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

</head>

<body class="body-wrapper">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
    <?php
            if(isset($_POST['Pay'])){
            $rentID =$_POST['Pay'];
            $_SESSION['rentID'] = $rentID; 
            }
            
            $query = "  SELECT re.total_amount, re.due_date, re.date_use, re.date_return, r.reqID,  c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.description  
                        FROM rentals re JOIN reservation_requests r ON re.reqID = r.reqID JOIN catalogue c ON c.carID = r.carID
                        WHERE re.rentID ='". $_SESSION['rentID']."'
                        GROUP BY c.carID";
            $result =  $con->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $carID =  $row['carID'];
                    $due_date = $row['due_date'];
                    $date_use = $row['date_use'];
                    $date_return = $row['date_return'];
                    $total_amount = $row['total_amount'];
                    $name = $row['name'];
                    $brand = $row['brand'];
                    $car_type = $row['car_type'];
                    $fuel_type = $row['fuel_type'];
                    $seater = $row['seater'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $reqID = $row['reqID'];
                    $_SESSION['due_date'] = $due_date; 
                    $_SESSION['date_use'] = $date_use; 
                    $_SESSION['date_return'] = $date_return; 
                    $_SESSION['total_amount'] = $total_amount; 
                    $_SESSION['name'] = $name; 
                    $_SESSION['brand'] = $brand; 
                    $_SESSION['car_type'] = $car_type; 
                    $_SESSION['fuel_type'] = $fuel_type; 
                    $_SESSION['seater'] = $seater; 
                    $_SESSION['price'] = $price; 
                    $_SESSION['description'] = $description; 
                    $_SESSION['carID'] = $carID; 
                }

                echo $carID;
        }
    ?>
    <div class="container mt-30">
        <div class="d-flex justify-content-center mb-20">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:50%; height: auto;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper/ Images for slides -->
                <!-- PLEASE RECHECK KUNG TAMA START-->
                <div class="carousel-inner ">;
                <?php
                $imageQuery="SELECT * from car_images ci 
                WHERE ci.carID = ". $carID;
                $result1 =  $con->query($imageQuery);
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {
                $ctr = 0;
                 $sql1="select location from car_images where carID=".$carID;
                            $result3 = $con->query($sql1);
                            if ($result3->num_rows > 0) { 
                            while($row = $result3->fetch_assoc()){
                                $ctr = $ctr + 1;
                                if($ctr == 1){ ?>
                                    <div class="item active">
                                    <?php echo "<img src='".$row["location"]."' style='width:100%;height:100%;'>"?>
                    </div>;
                    <?php
                                }
                                else{
                                    echo "<div class='item'>
                                    <img src='".$row["location"]."' style='width:100%;height:100%;'>
                                    </div>";
                      
                                }
                            }
                                
                           
                            } 
                            else {
                                echo "NO PHOTOS AVAILABLE";
                            }
                    }
            }
                  ?>
                    <!-- PLEASE RECHECK KUNG TAMA END-->
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
						<ul class="nav nav-pills justify-content-center" style="margin-bottom: 20px;" id="pills-tab" role="tablist" >
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</a>
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
						</div>
					</div>
            </div>
    
            <div class="col-md-4 offset-md-1 col-lg-5 offset-lg-0">
                <div class="widget">
                    <form action="processpayment.php" method="post">
                        <h3 class="widget-header user">Payment Details</h3>
                        <div class="row mb-20">
                                <!-- Date -->
                                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                    <label for="comunity-name">From</label>
                                    <input type="date" class="form-control" name="start_date" value = "<?php echo $date_use?>" readonly/>
                                </div>
                                <!-- Date -->
                                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                    <label for="comunity-name">To</label>
                                    <input type="date" class="form-control" name="end_date" value="<?php echo $date_return?>" readonly />
                                </div>

                        </div>

                        <label for="comunity-name">Payments</label>
                            <font size="3">
                                <table class="table table-responsive product-dashboard-table mb-20">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>Payment Due Date:</span>
                                            </td>
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            <td>
                                                <span><?php echo $due_date ?></span>
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
                                                <span><strong><?php echo $total_amount ?> </strong></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </font>
                        <!-- Card Deets -->
                        <div class="row mb-20">
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Select Card Type</label>
                                <select name = "cardtype" class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" style="border-color: #ced4da;">
                                    <option disabled="disabled" selected="selected">Select Number<i class="fa fa-angle-down"></i></option>
                                    <option value="creditcard">Credit Card</option>
                                    <option value="deditcard">Debit Card</option>
                                </select>
                            </div> 
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Expiry Date</label>
                                <input name = "expiry" type = "month" value="2019-01" class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" style="border-color: #ced4da;">
                            </div> 
                        </div>
                        
                        <div class="mb-20">
                            <div class="form-group">
                                <label for="comunity-name">Card Number</label>
                                <input name = "cardnumber" type = "number" class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" style="border-color: #ced4da;">
                            </div>  
                            <div class="form-group">
                                <label for="comunity-name">Card Holder</label>
                                <input name = "cardholder" type = "text" class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" style="border-color: #ced4da;">
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <!-- Submit button -->
                                <button type = "submit" name = "submit" class="btn btn-transparent" style="width: 100%;">Pay Now</button>
                            </div>
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <!-- Back button -->
                                <button type = "submit" name = "submit" class="btn btn-transparent" style="width: 100%;">Back</button>
                            </div>
                        </div>
                     </form> 
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