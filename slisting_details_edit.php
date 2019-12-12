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
        <form class="row" method = "post">

            <div class="col-md-4 offset-md-1 col-lg-7 offset-lg-0 mt-30">
                <div class="content">
						<div class="justify-content-center mb-20 ">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%; height: 100%;">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#myCarousel" data-slide-to="1"></li>
                                  <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper/ Images for slides -->
                                <div class="carousel-inner ">
                                    <div class="item active">
                                        <?php echo "<img src='".$row["location"]."' style='width:auto;height: 100%;'>"; ?>
                                    </div>
                                    <?php
                                        if(isset($_GET['searched_car'])){
                                            $_SESSION['searched_car'] = $_GET['searched_car'];
                                        }
                                            $sql1="select location from car_images where carID=".$_SESSION['carID'];
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
                    <!-- Upload Vehicle Images 
                    <label for="comunity-name">Upload Vehicle Images</label>
                        <div class="form-group choose-file mb-20">
                            <input type="file" name="files[]" class="form-control-file d-inline" multiple>
                         </div>
                    <label for="comunity-name">Upload Documents</label>
                    <div class="form-group choose-file mb-20">
                            <input type="file" name="docs[]" class="form-control-file d-inline" multiple>
                         </div> -->
                    </div>
                
                
            </div>

            <div class="col-md-4 offset-md-1 col-lg-5 offset-lg-0">
                <div class="widget">
                    <div class="form-group">
                        <label for="comunity-name">Name</label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>"
                        placeholder = "<?php echo $name?>
                        " name="carname"/>
                    </div>
                    <!--CAR DETAILS-->
                    <div class="row mb-20">
                            <!-- Brand -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Brand</label>
                                <input type="text" class="form-control" name="brand" placeholder ="<?php echo $brand?>" value="<?php echo $brand ?>"/>
                            </div>
                            <!-- Car Type -->
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
                    </div>
                    <div class="row mb-20">
                            <!-- Fuel Type -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <?php
                                    $selectFuelType = "SELECT type FROM ref_fuel_type"; 
                                    $result2 = $con->query($selectFuelType);
                                ?>
                                <label for="comunity-name">Fuel Type</label>
                                <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" name = "fuel_type">
                                    <option disabled="disabled" selected="selected">Select Fuel Type</option>
                                    <?php while($row = $result2->fetch_assoc()) { ?>
                                    <option> <?php echo $row['type'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Seater -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Seater</label>
                                <input type="number" class="form-control" name="seater" min="0" placeholder ="<?php echo $seater?>" >
                            </div>                        
                    </div>
                    <div class="row mb-20">
                            <!-- Price -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">Price</label>
                                <input type="number" class="form-control" step='0.05' min="0" value="<?php echo $_SESSION['price'] ?>" placeholder ="<?php echo $price?>"/>
                            </div>
                            <!-- Availability -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <?php
                                    $selectAvailability = "SELECT status FROM ref_car_status"; 
                                    $result3 = $con->query($selectAvailability);
                                ?>
                                <label for="comunity-name">Availability</label>
                                <select class="nice-select w-100 form-control mb-2 mr-sm-2 mb-sm-0" name = "availability">
                                    <option selected="selected" disabled="disabled">Select Car Status</option>
                                    <?php while($row = $result3->fetch_assoc()) { ?>
                                    <option> <?php echo $row['status'];?> </option>
                                    <?php } ?>
                                </select>
                            </div>                        
                    </div>
                    <!-- Decription -->
                    <div class="form-group">
                        <label for="comunity-name">Description</label>
                        <textarea type="text" name="description" placeholder = "<?php echo $description ?>" class="form-control" value="<?php echo $description ?>" ><?php echo $description ?></textarea>
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


                    <!-- Buttons -->
                    
                    <!-- This is what you did na
                    <input type = "submit" name="update" value="Update" formaction = "processedit.php" class="btn btn-transparent" style="margin-left: 40%;">
                    -->
                    
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                            <button class="btn btn-success" style="width: 100%;" name = "update" formaction = "processedit.php" >Submit</button>
                        </div>
                        <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                            <button class="btn btn-danger" style="width: 100%;" name = "delete" formaction = "processdelete.php">Delete</button>
                        </div>
                        <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                            <button class="btn btn-primary" style="width: 100%;" formaction = "slisting_details.php" >Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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