<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start(); 
require_once('connection.php');
?>

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
		<div class="row">
			<?php include 'topbar.php';?>
		</div>
	</div>
</section>
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form method = get>
						<div class="form-row">
							<div class="form-group col-md-10">
								<input type="text" name="searchtxt" class = "form-control" placeholder="What are you looking for (Search by brand, name, car type)">
							</div>
							<div class="form-group col-md-2">
								<button type="submit" class="btn btn-primary" name = "search">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">

<div class="widget category-list">
	<h4 class="widget-header">Sort by</h4>
	
        <form method="get">
            <select name="sortby">
                <option value="price asc">Lowest Price</option>
                <option value="price desc">Highest Price</option>
            </select>
            <button type="submit" name="apply">Apply</button>
        </form>
        
         <form method="get">
            Price Range:<br>
            <input name="price_min" type="text" placeholder="Min" style="width: 70px">  -  <input name="price_max" type="text" placeholder="Max" style="width: 73px"><br><br>
            Fuel Type:<br>
            <input type="radio" name="fuel_type" value="'' or 'a'='a'" checked="checked">All Types<br>
            <input type="radio" name="fuel_type" value="'Diesel'"> Diesel<br>
            <input type="radio" name="fuel_type" value="'Gas'"> Gas<br><br>
            Seater: <input name="seater" type="text"><br><br>
            Location:<br>
            <select name="location">
              <option value="'' or 'a'='a'"></option>
              <option value="'Caloocan'">Caloocan</option>
              <option value="'Las Piñas'">Las Piñas</option>
              <option value="'Makati'">Makati</option>
              <option value="'Malabon'">Malabon</option>
              <option value="'Mandaluyong'">Mandaluyong</option>
              <option value="'Manila'">Manila</option>
              <option value="'Marikina'">Marikina</option>
              <option value="'Muntinlupa'">Muntinlupa</option>
              <option value="'Navotas'">Navotas</option>
              <option value="'Parañaque'">Parañaque</option>
              <option value="'Pasay'">Pasay</option>
              <option value="'Pasig'">Pasig</option>
              <option value="'Pateros'">Pateros</option>
              <option value="'Quezon'">Quezon</option>
              <option value="'San Juan'">San Juan</option>
              <option value="'Taguig'">Taguig</option>
              <option value="'Valenzuela'">Valenzuela</option>
            </select><br><br>
            <button type="submit" name="filter">Filter</button>
        </form>
	
