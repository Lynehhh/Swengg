<!DOCTYPE html>
<?php
session_start();
require_once("connection.php");
$email = $_SESSION['email'];
$query1 = "SELECT sum(amount) AS totalsales, month, year FROM auditsales WHERE month!= month(now()) AND year= year(now()) Group BY month,year"; 
$result1 = mysqli_query($con, $query1);  

$rating5 ="SELECT count(f.rentID) AS count, rr.owner_email FROM feedback f JOIN rentals r ON f.rentID = r.rentID JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.owner_email = '".$email."' and rating = 5";
$search_result = mysqli_query($con, $rating5);
    if ($search_result->num_rows > 0) {
        while($row = $search_result->fetch_assoc()) {
            $count5 = $row['count'];
        }
    }
    else{
        $count5 = 0;
    }
    $rating4 ="SELECT count(f.rentID) AS count, rr.owner_email FROM feedback f JOIN rentals r ON f.rentID = r.rentID JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.owner_email = '".$email."' and rating = 4";
    $search_result = mysqli_query($con, $rating4);
        if ($search_result->num_rows > 0) {
            while($row = $search_result->fetch_assoc()) {
                $count4 = $row['count'];
            }
        }
        else{
            $count4 = 0;
        }
        $rating3 ="SELECT count(f.rentID) AS count, rr.owner_email FROM feedback f JOIN rentals r ON f.rentID = r.rentID JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.owner_email = '".$email."' and rating = 3";
        $search_result = mysqli_query($con, $rating3);
            if ($search_result->num_rows > 0) {
                while($row = $search_result->fetch_assoc()) {
                    $count3 = $row['count'];
                }
            }
            else{
                $count3 = 0;
            }
            
        $rating2 ="SELECT count(f.rentID) AS count, rr.owner_email FROM feedback f JOIN rentals r ON f.rentID = r.rentID JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.owner_email = '".$email."' and rating = 2";
        $search_result = mysqli_query($con, $rating2);
            if ($search_result->num_rows > 0) {
                while($row = $search_result->fetch_assoc()) {
                    $count2 = $row['count'];
                }
            }
            else{
                $count2 = 0;
            }
        
            $rating1 ="SELECT count(f.rentID) AS count, rr.owner_email FROM feedback f JOIN rentals r ON f.rentID = r.rentID JOIN reservation_requests rr ON r.reqID = rr.reqID WHERE rr.owner_email = '".$email."' and rating = 1";
            $search_result = mysqli_query($con, $rating1);
                if ($search_result->num_rows > 0) {
                    while($row = $search_result->fetch_assoc()) {
                        $count1 = $row['count'];
                    }
                }
                else{
                    $count1 = 0;
                }
 
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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(pieChart);
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Month', 'Total Sales'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                              if($row["month"]==1){
                                  $month = "January";
                              }
                              else if($row["month"]==2){
                                $month = "February";
                            }
                            else if($row["month"]==3){
                                $month = "March";
                            }
                            else if($row["month"]==4){
                                $month = "April";
                            }
                            else if($row["month"]==5){
                                $month = "May";
                            }
                            else if($row["month"]==6){
                                $month = "June";
                            }
                            else if($row["month"]==7){
                                $month = "July";
                            }
                            else if($row["month"]==8){
                                $month = "August";
                            }
                            else if($row["month"]==9){
                                $month = "September";
                            }
                            else if($row["month"]==10){
                                $month = "October";
                            }
                            else if($row["month"]==11){
                                $month = "November";
                            }
                            else if($row["month"]==12){
                                $month = "December";
                            }
                               echo "['".$month."', ".$row["totalsales"]."],";  
                          }  
                          ?>  
                     ]);
        var options = {
          title: 'Monthly Sales',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chartContainer2'));
        chart.draw(data, options);
      }
      function pieChart() {
var data = google.visualization.arrayToDataTable([
  ['Rating Level', 'Total'],
  <?php
    echo "['5', ".$count5."], 
        ['4', ".$count4."],
        ['3', ".$count3."],
        ['2', ".$count2."],
        ['1', ".$count1."],"; 
     
    ?>
    
]);
var options = {
  title: 'My Car Ratings'
};
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data, options);
}
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
                                <?php 
                                $totalQuery = "SELECT COUNT(r.rentID) AS totalcount, rr.owner_email   FROM rentals r JOIN reservation_requests rr ON r.reqID = rr.reqID 
                                WHERE rr.owner_email = '".$email."'";
                                $result1 = mysqli_query($con,$totalQuery);
                                if($result1 = $con->query($totalQuery)){
                                    if ($result1->num_rows > 0) { 
                                        while($row = $result1->fetch_assoc()) {
                                         $totalcount = $row['totalcount'];
                                        }
                                    }
                                }

                                $salesQuery = "SELECT SUM(a.amount) AS totalsales, rr.owner_email   FROM auditsales a JOIN rentals r ON a.rentID = r.rentID JOIN reservation_requests  rr ON r.reqID = rr.reqID 
                                WHERE rr.owner_email = '".$email."'  AND a.month = month(current_date())";
                                $result3= mysqli_query($con,$salesQuery);
                                if($result3 = $con->query($salesQuery)){
                                    if ($result3->num_rows > 0) { 
                                        while($row = $result3->fetch_assoc()) {
                                         $totalsales = $row['totalsales'];
                                        }
                                    }
                                }
                                    
                                        
                                   
                                
                                $cancelQuery = "SELECT COUNT(rentID) AS cancelcount FROM audit_cancel WHERE 
                                owner_email = '".$email."'";
                                    $result2 = mysqli_query($con,$cancelQuery);
                                    if($result2 = $con->query($cancelQuery)){
                                        if ($result2->num_rows > 0) { 
                                            while($row = $result2->fetch_assoc()) {
                                             $cancelcount = $row['cancelcount'];
                                            }
                                        }
                                    }
                                $cancelrate = ($cancelcount / $totalcount) * 100;
                            
                                    
                            ?>
                                    <h4 class="mb-20 list-inline-item top-link"><span>Cancellation Rate</span></h4>
                                    <h1 class="mb-20 top-link"><span> <?php echo round($cancelrate,2) ?> %  </span></h1>
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
                                    <h1 class="mb-20 top-link"><span>P <?php echo round($totalsales,2) ?></span></h1>
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
                                    <h1 class="mb-20 top-link"><span> <?php echo $totalcount?></span></h1>
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
                            <div id="piechart" style="height: 370px; width: 100%;"></div> 
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