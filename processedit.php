<?php 
session_start();
require_once("connection.php");
if(isset($_POST['update'])){

   $carID = $_SESSION['carID'];
    if(empty($_POST['carname'])){
        $name =  $_SESSION['name'];
        $_SESSION['name'] = $name; 

    }
    else{
        $name = $_POST['carname'];
        $_SESSION['name'] = $name; 

    }

    if(empty($_POST['brand'])){
        $brand =  $_SESSION['brand'];
        $_SESSION['brand'] = $brand; 

    }
    else{
        $brand = $_POST['brand'];
        $_SESSION['brand'] = $brand; 

    }

    if(empty($_POST['car_type'])){
        $car_type =  $_SESSION['car_type'];
        $_SESSION['car_type'] = $car_type; 

    }
    else{
        $fuel_type = $_POST['fuel_type'];
        $_SESSION['fuel_type'] = $fuel_type; 

    }

    if(empty($_POST['price'])){
        $price =  $_SESSION['price'];
        $_SESSION['price'] = $price; 

    }
    else{
        $price = $_POST['price'];
        $_SESSION['price'] = $price; 

    }

    if(empty($_POST['availability'])){
        $availability =  $_SESSION['availability'];
        $_SESSION['availability'] = $availability; 

    }
    else{
        $availability = $_POST['availability'];
        $_SESSION['availability'] = $availability; 

    }

    if(empty($_POST['description'])){
        $description =  $_SESSION['description'];
        $_SESSION['description'] = $description; 

    }
    else{
        $description = $_POST['description'];
        $_SESSION['description'] = $description; 

    }

    $updateListing = " UPDATE catalogue
    SET name = '".$_SESSION['name']."',
        brand = '".$_SESSION['brand']."' , 
        car_type = '".$_SESSION['car_type']."' , 
        fuel_type = '".$_SESSION['fuel_type']."' , 
        seater = '".$_SESSION['seater']."' , 
        price = '".$_SESSION['price']."' , 
        availability = '".$_SESSION['availability']."' , 
        description = '".$_SESSION['description']."' 
         WHERE carID = $carID";
             if(mysqli_query($con,$updateListing)){
                 header("location:slisting_details.php");
                     }
             else{
                $errormessage = mysqli_error($con);
                echo $errormessage;
                // header("location:viewlistings.php?message=Error in cancellation. Please try again.");
                     }
    



}
?>
