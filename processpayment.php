<?php 
session_start();
require_once("connection.php");
if(isset($_POST['submit'])){

    $cardnumber=$_POST['cardnumber'];
    $cardtype = $_POST['cardtype'];
    $cardholder = $_POST['cardholder'];
    $expiry =$_POST['expiry'];

    if(empty($cardnumber) || empty($cardtype) || empty($cardholder) || empty($expiry)){
        header("location:payment.php?message=Cannot leave fields blank");
    }
    else{
    $rentID =$_SESSION['rentID'];
    $total_amount = $_SESSION['total_amount'];
    $approveQuery = " UPDATE rentals
                       SET status = 'Pending Use',
                           paid_amount = $total_amount, 
                           payment_date = now()
                       WHERE rentID = $rentID";
                                if(mysqli_query($con,$approveQuery)){
                                    header("location:btransaction_pending_payments.php");
                                        }
                                else{
                                    header("location:btransaction_pending_payments.php");
                                        }
}   

}


                           
    
            ?>