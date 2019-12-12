<?php 
session_start();
require_once("connection.php");
if(isset($_POST['delete'])){
    $carID =$_SESSION['carID'];
    $deleteQuery = " UPDATE catalogue 
                    SET availability = 'Removed'
                     WHERE carID = $carID ";
                                if(mysqli_query($con,$deleteQuery)){
                                    header("location:sviewlisting.php");
                                        }
                                else{
                                    header("location:sviewlisting.php");
                                        }
                                    }   
    /*$deleteImages = " DELETE FROM car_images WHERE carID = $carID ";
        if(mysqli_query($con,$deleteImages)){
            header("location:viewlistings.php");
        }
        else{
            header("location:viewlistings.php");
            }
 
    $deleteDocs = " DELETE FROM car_docs WHERE carID = $carID ";
        if(mysqli_query($con,$deletDocs)){
            header("location:sviewlisting.php");
        }
        else{
            header("location:sviewlisting.php");
            }                               
            */  
    
            ?>
