<?php 
require_once('connection.php');
session_start();
if (isset($_POST['submit'])){

    $email = $_SESSION['email'];
    echo $email;
    $carIDquery = ("SELECT count(carID) AS COUNT FROM catalogue ");
    $carResult =  $con->query($carIDquery);
    if ($carResult->num_rows > 0) {

        while($row = $carResult->fetch_assoc()) {
            $carID= $row['COUNT'] + 1;
            $_SESSION['carID'] = $carID;
            echo "Car ID: " .  $_SESSION['carID'] . "<br>";
            }
        } else {
            echo "0 results";
            }

$carname=$_POST['carname'];
$brand = $_POST['brand'];
$carType = $_POST['carType'];
$fuelType =$_POST['fuelType'];
$seater= $_POST['seater'];
$price= $_POST['price'];
//$imagename=$_FILES["image"]["name"]; 
//$imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
$description= $_POST['description'];

foreach ($_FILES['files']['name'] as $key => $name){
 
    $newFilename = time() . "_" . $name;
    move_uploaded_file($_FILES['files']['tmp_name'][$key], 'uploads/' . $newFilename);
    $location = 'uploads/' . $newFilename;
    $insert_image = "INSERT INTO car_images (carID, location) VALUES ('".$_SESSION['carID']."', '".$location."')";
    if(mysqli_query($con,$insert_image)){
        header("message=Successfully added new records");
        }
        else{
            $errormessage = mysqli_error($con);
            echo $errormessage;
            
        }
}

foreach ($_FILES['docs']['name'] as $key2 => $name2){
 
    $newFilename2 = time() . "_" . $name2;
    move_uploaded_file($_FILES['docs']['tmp_name'][$key2], 'uploads/' . $newFilename2);
    $location2 = 'uploads/' . $newFilename2;
    $insert_doc = "INSERT INTO car_docs (carID, location) VALUES ('".$_SESSION['carID']."', '".$location2."')";
    if(mysqli_query($con,$insert_doc)){
        header("message=Successfully added new records");
        }
        else{
            $errormessage = mysqli_error($con);
            echo $errormessage;
            
        }
}

$insert_image="INSERT INTO catalogue (owner_email,brand, car_type, fuel_type, name, seater, description,  price, availability)
 VALUES('".$email."', '".$brand."', '".$carType."', '".$fuelType."', '".$carname."', '".$seater."', '".$description."',  '".$price."', 'Available')";
    
    if(mysqli_query($con,$insert_image)){
        header("location:listing.php?message=Successfully added new records");
        }
        else{
            $errormessage = mysqli_error($con);
            echo $errormessage;
            
        }

  

  
    
}    
?>
