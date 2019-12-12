<!DOCTYPE html>

<?php
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .mb-20 {
                margin-bottom: 20px;
            }
            .mt-30{
                margin-top: 30px;
            }
            .checked {
              color: orange;
            }
        </style>

</head>

<body class="body-wrapper"  background = "images\background.jpg"  style="background-repeat: no-repeat; background-size: cover; background-position: center;">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
        <?php 
            if(isset($_GET['view_rrate_btn'])){
                
                $sql = "select concat( u.firstname , ' ' , u.lastname) as fullname, f.rating, if(f.comment is null, '<null>', f.comment) as comment, f.date, rr.carID, ci.location, c.name
                        from rentals r
                        join reservation_requests rr on r.reqID = rr.reqID
                        join users u on rr.owner_email = u.email
                        join feedback f on r.rentID = f.rentID
                        join car_images ci on ci.carID = rr.carID
                        join catalogue c on c.carID = ci.carID
                        where r.rentID = ".$_GET['view_rrate_btn']." and f.type='Renter'";
                
                if($result = $con->query($sql)){
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()){
                            $owner_name = $row['fullname'];
                            $rating = $row['rating'];
                            $comment = $row['comment'];
                            $date = $row['date'];
                            $carimage = $row['location'];
                            $carname = $row['name'];
                        }
                    }
                }
                
        ?>

    <div class="container mt-30 d-flex justify-content-center">
        <div class="col-lg-8">
          <!-- Media, Title and Actions Card -->
            <div class="card pmd-card">

                <!-- Card Media -->
                <div class="pmd-card-media text-center">
                    <h1 class="card-title mt-30" name="">Renter Rating</h1>
                    <img src="http://propeller.in/assets/images/profile-pic.png" width="500" height="666" class="img-fluid mt-30 mb-20">
                    <h4><?php echo $carname; ?></h4>
                    <h2 class="card-title" name="">By <?php echo $owner_name; ?></h2>
                    <p class="card-subtitle" name=""><?php echo $date; ?></p>		
                </div>
                
                <div class="card-body text-center">
                    <div class="review-submission">
                        <!-- Rate -->
                        <div class="review-submit">
                            <!-- Ratings -->
                            <div class ="rating" style = "font-size: 3em;">
                                <?php 
                                    $lighted_star = $rating;
                                    $unlighted_star = 5 - $rating;

                                    while($lighted_star > 0){
                                        echo "<span class='fa fa-star checked'></span>";
                                        $lighted_star = $lighted_star - 1;
                                    }   
                                    while($unlighted_star > 0){
                                        echo "<span class='fa fa-star'></span>";
                                        $unlighted_star = $unlighted_star - 1;
                                    }
                                ?>
                            </div>
                            <div class="col-12">
                                <!-- DISPLAY COMMENT HERE IF HAVE-->
                                <?php if($comment <> '<null>'){ ?>
                                    <p><?php echo $comment; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="card-footer text-right">
                    <!-- FORM START -->
                    <form action="stransactions_completed_use.php">
                    <!-- Buttons -->
                        <button type="submit" class="btn btn-secondary">Back</button>
                    </form>
                    <!-- FORM END -->
                </div>
            </div>
        </div>       
    </div>
    
<?php } ?>
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