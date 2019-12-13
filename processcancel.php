<?php 
session_start();
require_once("connection.php");
if(isset($_POST['Cancel'])){
    $rentID =$_POST['Cancel'];

    $cancelQuery = "UPDATE rentals 
    SET status = 'Cancelled' 
    WHERE rentID = $rentID";

if(mysqli_query($con,$cancelQuery)) { 
    $alert= "successfully cancelled rental";
     header("location:stransactions_pending_payments.php");
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