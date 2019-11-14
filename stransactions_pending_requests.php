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
<section class="">
    <?php
            $email = $_SESSION['email'];
                $query = " SELECT r.reqID, r.req_date, r.date_use, r.date_return, r.renter_email, u.firstname, u.lastname, r.ref_req_status, 
                            ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability 
                            FROM users u JOIN reservation_requests r ON u.email = r.renter_email 
                            JOIN catalogue c ON r.carID = c.carID 
                            JOIN car_images ci ON c.carID = ci.carID 
                            WHERE c.owner_email = '".$email."' 
                            AND r.ref_req_status = 'Pending'
                            GROUP BY c.carID";
                $search_result = filterTable($query);
            
           
            function filterTable($query)
            {
                $con = mysqli_connect("localhost", "root", "", "gogobiyahe");
                $filter_Result = mysqli_query($con, $query);
                return $filter_Result;
            }

        ?>
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="active"><a href="transactions_pending_requests.php"><i class="fa fa-question"></i>Pending Requests</a></li>
							<li>
								<a href="#"><i class="fa fa-money"></i>Pending Payments</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-clipboard"></i>Pending Use</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-check-circle"></i>Completed Rental</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-ban"></i>Cancelled</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Pending Requests</h3>
                    <form method="post" action="processapproval.php">
                        <table class="table table-responsive product-dashboard-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Vehicle Name</th>
                                    <th class="text-center">Request Date</th>
                                    <th class="text-center">Rental Date</th>
                                    <th class="text-center">Return Date</th>
                                    <th class="text-center">Total Price</th>
                                    <th class="text-center">Activity</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    "select c.location, c.name, c.brand, c.car_type, c.fuel_type, c.seater, u.firstname, u.lastname, u.email, rr.req_date, rr.date_use, rr.date_return, rr.totalPrice, rr.ref_req_status
                                    from reservation_requests rr
                                    join users u on rr.owner_email = u.email
                                    join car_images ci on ci. carID = rr.carID
                                    join catalogue c on rr.carID = c.carID
                                    where rr.renter_email = '".$_SESSION['email']."' and ref_req_status = 'Pending'";

                                    if ($search_result->num_rows > 0) {
                                        while($row = $search_result->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td class="product-thumb">
                                        <?php echo "<img src = ". row['location'] .  " height ='auto;' width = '60%;> "?></td>
                                    <td class="product-details">
                                        <h3 class="title"><?php echo $row['name'];?></h3>
                                        <div class="row"></div>
                                        <span><strong>Brand: </strong><?php echo $row['brand']; ?></span>
                                        <span><strong>Car Type: </strong><?php echo $row['car_type']; ?></span>
                                        <span><strong>Fuel Type: </strong><?php echo $row['fuel_type']; ?></span>
                                        <span><strong>Seaters: </strong><?php echo $row['seater']; ?></span>
                                        <span><strong>Name: </strong><?php echo $row['firstname'] ." ".  $row['lastname'] ?></span>
                                        <span class="status active"><strong>Email: </strong><?php echo $row['email'] ?></span>
                                    </td>
                                    <td class="product-category"><span class="categories"><time><?php echo $row['req_date'] ?></time></span></td>
                                    <td class="product-category"><span class="categories"><time><?php echo $row['date_use'] ?></time></span></td>
                                    <td class="product-category"><span class="categories"><time><?php echo $row['date_return'] ?></time></span></td>
                                    <td class="product-category"><span class="categories"><time><?php echo $row['totalPrice'] ?></time></span></td>
                                    <td class="action" data-title="Action">
                                        <?php
                                        "<button type = 'submit' name = 'Approve'  value = '" . $row['reqID'] . "' >Approve </button><button type = 'submit' name = 'Deny'  value = '" . $row['reqID'] . "' >Deny </button>"
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                                     }
                                }
                                else if (isset($_POST['search']) &&($search_result->num_rows == 0)){
                                    echo '<script language="javascript">';
                                    echo 'alert("Invalid Search Parameter. Please Try Again")';
                                    echo '</script>';
                                }
                            ?>
                        </table>
					</form>
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