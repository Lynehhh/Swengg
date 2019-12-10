<!DOCTYPE html>

<html lang="en">
<?php
session_start(); 
require_once('connection.php');
?>
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calssimax</title>
  
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

</head>

<body class="body-wrapper">

<section>
	<div class="container">
        <?php
		include 'topbar.php';
	   ?>
        </div>
</section>
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form action="dashboard.php" method="post">
						<div class="form-row">
							<div class="form-group col-md-10">
								<input type="text" class="form-control"  name="valueToSearch" placeholder=" Search by car brand, type or name">
							</div>
							<div class="form-group col-md-2">
                                <button name="search" value ="search" class="btn btn-primary" ><span><i class="fa fa-search"></i></span></button>
							</div>
						</div>
					</form>
                                        
                    <?php
            $email = $_SESSION['email'];
            if(isset($_POST['search']))
            {
                $valueToSearch = $_POST['valueToSearch'];
                // search in all table columns
                // using concat mysql function
                $query = "  SELECT ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability  FROM catalogue c 
                            JOIN car_images ci ON c.carID = ci.carID 
                            WHERE CONCAT(c.brand, c.car_type, c.name) LIKE '%".$valueToSearch."%' 
                            AND c.owner_email = '".$email."'GROUP BY c.carID";
                $search_result = filterTable($query);
                
            }
            else {
                $query = "  SELECT ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability 
                            FROM catalogue c JOIN car_images ci ON c.carID = ci.carID 
                            WHERE c.owner_email = '".$email."'GROUP BY c.carID";
                $search_result = filterTable($query);
            }
           
            function filterTable($query)
            {
                $con = mysqli_connect("localhost", "root", "", "gogobiyahe");
                $filter_Result = mysqli_query($con, $query);
                return $filter_Result;
            }
        ?>
    
				</div>
			</div>
		</div>
	</div>
    
    
    <!-- php to get stuff -->
    
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">My Cars</h3>
					<table class="product-dashboard-table" style="width: 100% !important;">
						<thead>
							<tr>
								<th>Picture</th>
								<th>Name</th>
								<th class="text-center">Brand</th>
								<th class="text-center">Car Type</th>
                                <th class="text-center">Fuel Type</th>
                                <th class="text-center">Seater</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Availability</th>
							</tr>
						</thead>
						<tbody>
							<tr>
                                <?php
                                if ($search_result->num_rows > 0) {
                                    while($row = $search_result->fetch_assoc()) {
                                            echo "<form method = 'post' action = 'slisting_details.php'>";
                                            echo "\t<tr><td class 'product-category'><img src =" . $row['location'] . " width ='200px' height = 'auto' </td>
                                            <td class='product-category'><button class = 'banana'  button type = 'submit' name = 'view'  value = '" . $row['carID'] . "' >" . $row['name'] ."  </button></td>
                                            <td class='product-category'>" . $row['brand'] ."</td><td>" . $row['car_type'] ."</td>
                                            <td class='product-category'>" . $row['fuel_type'] ."</td>
                                            <td class='product-category'>" . $row['seater'] ."</td>
                                            <td class='product-category'>" . $row['price'] ."</td>
                                            <td class='product-category'>" . $row['availability'] ."</td></tr>\n";
                                    }}
                                    else if (isset($_POST['search']) &&($search_result->num_rows == 0)){
                                    echo '<script language="javascript">';
                                    echo 'alert("Invalid Search Parameter. Please Try Again")';
                                    echo '</script>';
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