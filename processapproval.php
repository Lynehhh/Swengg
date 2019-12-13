<?php 
session_start();
require_once("connection.php");
if(isset($_POST['Approve'])){
    $reqID =$_POST['Approve'];
    
    $sql = "select carID from reservation_requests where reqID = $reqID";
    if($result5 = $con->query($sql)){
        if ($result5->num_rows > 0) { 
            while($row = $result5->fetch_assoc()) {
                $carID = $row['carID'];
            }
        }
    }
    
    $approveQuery = " UPDATE reservation_requests
                       SET ref_req_status = 'Approved'
                       WHERE reqID = $reqID";
    $denyQuery = " UPDATE reservation_requests
                       SET ref_req_status = 'Denied'
                       WHERE ref_req_status = 'Pending' and carID = $carID";
                                if(mysqli_query($con,$approveQuery)){
                                    if(mysqli_query($con,$denyQuery)){
                                        header("location:stransactions_pending_requests.php");
                                    }
                                    
                                }
                                else{
                                    header("location:stransactions_pending_requests.php");
                                        }
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
