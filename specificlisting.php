<?php
session_start(); 
require_once('connection.php');

if(isset($_POST['view']))
{
    $email = $_SESSION['email'];
    echo $email;
    $carID = $_POST['view'];
    $_SESSION['carID'] = $carID; 
}


    
    $query="    SELECT ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability, c.description 
                FROM catalogue c JOIN car_images ci ON c.carID = ci.carID 
                WHERE c.owner_email ='".$_SESSION['email']."' AND c.carID = '".$_SESSION['carID']."'";

			$result =  $con->query($query);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $brand = $row['brand'];
                $car_type = $row['car_type'];
                $fuel_type = $row['fuel_type'];
                $seater = $row['seater'];
                $price = $row['price'];
                $availability = $row['availability'];
                $description = $row['description'];
                $_SESSION['name'] = $name; 
                $_SESSION['brand'] = $brand; 
                $_SESSION['car_type'] = $car_type; 
                $_SESSION['fuel_type'] = $fuel_type; 
                $_SESSION['seater'] = $seater; 
                $_SESSION['price'] = $price; 
                $_SESSION['availability'] = $availability; 
                $_SESSION['description'] = $description; 

                

               echo "<img src =" . $row['location'] . " height ='150px;' width = '150px;'>";
               

            }
        }
               echo "<br><label> Name: </label>" . $name. "<br>";
               echo "<label> Brand: </label>" . $brand . "<br>";
               echo "<label> Car Type: </label>" . $car_type . "<br>";
               echo "<label> Fuel Type: </label>" . $fuel_type . "<br>";
               echo "<label> Seater: </label>" . $seater . "<br>";
               echo "<label> Price: </label>" . $price . "<br>";
               echo "<label> Availability: </label>" . $availability . "<br>";
               echo "<label> Description: </label>" . $description . "<br>";
               echo "<form method = 'post' action = '' >";
               echo "<input type = 'submit' name = 'edit'  value = 'edit' formaction =  'editlisting.php'>";
               echo "<input type = 'submit' name = 'back'  value = 'back' formaction =  'viewlistings.php'>";

               echo "</form>";






?>