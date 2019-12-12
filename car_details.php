<?php 
    session_start();
    require_once("connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
            function set_todate(date) {
               
               if (document.getElementById("reserve_edate").disabled == true){
                   document.getElementById("reserve_edate").disabled = false;
               }
                document.getElementById("reserve_edate").setAttribute("min", date);
                document.getElementById("reserve_edate").setAttribute("value", date);
                
                 document.getElementById("reserve_btn").disabled = false;
                
                var edate = document.getElementById("reserve_edate").value;
                
                if(date > edate){
                    document.getElementById("view_pricebreakdown").innerHTML = '';
                    document.getElementById("reserve_btn").disabled = true;
                    
                    alert("Invalid dates. Try again.");
                    
                }
                else{
                    document.getElementById("reserve_btn").disabled = false;
                    
                    if(window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                    }
                    else{
                        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                    }
                    xmlhttp.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200){
                            document.getElementById("view_pricebreakdown").innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("GET","car_details_price.php?sdate="+date+"&edate="+edate, true);
                    xmlhttp.send();
                    
                }
            }
                
                function set_fromdate(date) {
               
                var sdate = document.getElementById("reserve_sdate").value;
                
                if(document.getElementById("reserve_sdate") > document.getElementById("reserve_edate")){
                    document.getElementById("view_pricebreakdown").innerHTML = '';
                    document.getElementById("reserve_btn").disabled = true;
                    
                    alert("Invalid dates. Try again.");
                }
                else{
                    document.getElementById("reserve_btn").disabled = false;
                    
                    if(window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                    }
                    else{
                        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                    }
                    xmlhttp.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200){
                            document.getElementById("view_pricebreakdown").innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("GET","car_details_price.php?edate="+date+"&sdate="+sdate, true);
                    xmlhttp.send();
                } 
            }
    function submit_confirm(){
        var retVal = confirm("Do you want to continue ?");
               if( retVal == true ) {
                  window.location.href = 'http://localhost/SWENGG2/car_details_process.php';
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
    </style>
</head>
<body class="body-wrapper">
    <?php 
    //session_start();
    include 'topbar.php';
    
        if(isset($_GET['searched_car'])){
            $_SESSION['searched_car'] = $_GET['searched_car'];
        }
        else{
            header('location:new_catalog.php');
        }
    
    
/*<!--=================================
=            Single Blog            =
==================================-->*/
    echo '<div class="container mt-30" style="">
        <div class="d-flex justify-content-center mb-20 ">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:50%; height: auto;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper/ Images for slides -->
                <div class="carousel-inner ">';
                
                $ctr = 0;
                 $sql1="select location from car_images where carID=".$_SESSION['searched_car'];
                            $result = $con->query($sql1);
                            if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()){
                                $ctr = $ctr + 1;
                                if($ctr == 1){
                                    echo '<div class="item active">
                    <img src="'.$row["location"].'" style="width:auto;height:250px;">
                    </div>';
                                }
                                else{
                                    echo "<div class='item'>
                                    <img src='".$row["location"]."' style='width:100%;height:250px;'>
                                    </div>";
                      
                                }
                            }
                                
                           
                            } 
                            else {
                                echo "NO PHOTOS AVAILABLE";
                            }
                  
                echo '</div>
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
        </div>';
      
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
    
        
        echo '<div class="row">
            <div class="col-md-4 offset-md-1 col-lg-7 offset-lg-0">
                <div class="product-details mb-20">
                    <h1 class="product-title">'.$carname.'</h1>
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-o"></i> By '.$owner.'</li>
                            <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Car Type '.$cartype.'</li>
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
                            <li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active mb-20" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p>'.$description.'</p>
							</div>
							<div class="tab-pane fade mb-20" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
								  <tbody>
								    <tr>
								      <td>Brand</td>
								      <td>'.$brand.'</td>
								    </tr>
								    <tr>
								      <td>Car Type</td>
								      <td>'.$cartype.'</td>
								    </tr>
								    <tr>
								      <td>Fuel Type</td>
								      <td>'.$fueltype.'</td>
								    </tr>
								    <tr>
								      <td>Name</td>
								      <td>'.$carname.'</td>
								    </tr>
								    <tr>
								      <td>Seater</td>
								      <td>'.$seats.'</td>
								    </tr>
                                    <tr>
								      <td>Rental Price</td>
								      <td>'.$_SESSION['price'].'</td>
								    </tr>
								  </tbody>
								</table>
							</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
                                      <div class="media">
                                    
                                          <!-- Avater -->';
                                          $carfeedback =  "SELECT f.rentID, f.type, f.rating, f.comments, f.date, rr.owner_email, rr.carID, u.firstname , u.lastname  
                                            FROM feedback f LEFT JOIN rentals r ON f.rentID = r.rentID
                                            LEFT JOIN reservation_requests rr ON r.reqID = rr.reqID
                                            LEFT JOIN users u ON rr.renter_email = u.email
                                            WHERE  f.type = 'Owner' AND rr.carID = ". $_SESSION['searched_car'];
                                    $result2 = mysqli_query($con, $carfeedback);
                                    if ($result2->num_rows > 0) {
                                        while($row = $result2->fetch_assoc()) { 
                                     
							  			echo '<img src="images/user/user-thumb.jpg" alt="avater">
							  			<div class="media-body">
							  				<!-- Ratings -->
                                              <div class="ratings">';
                                        if($row['rating'] == 5){
							  					echo '<ul class="list-inline">
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
                                                  </ul>';
                                        }
                                        else if($row['rating'] == 4){
                                            echo '<ul class="list-inline">
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
                                            </ul>';
                                  }
                                    else if($row['rating'] == 3){
                                        echo '<ul class="list-inline">
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-star"></i>
                                            </li>
                                        </ul>';
                              }
                              else if($row['rating'] == 2){
                                echo '<ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>';
                      }
                            else if($row['rating'] == 1){
                                echo '<ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="fa fa-star"></i>
                                    </li>
                                
                                </ul>';
                      }
                                                  
							  				echo '</div>
							  				<div class="name">
							  					<h5> '.$row['firstname'] .' '. $row['lastname'].' </h5>
							  				</div>
							  				<div class="date">
							  					<p>'.$row['date'] .'</p>
							  				</div>
							  				<div class="review-comment">
							  					<p>
                                                  '.$row['comments'] .'	
                                                  </p>
                                              </div>
                                              </div>
                                      
                                   '	;
                                            }
                                        }
                                        else{
                                            echo '0 results';
                                            echo $_SESSION['searched_car'];
                                        }
                                           
                                          
                                
                            	
                                        
                                    
                                      
                                
							  	echo '		</div> <div class="review-submission">
							  			<h3 class="tab-title"></h3>
						  				
						  				<div class="review-submit">
						  					
						  				</div>
							  		</div>
							  	</div>
							</div>
						</div>
					</div>
            </div>
    
            <div class="col-md-4 offset-md-1 col-lg-5 offset-lg-0">
                <div class="widget">
                    <h1 class="mb-20"><span>P '.$_SESSION['price'].'</span> / day</h1>
                    <!--<h3 class="widget-header user">Renting Information</h3>-->
                    <div class="row mb-20">
                        <form id="reserve_form" method="get">
                            <!-- Date -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">From</label>
                                <input type="date" class="form-control" method="get" id="reserve_sdate" name="start_date" placeholder="From" min="'.date("Y-m-d", strtotime($date ." +1 day")).'" onchange="set_todate(this.value)"/>
                            </div>
                            <!-- Date -->
                            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-0">
                                <label for="comunity-name">To</label>
                                <input type="date" class="form-control" method="get" id="reserve_edate" name="end_date" placeholder="To" min="" value="" onchange="set_fromdate(this.value)" disabled />
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
                    
                    <div id="view_pricebreakdown">
                        </div>
                        
                    <!-- Submit button -->
                    <button class="btn btn-transparent" style="width: 100%;" id="reserve_btn" onclick="submit_confirm()" disabled>Submit Reservation</button>
                </div>
            </div>
        </div>
    </div>';
    
?>
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
