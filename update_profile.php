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
        button{
            width: 100%;
        }
    </style>

</head>

<body class="body-wrapper" background = "images\background2.jpg" style="background-repeat: no-repeat; background-size: cover;">


<?php include 'topbar.php' ?>
<?php 
$firstname =  $_SESSION['firstname']; 
$lastname=  $_SESSION['lastname'];
$email =  $_SESSION['email'];
$address =  $_SESSION['address'];
$city =  $_SESSION['city'];
$birthday =  $_SESSION['birthday']; 
$usertype =  $_SESSION['user_type'];
    ?>

<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-2 offset-lg-0">
                    <!--  Image 
                    <div class="widget user-dashboard-menu">
                        <h3 class="widget-header user mb-20">User Photo</h3>
                        <img src="images/user/user-thumb.jpg" style="width:auto;height:250px;">
                        
                        <div class="form-group choose-file mt-30">
                            <h5 for="comunity-name">Upload Images</h5>
                            <input type="file" name="files[]" class="form-control-file d-inline" multiple>
                         </div>
                    </div> -->

                    </div>

                    
                    <div class="col-md-4 offset-md-1 col-lg-8 offset-lg-0">
                <div class="widget">
                    <div class="form-group p-5">
                    <div class="row mb-20">
                        <label for="comunity-name">First Name</label>
                        <input type="text" class="form-control" name = "firstname" placeholder="<?php echo $firstname; ?>">
                    </div>
                    <div class="row mb-20">
                                <label for="comunity-name">Last Name</label>
                                <input type="text" class="form-control"  name = "lastname" placeholder="<?php echo $lastname ?>">                  
                    </div>
                    <!--<h3 class="widget-header user">Renting Information</h3>-->
                    <div class="row mb-20">
                        <label for="comunity-name">Email</label>
                        <input type="text" class="form-control" name = "email" placeholder="<?php echo $email ?>">
                    </div>
                    <div class="row mb-20" >
                            <!-- Fuel Type -->
                                <label for="comunity-name">Street Address</label>
                                <input type="text" class="form-control" name = "address" placeholder="<?php echo $address ?>">
                    </div>
                    <div class="row mb-20">
                        <label for="comunity-name">City</label>
                        <input type="text" class="form-control" name = "city" placeholder="<?php echo $city ?>">
                    </div>                        
                    <div class="row mb-20">
                                <label for="comunity-name">Birthday</label>
                                <input type="text" class="form-control" name = "birthday" placeholder="<?php echo $birthday ?>">
                    </div>
                    <div class="row mb-20">

                                <label for="comunity-name">User Type</label>
                                <input type="text" class="form-control" value="<?php echo $usertype ?>"readonly/>
                            </div>
                  

                        <!-- Buttons -->
                        <div class="row">
                            <div class="col-md-5 offset-md-1 col-lg-4 offset-lg-0">
                                <button class="btn btn-success" type = "submit" name="update" value="Update" formaction = "processeditprofile.php">Update</button>
                            </div>
                            <div class="col-md-5 offset-md-1 col-lg-4 offset-lg-0">
                                <button class="btn btn-danger" name= "upgrade" formaction = "processupgrade.php">Upgrade</button>
                            </div>
                            <div class="col-md-5 offset-md-1 col-lg-4 offset-lg-0">
                                <button type="button" class="btn btn-primary"onclick="history.back()">Back</button>
                            </div>
                        </div>
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