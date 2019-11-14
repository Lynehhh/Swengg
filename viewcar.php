<?php session_start(); 
require_once("connection.php");
?>
<html>
    <head>
        <script>
            function set_todate(date) {
                document.getElementById("reserve_edate").disabled = false;
                document.getElementById("reserve_edate").setAttribute("min", date);
                document.getElementById("reserve_edate").setAttribute("value", date);
            }
            
            function show_price(sdate, edate, price){
                if(sdate > edate){
                    alert("Invalid dates. Please try again.");
                }
                else{
                    var date1 = new Date(sdate);
                    var date2 = new Date(edate);
                    var label = 'days';
                    var days = Math.floor((date2 - date1) / (1000*60*60*24) + 1);
                    
                    if(days == 1){
                        label = 'day';
                    }
                    var totalprice = price * days;
                    document.getElementById("price_area").innerHTML = "<table><tr><td>₱"+price+" x "+days+" "+label+"</td><td>₱"+totalprice+"</td></tr><tr><td><b>Total</b></td><td><b>₱"+totalprice+"</b></td></tr></table>";
                }
            }
        </script>
    </head>
    <body>
        <?php
                if(isset($_GET['searched_car'])){
                    $_SESSION['searched_car'] = $_GET['searched_car'];
                }
                
                $sql1="select location from car_images where carID=".$_SESSION['searched_car'];
            
                $result = $con->query($sql1);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<img src='".$row["location"]."' style='width:128px;height:128px;'>";
                    }
                } 
                else {
                    echo "NO PHOTOS AVAILABLE";
                }

                $sql2="select oemail, name, price, brand, fuel_type, seater, description, ofirst_name from view_catalogue where carID=".$_SESSION['searched_car'];

                $result = $con->query($sql2);
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<div><br>
                        <b>".$row['name']."</b><br>
                        Uploaded by: ".$row['ofirst_name']."<br><br>
                        Brand: ".$row['brand']."<br>
                        Fuel Type: ".$row['fuel_type']."<br>
                        Capacity: ".$row['seater']."<br><br>
                        Description: <br>".$row['description']."
                        <div>";
                        $_SESSION['owner_email'] = $row['oemail'];
                        $_SESSION['price'] = $row['price'];
                    }
                }

                if(empty($_SESSION['email']) || ($_SESSION['email'] <> $_SESSION['owner_email'])){
                    echo '<div>
                    <div>
                    <b>₱'.$_SESSION['price'].' per day</b>
                    </div>
                    <div>
                    <form id="reserve_form" method="get"> 
                    <input method="get" type="date" id="reserve_sdate" name="start_date" placeholder="From" min="" onchange="set_todate(this.value)" />->
                    <input method="get" type="date" id="reserve_edate" name="end_date" placeholder="To" min="" value="" disabled />
                    </form>
                    <input method="get" type="button" value="Show Price" onclick="show_price(reserve_sdate.value, reserve_edate.value, '.$_SESSION["price"].')" />
                    <div>
                    <div id="price_area">
                    </div>
                    <div>
                    <button name="reserve" form="reserve_form" onclick="show_ask()">Reserve</button>
                    </div>
                    </div>
                    
                    ';
                }

                if (isset($_GET['reserve'])){
                        $_SESSION['start_date'] = $_GET['start_date'];
                        $_SESSION['end_date'] = $_GET['end_date'];
                        if($_SESSION['start_date'] > $_SESSION['end_date']){
                            header('location:viewcar.php?Invalid=Invalid dates please try again');
                        }
                    else{
                        // PALITAN SESSION NAME
                        if(empty($_SESSION['email'])){
                            // SA LOGIN PAGE 
                            header('location:login.php');
                        }
                        else{
                            $sql = "INSERT INTO reservation_requests (req_date, date_use, date_return, renter_email, owner_email, carID, totalPrice, ref_req_status) VALUES (now(), '".$_SESSION['start_date']."', '".$_SESSION['end_date']."', '".$_SESSION['email']."', '".$_SESSION['owner_email']."', ".$_SESSION['searched_car'].", (datediff('".$_SESSION['end_date']."', '".$_SESSION['start_date']."')+1)*".$_SESSION['price'].", 'Pending')";
                            
                            $result = $con->query($sql);
                            
                            if($result === true){
                                header('location:pending_request.php');
                            }
                            else{
                                header('location:viewcar.php?Invalid=Error occured please try again');
                            }
                        }
                    }  
                }
           
            
        ?>
        <script>
            var today = new Date();
            var dd = today.getDate()+1;
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear()

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("reserve_sdate").setAttribute("min", today);
        </script>
    </body>
</html>