<!DOCTYPE html>

<?php
session_start(); 
require_once('connection.php');
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
        .mt-30{
            margin-top: 30px;
        }
    </style>

</head>

<body class="body-wrapper">

    <?php include 'topbar.php' ?>
<!--==================================
=            User Profile            =
===================================-->
<?php
            $email = $_SESSION['email'];
            $query = " SELECT re.rentID,  ci.location, c.name, re.total_amount, re.due_date, re.status, re.date_use, r.date_return, 
                r.renter_email, r.owner_email, u.firstname, u.lastname FROM rentals re JOIN reservation_requests r ON re.reqID = r.reqID JOIN car_images ci ON r.carID = ci.carID JOIN catalogue c ON c.carID = ci.carID JOIN users u ON r.owner_email = u.email 
                            WHERE r.renter_email = '".$email."' 
                            AND re.status = 'Completed Use'
                            GROUP BY re.rentID
                            ORDER BY re.date_use asc";
            $search_result = filterTable($query);
        
       
        function filterTable($query)
        {
            $con = mysqli_connect("localhost", "root", "", "gogobiyahe");
            $filter_Result = mysqli_query($con, $query);
            return $filter_Result;
        }
        ?>
    
    
<section class="mt-30">
	<!-- Container Start -->
	<div class="">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
                    <?php
                     $prQuery = "SELECT count(reqID) AS prcount FROM reservation_requests WHERE renter_email ='".$_SESSION['email']."' AND ref_req_status = 'Pending'";
                     $result = mysqli_query($con,$prQuery);
                    if($result = $con->query($prQuery)){
                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                                $prcount = $row['prcount'];
                            }
                        }
                    }
                    $drQuery = "SELECT count(reqID) AS drcount FROM reservation_requests WHERE renter_email ='".$_SESSION['email']."' AND ref_req_status = 'Denied'";
                    $result1 = mysqli_query($con,$drQuery);
                    if($result1 = $con->query($drQuery)){
                        if ($result1->num_rows > 0) { 
                            while($row = $result1->fetch_assoc()) {
                                $drcount = $row['drcount'];
                            }
                        }
                    }

                

                    $ppQuery = "SELECT count(r.rentID) AS ppcount, rr.renter_email FROM rentals r JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.renter_email ='".$_SESSION['email']."' AND r.status = 'Unpaid'";
                    $result2 = mysqli_query($con,$ppQuery);
                    if($result2 = $con->query($ppQuery)){
                        if ($result2->num_rows > 0) { 
                            while($row = $result2->fetch_assoc()) {
                                $ppcount = $row['ppcount'];
                            }
                        }
                    }

                    $puQuery = "SELECT count(r.rentID) AS pucount, rr.renter_email FROM rentals r JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.renter_email ='".$_SESSION['email']."' AND r.status = 'Pending Use'";
                    $result3 = mysqli_query($con,$puQuery);
                    if($result3 = $con->query($puQuery)){
                        if ($result3->num_rows > 0) { 
                            while($row = $result3->fetch_assoc()) {
                                $pucount = $row['pucount'];
                            }
                        }
                    }

                    $crQuery = "SELECT count(r.rentID) AS crcount, rr.renter_email FROM rentals r JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.renter_email ='".$_SESSION['email']."' AND r.status = 'Completed'";
                    $result4 = mysqli_query($con,$crQuery);
                    if($result4 = $con->query($crQuery)){
                        if ($result4->num_rows > 0) { 
                            while($row = $result4->fetch_assoc()) {
                                $crcount = $row['crcount'];
                            }
                        }
                    }

                    $caQuery = "SELECT count(r.rentID) AS cacount, rr.renter_email FROM rentals r JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.renter_email ='".$_SESSION['email']."' AND r.status = 'Cancelled'";
                    $result5 = mysqli_query($con,$caQuery);
                    if($result5 = $con->query($caQuery)){
                        if ($result5->num_rows > 0) { 
                            while($row = $result5->fetch_assoc()) {
                                $cacount = $row['cacount'];
                            }
                        }
                    }

                    $orQuery = "SELECT count(r.rentID) AS orcount, rr.renter_email FROM rentals r JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.renter_email ='".$_SESSION['email']."' AND r.status = 'Ongoing'";
                    $result6 = mysqli_query($con,$orQuery);
                    if($result6 = $con->query($orQuery)){
                        if ($result6->num_rows > 0) { 
                            while($row = $result6->fetch_assoc()) {
                                $orcount = $row['orcount'];
                            }
                        }
                    }
                    ?>
						<ul>
							<li><a href="transactions_pending_requests.php"><i class="fa fa-question"></i>Pending Requests<span><?php echo $prcount ?></span></a></li>
                            <li>
								<a href="btransaction_denied_requests.php"><i class="fa fa-thumbs-down"></i>Denied Requests<span><?php echo $drcount ?></span></a>
							</li>
							<li>
								<a href="btransaction_pending_payments.php"><i class="fa fa-money"></i>Pending Payments<span><?php echo $ppcount ?></span></a>
							</li>
							<li>
								<a href="btransaction_pending_use.php"><i class="fa fa-clipboard"></i>Pending Use<span><?php echo $pucount ?></span></a>
							</li>

                            <li>
                            <a href="btransaction_ongoing_rental.php"><i class="fa fa-money"></i>Ongoing Use<span><?php echo $orcount ?></span></a>
							</li>
							<li class="active">
								<a href="btransaction_completed_use.php"><i class="fa fa-check-circle"></i>Completed Rental<span><?php echo $crcount ?></span></a>
							</li>
							<li>
								<a href="btransaction_cancelled.php"><i class="fa fa-ban"></i>Cancelled Rental<span><?php echo $cacount ?></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Completed Rental</h3>
					<table class="table product-dashboard-table">
						<thead>
							<tr>
								<th class = "text-center">Image</th>
                                <th class = "text-center"></th>
								<th class = "text-center">Vehicle Details</th>
                                <th class = "text-center">Renter Details</th>
                                <th class = "text-center">Date Use</th>
                                <th class = "text-center">Date Return</th>
                                <th class = "text-center">Total Price</th>
							</tr>
						</thead>
						<tbody>
                            <?php
							if ($search_result->num_rows > 0) {
                                while($row = $search_result->fetch_assoc()) {
                                    $interval = 8; 
                                    $totalPrice =  $row['price'] * $interval;
                                    echo "<form method = 'post' >";
                                    echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td></td><td class='product-details'><ul><h3 class='title'>" 
                                    . $row['name'] ."</h3><li>Brand: ".$row['brand']."</li>
                                    <li>Car Type: ".$row['car_type']."</li>
                                    <li>Fuel Type: ".$row['fuel_type']."</li>
                                    <li>Capacity: ".$row['seater']."</li></ul>
                                    </td><td><ul><li>Name:" . $row['firstname'] ." ".  $row['lastname'] . "</li>
                                    <li>Email: ".$row['renter_email']."</li></ul></td><td class='product-category'>" . $row['date_use'] ."</td><td class='product-category'>" . $row['date_return']  ."</td><td class='product-category'>" . $totalPrice ."</td>
				    <td class='product-category'><button class = 'btn btn-warning' style = 'padding: 3% 7%;' type = 'button' data-toggle='modal' data-target='#myModal' > Rate </button></td>\n";
                                }
    }
