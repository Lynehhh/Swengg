<?php
session_start();
require_once('connection.php');
                        // PALITAN SESSION NAME
                        if(empty($_SESSION['email'])){
                            // SA LOGIN PAGE 
                            header('location:login.php');
                        }
                        else{
                            $sql = "INSERT INTO reservation_requests (req_date, date_use, date_return, renter_email, owner_email, carID, totalPrice, ref_req_status) VALUES (now(), '".$_SESSION['sdate']."', '".$_SESSION['edate']."', '".$_SESSION['email']."', '".$_SESSION['owner_email']."', ".$_SESSION['searched_car'].", (datediff('".$_SESSION['edate']."', '".$_SESSION['sdate']."')+1)*".$_SESSION['price'].", 'Pending')";
                            
                            $result = $con->query($sql);
                            
                            if($result === true){
                                header('location:btransaction_pending_request.php');
                            }
                            else{
                                header('location:car_details.php?Invalid=Error occured please try again');
                            }
                        }
?>
