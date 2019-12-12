<?php 
session_start();
require_once("connection.php");
if(isset($_POST['cancel_reserve'])){
    $reqID =$_POST['cancel_reserve'];

    $cancelQuery = "UPDATE reservation_requests 
    SET ref_req_status = 'Denied' 
    WHERE reqID = $reqID";

if(mysqli_query($con,$cancelQuery)) { 
    $alert= "successfully cancelled request";
     header("location:transactions_pending_requests.php");
    echo "<script language='javascript'>";
    echo "alert('.$alert.')";
    echo '</script>';
}
else { 
    $errormessage = mysqli_error($con);
    echo $errormessage;
}
}
?>