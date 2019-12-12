<!DOCTYPE html>
<?php session_start(); 
error_reporting(0);
require_once("connection.php");
if(isset($_POST['view']))
{
    $email = $_SESSION['email'];
    echo $email;
}
?>
<html lang="en">
<head>
<script>
            function set_todate(date) {
                document.getElementById("reserve_edate").disabled = false;
                document.getElementById("reserve_edate").setAttribute("min", date);
                document.getElementById("reserve_edate").setAttribute("value", date);
            }
            
            function show_price(sdate, edate, price){
                if(sdate > edate){
                    alert("Invalid dates. Please try again.");
                }
                else{
                    var date1 = new Date(sdate);
                    var date2 = new Date(edate);
                    var label = 'days';
                    var days = Math.floor((date2 - date1) / (1000*60*60*24) + 1);
                    
                    if(days == 1){
                        label = 'day';
                    }
                    var totalprice = price * days;
                    document.getElementById("price_area").innerHTML = "<table><tr><td>₱"+price+" x "+days+" "+label+"</td><td>₱"+totalprice+"</td></tr><tr><td><b>Total</b></td><td><b>₱"+totalprice+"</b></td></tr></table>";
                }
            }
        </script>
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
        .starrr{
            color: #f8d90f;
        }
        .fa-star{
            color: #f8d90f;
        }
        
        .fancyTab {
            text-align: center;
          padding:15px 0;
          background-color: #eee;
            box-shadow: 0 0 0 1px #ddd;
            top:15px;	
          transition: top .2s;
        }

        .fancyTab.active {
          top:0;
          transition:top .2s;
        }

        .whiteBlock {
          display:none;
        }

        .fancyTab.active .whiteBlock {
          display:block;
          height:2px;
          bottom:-2px;
          background-color:#fff;
          width:99%;
          position:absolute;
          z-index:1;
        }

        .fancyTab a {
            font-family: 'Source Sans Pro';
            font-size:1.65em;
            font-weight:300;
          transition:.2s;
          color:#333;
        }

        /*.fancyTab .hidden-xs {
          white-space:nowrap;
        }*/

        .fancyTabs {
            border-bottom:2px solid #ddd;
          margin: 15px 0 0;
        }

        li.fancyTab a {
          padding-top: 15px;
          top:-15px;
          padding-bottom:0;
        }

        li.fancyTab.active a {
          padding-top: inherit;
        }

        .fancyTab .fa {
          font-size: 40px;
            width:100%;
            padding: 15px 0 5px;
          color:#666;
        }

        .fancyTab.active .fa {
          color: #cfb87c;
        }

        .fancyTab a:focus {
            outline:none;
        }

        .fancyTabContent {
          border-color: transparent;
          box-shadow: 0 -2px 0 -1px #fff, 0 0 0 1px #ddd;
          padding: 30px 15px 15px;
          position:relative;
          background-color:#fff;
        }

        .nav-tabs > li.fancyTab.active > a, 
        .nav-tabs > li.fancyTab.active > a:focus,
        .nav-tabs > li.fancyTab.active > a:hover {
            border-width:0;
        }

        .nav-tabs > li.fancyTab:hover {
            background-color:#f9f9f9;
            box-shadow: 0 0 0 1px #ddd;
        }

        .nav-tabs > li.fancyTab.active:hover {
          background-color:#fff;
          box-shadow: 1px 1px 0 1px #fff, 0 0px 0 1px #ddd, -1px 1px 0 0px #ddd inset;
        }

        .nav-tabs > li.fancyTab:hover a {
            border-color:transparent;
        }

        .nav.nav-tabs .fancyTab a[data-toggle="tab"] {
          background-color:transparent;
          border-bottom:0;
        }

        .nav-tabs > li.fancyTab:hover a {
          border-right: 1px solid transparent;
        }

        .nav-tabs > li.fancyTab > a {
            margin-right:0;
            border-top:0;
          padding-bottom: 30px;
          margin-bottom: -30px;
        }

        .nav-tabs > li.fancyTab {
            margin-right:0;
            margin-bottom:0;
        }

        .nav-tabs > li.fancyTab:last-child a {
          border-right: 1px solid transparent;
        }

        .nav-tabs > li.fancyTab.active:last-child {
          border-right: 0px solid #ddd;
            box-shadow: 0px 2px 0 0px #fff, 0px 0px 0 1px #ddd;
        }

        .fancyTab:last-child {
          box-shadow: 0 0 0 1px #ddd;
        }

        .tabs .nav-tabs li.fancyTab.active a {
            box-shadow:none;
          top:0;
        }


        .fancyTab.active {
          background: #fff;
            box-shadow: 1px 1px 0 1px #fff, 0 0px 0 1px #ddd, -1px 1px 0 0px #ddd inset;
          padding-bottom:30px;
        }

        .arrow-down {
            display:none;
          width: 0;
          height: 0;
          border-left: 20px solid transparent;
          border-right: 20px solid transparent;
          border-top: 22px solid #ddd;
          position: absolute;
          top: -1px;
          left: calc(50% - 20px);
        }

        .arrow-down-inner {
          width: 0;
          height: 0;
          border-left: 18px solid transparent;
          border-right: 18px solid transparent;
          border-top: 12px solid #fff;
          position: absolute;
          top: -22px;
          left: -18px;
        }

        .fancyTab.active .arrow-down {
          display: block;
        }

        @media (max-width: 1200px) {

          .fancyTab .fa {
            font-size: 36px;
          }

          .fancyTab .hidden-xs {
            font-size:22px;
            }

        }


        @media (max-width: 992px) {

          .fancyTab .fa {
            font-size: 33px;
          }

          .fancyTab .hidden-xs {
            font-size:18px;
            font-weight:normal;
          }

        }


        @media (max-width: 768px) {

          .fancyTab > a {
            font-size:18px;
          }

          .nav > li.fancyTab > a {
            padding:15px 0;
            margin-bottom:inherit;
          }

          .fancyTab .fa {
            font-size:30px;
          }

          .nav-tabs > li.fancyTab > a {
            border-right:1px solid transparent;
            padding-bottom:0;
          }

          .fancyTab.active .fa {
            color: #333;
            }

        }
        
    </style>

