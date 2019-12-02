<!DOCTYPE html>
<html lang="en">
    <?php 
        require_once('connection.php');
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .mb-20 {
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="body-wrapper">


<?php include 'topbar.php' ?>
<?php 
$carID =  $_SESSION['carID']; 
$name=  $_SESSION['name'];
$brand =  $_SESSION['brand'];
$car_type =  $_SESSION['car_type'];
$fuel_type =  $_SESSION['fuel_type'];
$seater =  $_SESSION['seater']; 
$price =  $_SESSION['price'];
$availability =  $_SESSION['availability']; 
$description  =  $_SESSION['description']; 
    ?>

<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                    <div class="widget user-dashboard-menu">
                        <h3 class="widget-header user mb-20">Vehicle Photos</h3>
                        <label for="comunity-name">Upload Images</label>

                        <!-- Carousel -->
                        <div class=" mb-20">
                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper/ Images for slides -->
                            <div class="carousel-inner">
                            <?php 
                                $ctr = 0;
                                $query= "SELECT location FROM car_images WHERE carID =" .$carID;
                        $result =  $con->query($query);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $ctr = $ctr + 1;
                        if($ctr == 1){
                            echo '<div class="item active">
                                <img src="'.$row['location'].'" alt="Photo '.$ctr.'" style="width:100%; height: 300px;">
                              </div>';
                        }
                        else{
                            echo '<div class="item">
                                <img src="'.$row['location'].'" alt="Photo '.$ctr.'" style="width:100%; height: 300px;">
                              </div>';
                        }
                    
            }
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
                        
                        <!-- Upload Image -->
                        <div class="form-group choose-file mb-20">
                            <input type="file" name="files[]" class="form-control-file d-inline" multiple>
                         </div>
                    </div>

                    <div class="widget user-dashboard-menu">
                        <!-- Documents -->
                        <h3 class="widget-header user mb-20">Vehicle Documents</h3>
                        <label for="comunity-name">Upload Documents</label>
                        <div class="form-group choose-file mb-20">
                            <input type="file" name="docs[]" class="form-control-file d-inline" multiple>
                         </div>
                    </div>
                </div>


                <div class="col-md-20 offset-md-1 col-lg-6 offset-lg-0">
                    <!-- Input Vehicle Info -->
                    <div class="widget personal-info">
                        <h3 class="widget-header user">Vehicle Information</h3>
                        <!-- Name -->
                        <div class="form-group">
                            <label for="first-name">Name</label>
                            <input type="text" class="form-control" name="carname" placeholder = "<?php echo $name?>">
                        </div>

                        <!-- Brand -->
                        <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                            <label for="last-name">Brand</label>
                            <input type="text" class="form-control" name="brand" placeholder ="<?php echo $brand?>">
                        </div>                       

                        <div class="row mb-20">
                            <!-- Category -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <?php
                                    $selectCarType = "SELECT type FROM ref_car_type"; 
                                    $result = $con->query($selectCarType);
                                ?>
                                <label for="comunity-name">Car Type</label>
                                <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" name= "car_type"style="border-color: #ced4da;">
                                    <option disabled="disabled" selected="selected">Select Car Type<i class="fa fa-angle-down"></i></option>
                                    <?php while($row = $result->fetch_assoc()) { ?>
                                    <option> <?php echo $row['type'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Fuel Type -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <?php
                                    $selectFuelType = "SELECT type FROM ref_fuel_type"; 
                                    $result2 = $con->query($selectFuelType);
                                ?>
                                <label for="comunity-name">Fuel Type</label>
                                <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" name= "fuel_type" style="border-color: #ced4da;">
                                    <option disabled="disabled" selected="selected">Select Fuel Type</option>
                                    <?php while($row = $result2->fetch_assoc()) { ?>
                                    <option> <?php echo $row['type'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                             <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <?php
                                    $selectAvailability = "SELECT status FROM ref_car_status"; 
                                    $result3 = $con->query($selectAvailability);
                                ?>
                                <label for="comunity-name">Availability</label>
                                <select name =  "availability" class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" style="border-color: #ced4da;">
                                    <option disabled="disabled" selected="selected">Select Car Status</option>
                                    <?php while($row = $result3->fetch_assoc()) { ?>
                                    <option> <?php echo $row['status'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-20">
                            <!-- Seater -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Seater</label>
                                <input type="number" class="form-control" name="seater" min="0" placeholder ="<?php echo $seater?>" >
                            </div>
                            <!-- Price -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Price</label>
                                <input type="number" class="form-control" name="price" step="0.01" min="0" placeholder ="<?php echo $price?>">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="comunity-name">Description</label>
                            <textarea type="text" class="form-control" name="description" placeholder = "<?php echo $description ?>" style="height: 150px;"></textarea>
                        </div> 

                        <!-- Submit button -->
                        <input type = "submit" name="update" value="Update" formaction = "processedit.php" class="btn btn-transparent" style="margin-left: 40%;">
                    </div>
                </div>
            </div>
        </form>
	</div>
</section>

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
