<?php 
session_start();
require_once("connection.php");
if(isset($_POST['submit'])){
    $rentID =$_SESSION['rentID'];


    $cardnumber=$_POST['cardnumber'];
    $cardtype = $_POST['cardtype'];
    $cardholder = $_POST['cardholder'];
    $expiry =$_POST['expiry'];

    if(empty($cardnumber) || empty($cardtype) || empty($cardholder) || empty($expiry)){
        header("location:payment.php?message=Cannot leave fields blank");
    }
    else{
    $total_amount = $_SESSION['total_amount'];
    $approveQuery = " UPDATE rentals
                       SET status = 'Pending Use',
                           paid_amount = $total_amount, 
                           payment_date = now()
                       WHERE rentID =". $rentID;
                                if(mysqli_query($con,$approveQuery)){
                                    header("location:btransaction_pending_payments.php");
                                        }
                                else{
                                    $alert = mysqli_error($con);
                                    echo $con;
                                  // header("location:btransaction_pending_payments.php");
                                        }
}   

}


                           
    
            ?>