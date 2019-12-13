<?php
session_start();
require_once("connection.php");
if(isset($_POST['upgrade'])){

 if($_SESSION['user_type']== "Renter" ){
   $email = $_SESSION['email'];
   $updateQuery =" UPDATE users 
   SET usertype = 'Owner'
   WHERE email = '".$email."'";

if(mysqli_query($con,$updateQuery)) { 
    $_SESSION['user_type'] = "Owner";
    $alert= "Successfully Upgraded Account";
     header("location:update_profile.php");
    echo "<script language='javascript'>";
    echo "alert('.$alert.')";
    echo '</script>';
}
else { 
    $errormessage = mysqli_error($con);
    echo $errormessage;
}

 }
 else{
    header("location:update_profile.php");


 }

}
   ?>