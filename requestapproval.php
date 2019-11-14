<?php
session_start(); 
require_once('connection.php');
?>

<html> 
<head></head>
<body> 


</form>

<?php
            $email = $_SESSION['email'];
                $query = " SELECT r.reqID, r.req_date, r.date_use, r.date_return, r.renter_email, u.firstname, u.lastname, r.ref_req_status, 
                            ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability 
                            FROM users u JOIN reservation_requests r ON u.email = r.renter_email 
                            JOIN catalogue c ON r.carID = c.carID 
                            JOIN car_images ci ON c.carID = ci.carID 
                            WHERE c.owner_email = '".$email."' 
                            AND r.ref_req_status = 'Pending'
                            GROUP BY c.carID";
                $search_result = filterTable($query);
            

           
            function filterTable($query)
            {
                $con = mysqli_connect("localhost", "root", "", "gogobiyahe");
                $filter_Result = mysqli_query($con, $query);
                return $filter_Result;
            }

        ?>
    <table >


<table> 
<tr>
    <th>Image</th>
    <th>Vehicle Details</th>
    <th>Renter Details</th>
    <th>Request Date</th>
    <th>Date Use</th>
    <th>Date Return</th>
    <th>Total Price</th>
</tr>

    
<?php


if ($search_result->num_rows > 0) {
    while($row = $search_result->fetch_assoc()) {
        $interval = 8; 
        $totalPrice =  $row['price'] * $interval;
        echo "<form method = 'post' action = 'processapproval.php'>";
        echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td><ul><li>" 
        . $row['name'] ."</li><li>Brand: ".$row['brand']."</li>
        <li>Car Type: ".$row['car_type']."</li>
        <li>Fuel Type: ".$row['fuel_type']."</li>
        <li>Capacity: ".$row['seater']."</li></ul>
        </td><td><ul><li>Name:" . $row['firstname'] ." ".  $row['lastname'] . "</li>
        <li>Email: ".$row['renter_email']."</li></ul></td><td>" . $row['req_date'] ."</td><td>" . $row['date_use'] ."</td><td>" . $row['date_return']  ."</td><td>" . $totalPrice ."</td><td><button type = 'submit' name = 'Approve'  value = '" . $row['reqID'] . "' >Approve </button><button type = 'submit' name = 'Deny'  value = '" . $row['reqID'] . "' >Deny </button></td></tr>\n";
    }

}
else if (isset($_POST['search']) &&($search_result->num_rows == 0)){
    echo '<script language="javascript">';
    echo 'alert("Invalid Search Parameter. Please Try Again")';
    echo '</script>';
}


?>
</table>
</body>
</html>