</div>


				</div>
			</div>
            <?php
            if(isset($_POST['search']))
{
    if(empty($_POST['brand'])){
        $_SESSION['brand'] =  "'' or 'a'='a'";
    }
    else{
        $brand = $_POST['brand'];
        $_SESSION['brand'] = "'".$brand."'"; 

    }

    if(empty($_POST['car_type'])){
        $_SESSION['car_type'] =  "'' or 'a'='a'";
    }
    else{
        $car_type = $_POST['car_type'];
        $_SESSION['car_type'] = "'".$car_type."'"; 

    }

    if(empty($_POST['fuel_type'])){
        $_SESSION['fuel_type'] = "'' or 'a'='a'";
    }
    else{
        $fuel_type = $_POST['fuel_type'];
        $_SESSION['fuel_type'] = "'".$fuel_type."'"; 

    }

    if(empty($_POST['seater'])){
        $_SESSION['seater'] =  "'' or 'a'='a'";
    }
    else{
        $seater = $_POST['seater'];
        $_SESSION['seater'] = "'".$seater."'"; 

    }

    $sql = "select carID, brand, fuel_type, seater, price, location, name, city from view_catalogue WHERE (brand  = ".  $_SESSION['brand'].") AND (car_type  = ".  $_SESSION['car_type'].") AND (fuel_type  = ".  $_SESSION['fuel_type'].")  AND (seater  = ".  $_SESSION['seater'].") order by price asc";
}  
            else{
                //if napress yung "search" button dito pupunta
            if (isset($_GET['search'])){
                
                //if walang laman yung searchtxt na input box, dito papasok
                if (empty($_GET['searchtxt'])){
                    $_SESSION['sort_status']="no";
                    $_SESSION['filter_status']="no";
                    $_SESSION['search_status']="no";
                    
                    
                    $sql="select carID, brand, fuel_type, seater, price, location, name, city from view_catalogue order by price asc";
                }
                
                //if may laman naman yung searchtxt na input box, dito papasok
                else{
                    $_SESSION['search_status']="yes";
                    $_SESSION['searchtxt']=$_GET['searchtxt'];
                    
                    if ($_SESSION['sort_status']=="yes"){
                        
                        if ($_SESSION['filter_status']=="yes"){
                            $sql="select carID, brand, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                        }
                        
                        else{
                            $sql="select carID, brand, fuel_type, seater, price, location, name, city from view_catalogue where brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%' order by ".$_SESSION['sortby'];
                        }
                        
                    }
                    
                    else{
                        
                        if ($_SESSION['filter_status']=="yes"){
                            $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")order by price asc";
                        }
                        
                        else{
                            $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%' order by price asc";
                        }
                        
                    }
                }
            }
        
            //if napress yung "apply" button dito pupunta
            elseif (isset($_GET['apply'])){
                $_SESSION['sort_status']="yes";
                $_SESSION['sortby']=$_GET['sortby'];
                
                if($_SESSION['search_status']=='yes'){
                    
                    if($_SESSION['filter_status'] == 'yes'){
                        $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    
                    else{
                        $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%' order by ".$_SESSION['sortby'];
                    }
                    
                }
                
                else{
                    
                    if($_SESSION['filter_status'] == 'yes'){
                        $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    
                    else{
                        $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue order by ".$_SESSION['sortby'];
                    }
                    
                } 
            }
            
            elseif (isset($_GET['filter'])){
                $_SESSION['filter_status']="yes";
                
                //setting the price_min
                if(empty($_GET['price_min'])){
                    $_SESSION['price_min']=0.00;
                }
                else{
                    $_SESSION['price_min']=$_GET['price_min'];
                }
                
                //setting the price max
                if(empty($_GET['price_max'])){
                    $_SESSION['price_max']=1000000000.00;
                }
                else{
                    $_SESSION['price_max']=$_GET['price_max'];
                }
                
                $_SESSION['fuel_type']=$_GET['fuel_type'];
                
                if(empty($_GET['seater'])){
                    $_SESSION['seater'] = "'' or 'a'='a'";
                }
                else{
                    $_SESSION['seater']=$_GET['seater'];
                }
                   
                $_SESSION['location']=$_GET['location'];
                
                if($_SESSION['search_status']=="yes"){
                    if($_SESSION["sort_status"]=="yes"){
                        $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    else{
                        $sql="select carID, fuel_type, brand, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by price asc";
                    }
                }
                else{
                    if($_SESSION["sort_status"]=="yes"){
                        $sql="select carID, fuel_type, brand, brand, seater, price, location, name, city from view_catalogue where price>=".$_SESSION['price_min']."' and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    else{
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and f(fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by price asc";
                    }
                }
            }
        
            //if wala kang pinindot na button, dito ka papasok
            else{
                //ito magiging sql code niya
                $sql="select carID,brand ,fuel_type ,seater, price, location, name, city from view_catalogue order by price asc";
                $_SESSION['sort_status']="no";
                $_SESSION['filter_status']="no";
                $_SESSION['search_status']="no";
            }
            }
            
            ?>
            
			<div class="col-md-9">
				<div class="product-grid-list">
					<div class="row mt-30">
                        <!-- Insert the loop here -->
                        <?php 
                if($result = $con->query($sql)){
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
						echo "<div class='col-sm-12 col-lg-4 col-md-6'>                          
<div class='product-item bg-light'>
	<div class='card'>
		<div class='thumb-content'>
                ";
                    echo    "<img src='".$row["location"]."' style='width:128px;height:128px;'> <br>
                            <i class='fas fa-car'></i>".$row["name"]. "<br>"
                            .$row["brand"]. "<br>"
                            .$row["fuel_type"]. "<br>"
                            .$row["seater"]. "<br>"
                            .$row["price"]. "<br>"
                            .$row["city"]. "<br>"
                            ."<form method='get' action='viewcar.php'><button name='searched_car' value='".$row["carID"]."'>See More</button></form>";
                    }
                }
                    else {
                    echo "</table>";
                    echo "0 results";
                    }
                }
                        else{
            echo "</table>";
            echo "0 results";
                        }
                            ?>

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
