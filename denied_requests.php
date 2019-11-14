<?php
session_start(); 
require_once('connection.php');
?>

<html> 
<head></head>
<body> 

<?php
            $email = $_SESSION['email'];
                $query = "select rr.reqID, ci.location, c.name, c.brand, c.car_type, c.fuel_type, c.seater, u.firstname, u.lastname, u.email, rr.req_date, rr.date_use, rr.date_return, rr.totalPrice, rr.ref_req_status
                from reservation_requests rr
                join users u on rr.owner_email = u.email
                join car_images ci on ci. carID = rr.carID
                join catalogue c on rr.carID = c.carID
                where rr.renter_email = '".$_SESSION['email']."' and rr.ref_req_status = 'Denied'
                group by rr.reqID";
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
    <th>Owner Details</th>
    <th>Request Date</th>
    <th>Date Use</th>
    <th>Date Return</th>
    <th>Total Price</th>
</tr>

    
<?php



    
if ($search_result->num_rows > 0) {
    while($row = $search_result->fetch_assoc()) {
        echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td><ul><li>" 
        . $row['name'] ."</li><li>Brand: ".$row['brand']."</li>
        <li>Car Type: ".$row['car_type']."</li>
        <li>Fuel Type: ".$row['fuel_type']."</li>
        <li>Capacity: ".$row['seater']."</li></ul>
        </td><td><ul><li>Name:" . $row['firstname'] ." ".  $row['lastname'] . "</li>
        <li>Email: ".$row['email']."</li></ul></td><td>" . $row['req_date'] ."</td><td>" . $row['date_use'] ."</td><td>" . $row['date_return']  ."</td><td>" . $row['totalPrice'] ."</td></tr>\n";
    }
}

if(isset($_POST['cancel_reserve'])){
    $sql='UPDATE reservation_requests
    SET ref_req_status = "Cancelled"
    WHERE reqID = '.$_POST["cancel_reserve"];
    $con->query($sql);
    header('location:pending_request.php');

}
?>
</table>
</body>
</html>