?>

						</tbody>
					</table>
		    	<!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header" style="background-image: linear-gradient(to right, #44A08D, #093637)">
                                  <!-- yun violet shit  linear-gradient(to right, #24243e, #302b63)-->
                                  <img src="images/logo.png" alt="" style="width: 20%; margin: 0 3% 0 0;">
                                  <h3 class="name" id="exampleModalLabel" style=" margin: 3% 0 1% 5%; color: white; font-family: Verdana, Geneva, sans-serif">Send Us Some Feedback</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-center w-100">
                                <div class="media-body">
                                    <!-- Image -->
                                    <img src="images/user/user-thumb.jpg" alt="avater" style="height: 50%;">
                                    <div class="name">
                                        <!-- Name -->
                                        <h5>CAR NAME HERE</h5>
                                    </div>
                                    <div class="date">
                                        <!-- Date -->
                                        <p>INSERT DATE HERE</p>
                                    </div>
                                    <div class="review-submission">
                                        <h3 class="tab-title">How was your experience?</h3>
                                        <!-- Rate -->
                                        <div class="review-submit">
                                            <!-- FORM START -->
                                            <form action="#" class="">
                                                <!-- Ratings -->
                                                <div class="rate">
                                                    <div class="starrr" style="font-size: 1.50em;"></div>
                                                </div>
                                                <div class="col-12">
                                                    <!-- Comment Message -->
                                                    <textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
                                                </div>
                                            </form>
                                            <!-- FORM END -->
                                        </div>
                                    </div>
                                </div>
                                  <hr>
                                  ...
                              </div>
                              <div class="modal-footer">
                                  <!-- Buttons -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Submit Review</button>
                              </div>
                            </div>
                          </div>
                        </div>
				</div>
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
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