</head>

<body class="body-wrapper">
    
    <?php include 'topbar.php' ?>

<!--=================================
=            Single Blog            =
==================================-->
    <div class="container mt-30" style="display: block;">
        
        
        <?php
          $query="    SELECT firstname, lastname, streetadd, city, birthday, usertype FROM users
                WHERE email ='".$_SESSION['email']."'";
			$result =  $con->query($query);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $address = $row['streetadd'];
                $city = $row['city'];
                $birthday = $row['birthday'];
                $usertype = $row['usertype'];
                $_SESSION['firstname'] = $firstname; 
                $_SESSION['lastname'] = $lastname; 
                $_SESSION['address'] = $address; 
                $_SESSION['city'] = $city; 
                $_SESSION['birthday'] = $birthday; 
                $_SESSION['user_type'] = $usertype;                
                    }
                }
        ?>
        <section class="">
            <form class="row">
                <div class="col-md-4 offset-md-1 col-lg-3 offset-lg-0 mt-30">
                    <div class="row">
                        <img src="images/user/user-thumb.jpg" style="width:auto;height:250px; border-radius: 50%;">
                        </div>
                </div>

                <div class="col-md-3 offset-md-1 col-lg-5 offset-lg-0" style="padding: 100px 0;">
                    <div class="justify-content-center mb-20 ">
                        <h2 class=""><?php echo $firstname; ?> <?php echo $lastname ?> <span style="display:inline-block; width: 18%;"></span> <i class="fa fa-star"></i> 5 Ratings</h2>
                        <h4 class="comunity-name mb-10"><?php echo $usertype ?></h4>
                        <h4 class="comunity-name"><i class="fa fa-birthday-cake"></i> <?php echo $birthday ?></h4>
                        <button formaction = "update_profile.php" class="btn btn-success mt-30" style="padding: 2% 10%;">Edit</button>
                    </div>
                </div>
                
                <div class="col-md-3 offset-md-1 col-lg-4 offset-lg-0" style="padding: 100px 0;">
                    <div class="justify-content-center mb-20 ">
                        <label class="comunity-name mb-20">Contact Information</label>
                        <h4 class="mb-10"><i class="fa fa-envelope"></i> <?php echo $email; ?></h4>
                        <h4 class="mb-10"><i class="fa fa-location-arrow"></i> <?php echo $city; ?></h4>
                        <h4 class="mb-10"><i class="fa fa-compass"></i> <?php echo $address; ?></h4>
                    </div>
                </div>

            </form>
            
            <div class="">
                <div class="widget">
                    <section id="fancyTabWidget" class="tabs t-tabs">
                        <ul class="nav nav-tabs fancyTabs" role="tablist">

                                    <li class="tab fancyTab active">
                                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>	
                                        <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-tag"></span><span class="hidden-xs">Renter</span></a>
                                        <div class="whiteBlock"></div>
                                    </li>

                                    <li class="tab fancyTab">
                                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                                        <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-users"></span><span class="hidden-xs">Owner</span></a>
                                        <div class="whiteBlock"></div>
                                    </li>
                        </ul>
                        <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                            <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">

                                <div class="row">

                                    <div class="col-md-12">
                                    <!-- TAB CONTENT START --> 
                                    <?php 
                                        if(isset($_GET['ownerprofile'])){
                                            $email = $_GET['ownerprofile'];

        $renterquery = "SELECT f.rentID, f.type, f.rating, f.comments, f.date, rr.renter_email, u.firstname , u.lastname   FROM feedback f LEFT JOIN rentals r ON f.rentID = r.rentID LEFT JOIN reservation_requests rr ON r.reqID = rr.reqID LEFT JOIN users u ON rr.owner_email = u.email
        WHERE rr.renter_email = 'lliam_sanchez@dlsu.edu.ph' AND f.type = 'Renter'";
                                        $result = mysqli_query($con, $renterquery);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) { ?>
                                    <div class="product-review">
                                        <div class="media">
                                            <!-- Avater -->
                                            <img src="images/user/user-thumb.jpg" alt="avater">
                                            <div class="media-body">
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="name">
                                                    <h5><?php echo  $row['firstname'] . " " . $row['lastname']?></h5>
                                                </div>
                                                <div class="date">
                                                    <p><?php echo $row['date']?></p>
                                                </div>
                                                <div class="review-comment">
                                                    <p>
                                                        <?php echo $row['comments']?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                        else{
                                           echo "0 Results";
                                        }  ?>
                                    <!-- TAB CONTENT END -->
                                    
                                    </div>
                                </div>
                            </div>
                                    <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <!-- TAB CONTENT START --> 
                                                    <?php 

                $ownerquery = "SELECT f.rentID, f.type, f.rating, f.comments, f.date, rr.owner_email, u.firstname , u.lastname   FROM feedback f LEFT JOIN rentals r ON f.rentID = r.rentID LEFT JOIN reservation_requests rr ON r.reqID = rr.reqID LEFT JOIN users u ON rr.renter_email = u.email
                WHERE rr.owner_email = 'lliam_sanchez@dlsu.edu.ph' AND f.type = 'Owner'";
                            $result1 = mysqli_query($con, $ownerquery);
                            if ($result1->num_rows > 0) {
                                while($row = $result1->fetch_assoc()) {
                                                    ?>
                                    <div class="product-review">
                                        <div class="media">
                                            <!-- Avater -->
                                            <img src="images/user/user-thumb.jpg" alt="avater">
                                            <div class="media-body">
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="name">
                                                    <h5><?php echo  $row['firstname'] . " " . $row['lastname']?></h5>
                                                </div>
                                                <div class="date">
                                                    <p><?php echo $row['date']?></p>
                                                </div>
                                                <div class="review-comment">
                                                    <p>
                                                        <?php echo $row['comments']?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                        else{
                                           echo "0 Results";
                                        } 
                                        }
                                        ?>
                                    <!-- TAB CONTENT END --> 

                                                </div>
                                            </div>
                                    </div>

                        </div>

                    </section>
                </div>

            </div>
        </section>
    </div>
    
    <script>
        $(document).ready(function() {
  

	  
    var numItems = $('li.fancyTab').length;
		
	
			  if (numItems == 12){
					$("li.fancyTab").width('8.3%');
				}
			  if (numItems == 11){
					$("li.fancyTab").width('9%');
				}
			  if (numItems == 10){
					$("li.fancyTab").width('10%');
				}
			  if (numItems == 9){
					$("li.fancyTab").width('11.1%');
				}
			  if (numItems == 8){
					$("li.fancyTab").width('12.5%');
				}
			  if (numItems == 7){
					$("li.fancyTab").width('14.2%');
				}
			  if (numItems == 6){
					$("li.fancyTab").width('16.666666666666667%');
				}
			  if (numItems == 5){
					$("li.fancyTab").width('20%');
				}
			  if (numItems == 4){
					$("li.fancyTab").width('25%');
				}
			  if (numItems == 3){
					$("li.fancyTab").width('33.3%');
				}
			  if (numItems == 2){
					$("li.fancyTab").width('50%');
				}
		  
	 

	
		});

$(window).load(function() {

  $('.fancyTabs').each(function() {

    var highestBox = 0;
    $('.fancyTab a', this).each(function() {

      if ($(this).height() > highestBox)
        highestBox = $(this).height();
    });

    $('.fancyTab a', this).height(highestBox);

  });
});
    </script>
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
