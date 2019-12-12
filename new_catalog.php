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
    </style>
</head>

<body class="body-wrapper">
    
<?php include 'topbar.php' ?>
    

<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">

<div class="widget filter">
    <form method="get">
        <h4 class="widget-header">Price</h4>
        <select class="mb-20" name="sortby">
            <option disabled="disabled" selected="selected">Select Price</option>
            <option value="price asc">Lowest Price</option>
            <option value="price desc">Highest Price</option>
        </select>
        <div class="form-group">
            <div class="col-md-2 offset-md-1 col-lg-6 offset-lg-0">
            </div>
            <button type="submit" name="apply"class="btn btn-primary" style="padding: 2% 7%;">Apply</button>
        </div>
        
    </form>	
</div>

<div class="widget filter">
	<h4 class="widget-header">Filter By</h4>
    
    <form method="get">
        
	<label class="card-title">Price Range</label>
        <div class="row mb-20">
            <div class="col-md-2 offset-md-1 col-lg-6 offset-lg-0">
                <input name="price_min" type="number" class="form-control" method="get" placeholder="Min" min="0"/> 
            </div>
            <div class="col-md-2 offset-md-1 col-lg-6 offset-lg-0">
                <input name="price_max" type="number" class="form-control" method="get" placeholder="Max" min="" />
            </div>
        </div>
    
    
    <div class="mb-20">
        <label class="card-title">Seater</label>
        <input name="seater" type="number" class="form-control" method="get" min="2" />
    </div>
    
    <label class="card-title">Location</label>
    <select class="mb-20" name="location">
        <option disabled="disabled" selected="selected" value="'' or 'a'='a'">Select Location</option>
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
    </select>
    
    <label class="card-title">Gas Type</label>
    <div class="mb-20">
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" name="fuel_type" value="'' or 'a'='a'" checked="checked">
             All Types
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" name="fuel_type" value="'Diesel'">
             Diesel
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" name="fuel_type" value="'Gas'">
             Gas
          </label>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-2 offset-md-1 col-lg-6 offset-lg-0">
        </div>
        <button type="submit" name="filter" class="btn btn-primary" style="padding: 2% 7%;">Filter</button>
    </div>
