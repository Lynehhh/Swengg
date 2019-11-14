<?php 
session_start();
require_once("connection.php");
if(isset($_POST['submit'])){
    $rentID =$_SESSION['rentID'];
    $total_amount = $_SESSION['total_amount'];
    $approveQuery = " UPDATE rentals
                       SET status = 'Pending Use',
                           paid_amount = $total_amount, 
                           payment_date = now()
                       WHERE rentID = $rentID";
                                if(mysqli_query($con,$approveQuery)){
                                    header("location:viewpendingpayments.php");
                                        }
                                else{
                                    header("location:viewpendingpayments.php");
                                        }
}   



                           
    
            ?>