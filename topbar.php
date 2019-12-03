<?php
session_start();
require_once('connection.php');
$userType = $_SESSION['user_type'];
    
?>

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
	
    <style>
        .mb-20 {
        margin-bottom: 20px;
        }
        .top-link {
        color: white;
        }

    </style>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    <section class="" style="height: 85px; background-color: #020000;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <a class="navbar-brand" href="home.php">
						<img src="images/logo.png" alt="" style="height: 170%;">
					</a>
				<nav class="navbar navbar-expand-lg  navigation">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item ">
								<a class="nav-link top-link" href="home.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link top-link" href="new_catalog.php">Car Catalog</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link top-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="category.html">Category</a>
									<a class="dropdown-item" href="car_details.php">Car Details</a>
									<a class="dropdown-item" href="slisting_new.php">New Listing</a>
									<a class="dropdown-item" href="sviewlisting.php">Listing</a>
									<a class="dropdown-item" href="user-profile.html">User Profile</a>
									<a class="dropdown-item" href="submit-coupon.html">Submit Coupon</a>
									<a class="dropdown-item" href="blog.html">Blog</a>
									<a class="dropdown-item" href="single-blog.html">Single Post</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link top-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									My Transactions <span><i class="fa fa-angle-down"></i></span>

									<div class="dropdown-menu dropdown-menu-right">
									<?php if($userType == "Renter" ){?>
									<a class="dropdown-item" href="transactions_pending_requests.php">Renter Transactions</a>
									<?php } else{?>
									<a class="dropdown-item" href="transactions_pending_requests.php">Renter Transactions</a>
									<a class="dropdown-item" href="stransactions_pending_requests.php">Owner Transactions</a>
									<?php } ?>
								</div>
							</li>

						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link top-link login-button" href="login.php">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link add-button" href="signup.php"><i class="fa fa-plus-circle"></i> Sign In</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
</body>
</html>