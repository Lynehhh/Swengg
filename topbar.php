<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once('connection.php');



$userType = $_SESSION['user_type'];
$email = $_SESSION['email'];

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
    <!-- background-image: linear-gradient(to right, #187e7e, #093637, #051b1b) -->
    
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    
    <style>
        .mb-20 {
        margin-bottom: 20px;
        }
        .mb-10 {
            margin-bottom: 10px;
        }
        .mt-30{
            margin-top: 30px;
        }
        .top-link {
        color: white;
        }
        .bg-img{
            background-size: cover;
            background-position: center;
        }
        .bg-div{
            background: rgba(225, 225, 225, .9);
        }

    </style>
</head>

<body>
    <section style="height: 85px; background-color: #1d222e;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <a class="navbar-brand" href="home.php">
                    <img src="images/logo.png" alt="" style="height: 170%;">
                </a>
				<nav class="navbar navbar-expand-lg  navigation">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<?php if($email != "" ){?>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item">
								<a class="nav-link top-link" href="home.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link top-link" href="new_catalog.php">Car Catalog</a>
							</li>
							<?php if($userType == "Owner" ){?>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link top-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Owner Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="sviewlisting.php">My Listings</a>
									<a class="dropdown-item" href="listing.php">Add New Listing</a>
								</div>
							</li>
							<?php } ?>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link top-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Transactions <span><i class="fa fa-angle-down"></i></span></a>

                                <div class="dropdown-menu dropdown-menu-right">
									<?php if($userType == "Renter" ){?>
									<a class="dropdown-item" href="transactions_pending_requests.php">Renter Transactions</a>
									<?php } else{?>
									<a class="dropdown-item" href="transactions_pending_requests.php">Renter Transactions</a>
									<a class="dropdown-item" href="stransactions_pending_requests.php">Owner Transactions</a>
									<?php } ?>
								</div>
							</li>
                            <li class="nav-item dropdown dropdown-slide">
								<a class="nav-link top-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Profile <span><i class="fa fa-angle-down"></i></span></a>
                                <div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="viewprofile.php">View Profile</a>
                                    <a class="dropdown-item" href="sperformance_dashboard.php">Performance Dashboard</a>
									<a class="dropdown-item" href="">Log Out</a>
								</div>
							</li>

						</ul>
						<?php } ?>

						<?php if($email == "" ){?>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link top-link login-button" href="login.php">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link add-button" href="signup.php"><i class="fa fa-plus-circle"></i> Sign In</a>
							</li>
						</ul>
						<?php } ?>

					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
</body>
</html>