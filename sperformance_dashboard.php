<!DOCTYPE html>
<?php
 
$dataPoints = array( 
	array("label"=>"Chrome", "y"=>64.02),
	array("label"=>"Firefox", "y"=>12.55),
	array("label"=>"IE", "y"=>8.47),
	array("label"=>"Safari", "y"=>6.08),
	array("label"=>"Edge", "y"=>4.29),
	array("label"=>"Others", "y"=>4.59)
)

 
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
    
    <script>
        var chart = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            title: {
                //text: "Usage Share of Desktop Browsers"
            },
            subtitles: [{
                //text: "November 2017"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        
        chart1.render();
    </script>
    <style>
        .d-icon{
            font-size: 7em;
            position:relative;
            padding-right: 5px;
            top: calc(50% - 10px);
        }
    </style>

</head>

<body class="body-wrapper">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
    <div class="container mt-30" style="display: block;">
        <div class="row">
            <div class="col-md-4 offset-md-1 col-lg-4 offset-lg-0">
                <div class="card " style="background-image: linear-gradient(87deg,#f5365c 0,#f56036 100%)">
                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="mb-20 list-inline-item top-link"><span>Cancellation Rate</span></h4>
                                    <h1 class="mb-20 top-link"><span> 5</span></h1>
                                </div>
                                <div class="col-lg-2 d-icon">
                                    <i class="fa fa-ban top-link"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 offset-md-1 col-lg-4 offset-lg-0">
                <div class="card " style="background-image: linear-gradient(87deg,#9be15d 0,#37bc9b 100%)">
                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="mb-20 list-inline-item top-link"><span>Total Sales</span></h4>
                                    <h1 class="mb-20 top-link"><span>P 1000.00</span></h1>
                                </div>
                                <div class="col-lg-2 d-icon top-link">
                                    <i class="fa fa-cart-plus" ></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 offset-md-1 col-lg-4 offset-lg-0">
                <div class="card " style="background-image: linear-gradient(87deg,#172b4d 0,#1a174d 100%)">
                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h4 class="mb-20 list-inline-item top-link"><span>Number of Sales</span></h4>
                                    <h1 class="mb-20 top-link"><span> 5</span></h1>
                                </div>
                                <div class="col-lg-2 d-icon top-link">
                                    <i class="fa fa-shopping-cart" ></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <form class="row mt-30">
            <div class="col-md-4 offset-md-1 col-lg-5 offset-lg-0">
                
                <div class="">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="">PIE CHART</h3>
                            <h5 class="">As of November 2019</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 offset-md-1 col-lg-7 offset-lg-0">
                
                <div class="">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="">LINE CHART</h3>
                            <h5 class="">As of November 2019</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    

  <!-- JAVASCRIPTS -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
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