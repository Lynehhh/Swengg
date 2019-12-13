<!DOCTYPE html>

<?php
    require_once('connection.php');
    session_start(); ?>

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
        .rate {
                float: left;
                height: 46px;
                padding: 0 10px;
            }
            .rate:not(:checked) > input {
                position:absolute;
                top:-9999px;
            }
            .rate:not(:checked) > label {
                float:right;
                width:1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:30px;
                color:#ccc;
            }
            .rate:not(:checked) > label:before {
                content: '★ ';
            }
            .rate > input:checked ~ label {
                color: #ffc700;    
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;  
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: #c59b08;
            }
    </style>

</head>

<body class="body-wrapper"  background = "images\background.jpg"  style="background-repeat: no-repeat; background-size: cover; background-position: center;">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
    
    <?php 
            if(isset($_GET['rate_btn'])){
                $_SESSION['rate_rent'] = $_GET['rate_btn'];
                $sql = "select concat( u.firstname , ' ' , u.lastname) as fullname
                        from rentals r
                        join reservation_requests rr on r.reqID = rr.reqID
                        join users u on rr.owner_email = u.email
                        where r.rentID = ".$_SESSION['rate_rent'];
                
                if($result = $con->query($sql)){
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()){
                            $owner_name = $row['fullname'];
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
                    <h1 class="card-title mt-30" name="">Give Us a Feedback!</h1>
                    <img src="http://propeller.in/assets/images/profile-pic.png" width="500" height="666" class="img-fluid mt-30 mb-20">
                    <h2 class="card-title" name=""><?php echo $owner_name; ?></h2>	
                </div>
                
                <div class="card-body text-center">
                    <div class="review-submission">
                        <h3 class="tab-title">Rate Your Experience</h3>
                        <!-- Rate -->
                        <div class="review-submit">
                            <!-- FORM START -->
                            <form method="get" action="orate_submit_process.php" id="form1">
                                <!-- Ratings -->
                                <div class ="rating" style = "margin-left: 38%;">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="Awesome - 5 stars">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="Pretty Cool - 4 stars">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="Meh - 3 stars">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="Pretty Bad - 2 stars">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="Sucks - 1 star">1 star</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- Comment Message -->
                                    <textarea name="review" id="review" rows="10" class="form-control" placeholder="Comments"></textarea>
                                </div>
                            </form>
                            <!-- FORM END -->
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="card-footer text-right">
                    <!-- Buttons -->
                    <button type="submit" name="rate_form_submit" form="form1" class="btn btn-primary">Submit Review</button>
                    <button type="button" class="btn btn-secondary">Back</button>
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