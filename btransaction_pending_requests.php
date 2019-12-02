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
    </style>

</head>

<body class="body-wrapper">

    <?php include 'topbar.php' ?>
<!--==================================
=            User Profile            =
===================================-->
<?php
            $email = $_SESSION['email'];
            $query = " SELECT r.reqID, r.req_date, r.date_use, r.date_return, r.owner_email, u.firstname, u.lastname, r.ref_req_status, 
                        ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability 
                        FROM users u JOIN reservation_requests r ON u.email = r.owner_email 
                        JOIN catalogue c ON r.carID = c.carID 
                        JOIN car_images ci ON c.carID = ci.carID 
                        WHERE c.renter_email = '".$email."' 
                        AND r.ref_req_status = 'Pending'
                        GROUP BY r.reqID
                        ORDER BY r.req_date";
            $search_result = filterTable($query);
        

       
        function filterTable($query)
        {
            $con = mysqli_connect("localhost", "root", "", "gogobiyahe");
            $filter_Result = mysqli_query($con, $query);
            return $filter_Result;
        }
        ?>
    
    
<section class="">
	<!-- Container Start -->
	<div class="container">
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
                    ?>
						<ul>
							<li class="active"><a href="btransaction_pending_requests.php"><i class="fa fa-question"></i>Pending Requests<span><?php echo $prcount ?></span></a></li>
                            <li>
								<a href="btransaction_denied_requests.php"><i class="fa fa-question"></i>Denied Requests<span><?php echo $drcount ?></span></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-money"></i>Pending Payments<span><?php echo $ppcount ?></span></a>
							</li>
							<li>
								<a href="btransaction_pending_use.php"><i class="fa fa-clipboard"></i>Pending Use<span><?php echo $pucount ?></span></a>
							</li>
							<li>
								<a href="btransaction_completed_use.php"><i class="fa fa-check-circle"></i>Completed Rental<span><?php echo $crcount ?></span></a>
							</li>
							<li>
								<a href="btransaction_cancelled.php"><i class="fa fa-ban"></i>Cancelled<span><?php echo $cacount ?></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Pending Requests</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class = "text-center">Image</th>
								<th class = "text-center">Vehicle Details</th>
                                <th class = "text-center">Owner Details</th>
								<th class="text-center">Request Date</th>
                                <th class = "text-center">Date Use</th>
                                <th class = "text-center">Date Return</th>
                                <th class = "text-center">Total Price</th>
                                <th class = "text-center">Activity</th>
							</tr>
						</thead>
						<tbody>
                            <?php
							if ($search_result->num_rows > 0) {
                                while($row = $search_result->fetch_assoc()) {
                                    echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td><ul><li>" 
                                    . $row['name'] ."</li><li>Brand: ".$row['brand']."</li>
                                    <li>Car Type: ".$row['car_type']."</li>
                                    <li>Fuel Type: ".$row['fuel_type']."</li>
                                    <li>Capacity: ".$row['seater']."</li></ul>
                                    </td><td><ul><li>Name:" . $row['firstname'] ." ".  $row['lastname'] . "</li>
                                    <li>Email: ".$row['email']."</li></ul></td><td>" . $row['req_date'] ."</td><td>" . $row['date_use'] ."</td><td>" . $row['date_return']  ."</td><td>" . $row['totalPrice'] ."</td><td><form method='post'><button type='submit' name='cancel_reserve' value=".$row['reqID'].">Cancel Reservation</button></td></tr>\n";
                                }
    }
                            if(isset($_POST['cancel_reserve'])){
                            $sql='UPDATE reservation_requests
                            SET ref_req_status = "Cancelled"
                            WHERE reqID = '.$_POST["cancel_reserve"];
                            $con->query($sql);
                            header('location:btransaction_pending_use.php');

}
?>

						</tbody>
					</table>
					
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