</div>

				</div>
			</div>
			<div class="col-md-9">
				<section class="page-search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advance Search -->
                                <div class="advance-search">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-9">
                                                <input type="text" name="searchtxt" class="form-control" id="inputtext4" placeholder="What are you looking for">
                                            </div>
                                            
                                            <div class="form-group col-md-2">
                                                <button type="submit" name="search" class="btn btn-primary">Search Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <?php
            //if napress yung "search" button dito pupunta
            if(isset($_GET['homesearch'])){
                
                if(empty($_GET['seater'])){
                    $_GET['seater'] = "'' or 'a'='a'";
                }
                if(empty($_GET['car_type'])){
                    $_GET['car_type'] = "'' or 'a'='a'";
                }
                if(empty($_GET['fuel_type'])){
                    $_GET['fuel_type'] = "'' or 'a'='a'";
                }
                $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where
                 availability='Available' AND (fuel_type=".$_GET['fuel_type'].") and (seater>=".$_GET['seater'].") and oemail <> '".$_GET['email']."' and brand like '%".$_GET['brand']."%' AND (car_type=".$_GET['car_type'].") ";
                
            }
            else{
            if (isset($_GET['search'])){
                
                //if walang laman yung searchtxt na input box, dito papasok
                if (empty($_GET['searchtxt'])){
                    $_SESSION['sort_status']="no";
                    $_SESSION['filter_status']="no";
                    $_SESSION['search_status']="no";
                    
                    
                    $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue WHERE availability='Available' AND oemail <> '".$_SESSION['email']."' order by price asc";
                }
                
                //if may laman naman yung searchtxt na input box, dito papasok
                else{
                    $_SESSION['search_status']="yes";
                    $_SESSION['searchtxt']=$_GET['searchtxt'];
                    
                    if ($_SESSION['sort_status']=="yes"){
                        
                        if ($_SESSION['filter_status']=="yes"){
                            $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where ((brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                        }
                        
                        else{
                            $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                        }
                        
                    }
                    
                    else{
                        
                        if ($_SESSION['filter_status']=="yes"){
                            $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where ((brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by price asc";
                        }
                        
                        else{
                            $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by price asc";
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
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where ((brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                    }
                    
                    else{
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                    }
                    
                }
                
                else{
                    
                    if($_SESSION['filter_status'] == 'yes'){
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where (price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                    }
                    
                    else{
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue WHERE availability='Available' AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
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
                   
                if(empty($_GET['location'])){
                    $_SESSION['location'] = "'' or 'a'='a'";
                }
                else{
                    $_SESSION['location']=$_GET['location'];
                }
                
                if($_SESSION['search_status']=="yes"){
                    if($_SESSION["sort_status"]=="yes"){
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where availability='Available' AND ((brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                    }
                    else{
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where availability='Available' AND ((brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND oemail <> '".$_SESSION['email']."' order by price asc";
                    }
                }
                else{
                    if($_SESSION["sort_status"]=="yes"){
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where availability='Available' AND (price>=".$_SESSION['price_min']."' and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND oemail <> '".$_SESSION['email']."' order by ".$_SESSION['sortby'];
                    }
                    else{
                        $sql="select ofirst_name, oemail, brand, carID, fuel_type, seater, price, location, name, city from view_catalogue where (price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")) AND availability='Available' AND oemail <> '".$_SESSION['email']."' order by price asc";
                    }
                }
            }
        
            //if wala kang pinindot na button, dito ka papasok
            else{
                //ito magiging sql code niya
                $sql="select ofirst_name, brand, oemail, carID, fuel_type, seater, price, location, name, city from view_catalogue WHERE availability='Available' AND oemail <> '".$_SESSION['email']."' order by price asc";
                $_SESSION['sort_status']="no";
                $_SESSION['filter_status']="no";
                $_SESSION['search_status']="no";
            }
        }    
            echo '<div class="product-grid-list">
					<div class="row mt-30">';
            if($result = $con->query($sql)){
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                         echo '<div class="col-sm-12 col-lg-4 col-md-6 d-flex align-items-stretch">
							<!-- product card -->
<form class="product-item bg-light" method="get" action=>
	<div class="card">
		<div class="thumb-content" style="width: auto; height: 200px;">
			<!-- <div class="price">$200</div> -->
			<a href="#">
				<img class="card-img-top img-fluid" src="'.$row["location"].'" alt="Card image cap" style="width: auto; height: 200px;">
			</a>
		</div>
		<div class="card-body"  style="height: 100%;">
		    <button name ="searched_car" formaction = "car_details.php" style = "background-color: Transparent; background-repeat:no-repeat; border: none; overflow: hidden; outline:none;" value="'.$row["carID"].'"><h3 class="card-title" style="color: #28a745;">'.$row["name"].'</h3></button>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
                <button name ="ownerprofile" formaction = "viewfeedback.php" style = "background-color: Transparent; background-repeat:no-repeat; border: none; overflow: hidden; outline:none;" value="'.$row["oemail"].'"><h5 class="card-title" style="color: #28a745;">'.$row["ofirst_name"].'</h5></button>
		    	</li>
		    	<li class="list-inline-item">
		    		<i class="fa fa-location-arrow"></i> '.$row["city"].'
		    	</li>
		    </ul>
		    <div class="#">
		    	<h4 class="card-text text-center">'.$row["price"].'</h4>
		    </div>
		</div>
	</div>
</form>
						</div>';
                    }
                } 
                
                }
        else{
            echo "0 results";
        }
echo'</div>
				</div>';
        ?>
                
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
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