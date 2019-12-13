<?php 
session_start();
require_once("connection.php");
if(isset($_POST['update'])){

   $email = $_SESSION['email'];
    if(empty($_POST['firstname'])){
        $firstname =  $_SESSION['firstname'];
        $_SESSION['firstname'] = $firstname; 

    }
    else{
        $firstname = $_POST['firstname'];
        $_SESSION['firstname'] = $firstname; 

    }

    if(empty($_POST['lastname'])){
        $lastname =  $_SESSION['lastname'];
        $_SESSION['lastname'] = $lastname; 

    }
    else{
        $lastname = $_POST['lastname'];
        $_SESSION['lastname'] = $lastname; 

    }

    if(empty($_POST['email'])){
        $email =  $_SESSION['email'];
        $_SESSION['email'] = $email; 

    }
    else{
        $email = $_POST['email'];
        $_SESSION['email'] = $email; 

    }

    if(empty($_POST['address'])){
        $address =  $_SESSION['address'];
        $_SESSION['address'] = $address; 

    }
    else{
        $address = $_POST['address'];
        $_SESSION['address'] = $address; 

        echo $_SESSION['address'];
         

    }

    if(empty($_POST['city'])){
        $city =  $_SESSION['city'];
        $_SESSION['city'] = $city; 

    }
    else{
        $city = $_POST['city'];
        $_SESSION['city'] = $city; 

         

    }

  

    $updateProfile = " UPDATE users
    SET firstname = '".$_SESSION['firstname']."',
        lastname = '".$_SESSION['lastname']."' , 
        email = '".$_SESSION['email']."' , 
        streetadd = '".$_SESSION['address']."' , 
        city = '".$_SESSION['city']."' 
         WHERE email = '".$_SESSION['email']."' ";
             if(mysqli_query($con,$updateProfile)){
                 header("location:viewprofile.php");
                     }
             else{
                $errormessage = mysqli_error($con);
                echo $errormessage;
                // header("location:viewlistings.php?message=Error in cancellation. Please try again.");
                     }

 
    



}
?>