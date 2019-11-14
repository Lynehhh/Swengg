<?php 
session_start();
require_once("connection.php");
if(isset($_POST['Pay'])){
    $rentID =$_POST['Pay'];
    $_SESSION['rentID'] = $rentID; 

    $query = "  SELECT re.total_amount, re.due_date, re.date_use, re.date_return, r.reqID,  c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.description  
                FROM rentals re JOIN reservation_requests r ON re.reqID = r.reqID JOIN catalogue c ON c.carID = r.carID
                WHERE re.rentID = $rentID
                GROUP BY c.carID";

    $result =  $con->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $due_date = $row['due_date'];
            $date_use = $row['date_use'];
            $date_return = $row['date_return'];
            $total_amount = $row['total_amount'];
            $name = $row['name'];
            $brand = $row['brand'];
            $car_type = $row['car_type'];
            $fuel_type = $row['fuel_type'];
            $seater = $row['seater'];
            $price = $row['price'];
            $description = $row['description'];
            $reqID = $row['reqID'];
            $_SESSION['due_date'] = $due_date; 
            $_SESSION['date_use'] = $date_use; 
            $_SESSION['date_return'] = $date_return; 
            $_SESSION['total_amount'] = $total_amount; 
            $_SESSION['name'] = $name; 
            $_SESSION['brand'] = $brand; 
            $_SESSION['car_type'] = $car_type; 
            $_SESSION['fuel_type'] = $fuel_type; 
            $_SESSION['seater'] = $seater; 
            $_SESSION['price'] = $price; 
            $_SESSION['description'] = $description; 
        }
}

$imageQuery="SELECT * from car_images ci JOIN reservation_requests r ON ci.carID = r.carID
WHERE r.reqID = $reqID";
$result1 =  $con->query($imageQuery);
if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    ?>
    <img src="<?php echo $row['location']; ?>" height="150px;" width="150px;">
    <?php
}
}


}
?>

<html>
<head></head>
<body>
    <div>
        <label> Vehicle Details </label><br>
        <label> Name: <?php echo $name ?> </label><br>
        <label> Brand: <?php echo $brand ?> </label><br>
        <label> Car Type: <?php echo $car_type ?> </label><br>
        <label> Fuel Type: <?php echo $fuel_type ?> </label><br>
        <label> Seater: <?php echo $seater ?> </label><br>
        <label> Daily Price: <?php echo $price ?> </label><br>
        <label> Description: <?php echo $description ?> </label><br>
    </div>
    <div>
        <form method = post action = processpayment.php>
        <label> Payment Details</label><br>
        <label> Car Rental period: <?php echo $date_use?> to <?php echo $date_return?></label><br>
        <label> Payment Due Date: <?php echo $due_date ?> </label><br>
        <label> Total Amount: <?php echo $total_amount ?> </label><br>
        Select Card Type: 
        <select name = "cardtype" >
            <option value="creditcard">Credit Card</option>
            <option value="debitcard">Debit Card</option>
        </select>
        Card Number: <input type = "number" name = "cardnumber"><br>
        Expiry Date: <input type = "number" name = "month" placeholder = "Month" > <input type = "number" name = "year" placeholder = "Year" ><br>
        Card Holder: <input type = "text" name = "cardholder"><br>
        <input type = "submit" name = "submit" value = "Pay Now">
        <input type = "submit" name = "back" value = "Back">

        </form>
        
    </div>


</body>
</html>

