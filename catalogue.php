<?php session_start(); 
require_once("connection.php");
?>
<html>
    <body>
        
        <!-- SEARCH -->
        <form method="get">
            <input type="text" name="searchtxt" placeholder="What are you looking for (Search by brand, name, car type)">
            <button type="submit" name="search">Search Now</button>
        </form>
        
        <!-- SORT -->
        <form method="get">
            <select name="sortby">
                <option value="price asc">Lowest Price</option>
                <option value="price desc">Highest Price</option>
            </select>
            <button type="submit" name="apply">Apply</button>
        </form>
        
        <!-- FILTER -->
        <form method="get">
            Price Range:<br>
            <input name="price_min" type="text" placeholder="Min">-<input name="price_max" type="text" placeholder="Max"><br><br>
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
        
        <?php

            //if napress yung "search" button dito pupunta
            if (isset($_GET['search'])){
                
                //if walang laman yung searchtxt na input box, dito papasok
                if (empty($_GET['searchtxt'])){
                    $_SESSION['sort_status']="no";
                    $_SESSION['filter_status']="no";
                    $_SESSION['search_status']="no";
                    
                    
                    $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue order by price asc";

                }
                
                //if may laman naman yung searchtxt na input box, dito papasok
                else{
                    $_SESSION['search_status']="yes";
                    $_SESSION['searchtxt']=$_GET['searchtxt'];
                    
                    if ($_SESSION['sort_status']=="yes"){
                        
                        if ($_SESSION['filter_status']=="yes"){
                            $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                        }
                        
                        else{
                            $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%' order by ".$_SESSION['sortby'];
                        }
                        
                    }
                    
                    else{
                        
                        if ($_SESSION['filter_status']=="yes"){
                            $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].")order by price asc";
                        }
                        
                        else{
                            $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%' order by price asc";
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
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    
                    else{
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%' order by ".$_SESSION['sortby'];
                    }
                    
                }
                
                else{
                    
                    if($_SESSION['filter_status'] == 'yes'){
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    
                    else{
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue order by ".$_SESSION['sortby'];
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
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    else{
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where (brand like '%".$_SESSION['searchtxt']."%' or car_type like '%".$_SESSION['searchtxt']."%' or name like '%".$_SESSION['searchtxt']."%') and price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by price asc";
                    }
                }
                else{
                    if($_SESSION["sort_status"]=="yes"){
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where price>=".$_SESSION['price_min']."' and price<=".$_SESSION['price_max']." and (fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by ".$_SESSION['sortby'];
                    }
                    else{
                        $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue where price>=".$_SESSION['price_min']." and price<=".$_SESSION['price_max']." and f(fuel_type=".$_SESSION['fuel_type'].") and (seater>=".$_SESSION['seater'].") and (city=".$_SESSION['location'].") order by price asc";
                    }
                }
            }
        
            //if wala kang pinindot na button, dito ka papasok
            else{
                //ito magiging sql code niya
                $sql="select carID, fuel_type, seater, price, location, name, city from view_catalogue order by price asc";
                $_SESSION['sort_status']="no";
                $_SESSION['filter_status']="no";
                $_SESSION['search_status']="no";
            }
            
            echo "<h1>CATALOGUE</h1><br>";
            echo "<table>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Fuel Type</th>
                            <th>Seats</th>
                            <th>Price</th>
                            <th>Location</th>
                            <th></th>
                        </tr>";
        
            if($result = $con->query($sql)){
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                    echo    "<tr>
                                <td><img src='".$row["location"]."' style='width:128px;height:128px;'></td>
                                <td>".$row["name"]."</td>
                                <td>".$row["fuel_type"]."</td>
                                <td>".$row["seater"]."</td>
                                <td>".$row["price"]."</td>
                                <td>".$row["city"]."</td>
                                <td><form method='get' action='viewcar.php'><button name='searched_car' value='".$row["carID"]."'>See More</button></form></td>
                            </tr>";
                    }
                    echo "</table>";
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
    </body>
</html>