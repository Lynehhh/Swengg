<?php 
session_start();
require_once("connection.php");
$carID = $_SESSION['carID'];
if(isset($_POST['Approve'])){
    $reqID =$_POST['Approve'];
    
   
    $approveQuery = " UPDATE reservation_requests
                       SET ref_req_status = 'Approved'
                       WHERE reqID = $reqID";
                                if(mysqli_query($con,$approveQuery)){
                                    header("location:stransactions_pending_requests.php");
                                   
                                }
                                else{
                                    $errormessage = mysqli_error($con);
                                    echo $errormessage;                                        }   
   

}   
else if(isset($_POST['Deny'])){
    $reqID =$_POST['Deny'];
    $deniedQuery = " UPDATE reservation_requests
                       SET ref_req_status = 'Denied'
                       WHERE reqID = $reqID";
                                if(mysqli_query($con,$deniedQuery)){
                                   header("location:stransactions_pending_requests.php");
                                        }
                                else{
                                    header("location:stransactions_pending_requests.php");
                                        }
}   

                           
    
            ?>
