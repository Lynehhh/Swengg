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
               $query = " SELECT re.rentID,  ci.location, c.name, re.total_amount, re.due_date, re.status, re.date_use, r.date_return, 
               r.renter_email, r.owner_email, u.firstname, u.lastname FROM rentals re JOIN reservation_requests r ON re.reqID = r.reqID JOIN car_images ci ON r.carID = ci.carID JOIN catalogue c ON c.carID = ci.carID JOIN users u ON r.renter_email = u.email 
                           WHERE r.owner_email = '".$email."' 
                           AND re.status = 'Unpaid'
                           GROUP BY re.rentID";
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
	
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li><a href="stransactions_pending_requests.php"><i class="fa fa-question"></i>Pending Requests<span>2</span></a></li>
                            <li ><a href="stransactions_denied_requests.php"><i class="fa fa-thumbs-down"></i>Denied Requests<span>2</span></a></li>

                            <li class="active">
								<a href="stransactions_pending_payments.php"><i class="fa fa-money"></i>Pending Payments<span>5</span></a>
							</li>
							<li>
								<a href="stransactions_pending_use.php"><i class="fa fa-clipboard"></i>Pending Use<span>12</span></a>
							</li>
							<li>
								<a href="stransactions_completed_use.php"><i class="fa fa-check-circle"></i>Completed Rental<span>23</span></a>
							</li>
							<li>
								<a href="stransactions_cancelled_rentals.php"><i class="fa fa-ban"></i>Cancelled Rental<span>5</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Pending Payments</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class = "text-center">Image</th>
                                <th class = "text-center"></th>
								<th class = "text-center">Vehicle Details</th>
                                <th class = "text-center">Renter Details</th>
								<th class="text-center">Payment Due Date</th>
                                <th class = "text-center">Date Use</th>
                                <th class = "text-center">Date Return</th>
                                <th class = "text-center">Total Price</th>
							</tr>
						</thead>
						<tbody>
                            <?php
							
                            if ($search_result->num_rows > 0) {
                                while($row = $search_result->fetch_assoc()) {
                                    echo "<form method = 'post' action = 'paynow.php'>";
                                    echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td></td><td>" . $row['name'].
                                    "</td><td class=''><ul><li>Name:" . $row['firstname'] ." ".  $row['lastname'] . "</li>
                                    <li>Email: ".$row['renter_email']."</li></ul></td><td class='product-category'>" . $row['due_date'] ."</td><td class='product-category'>" . $row['date_use'] ."</td><td class='product-category'>" . $row['date_return']  ."</td><td class='product-category'>" . $row['total_amount'] ."</td></tr>\n";
                                }

                            }
                            ?>

						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		<!-- Row End -->
	
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