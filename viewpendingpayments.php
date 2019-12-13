<?php
session_start(); 
require_once('connection.php');

if ($_SESSION['user_type'] === 'Renter'){
    header("location:home.php?Invalid=Access Denied"); 
}
?>

<html> 
<head></head>
<body> 


</form>

<?php
            $email = $_SESSION['email'];
                $query = " SELECT re.rentID,  ci.location, c.name, re.total_amount, re.due_date, re.status, re.date_use, r.date_return, 
                r.renter_email, r.owner_email, u.firstname, u.lastname FROM rentals re JOIN reservation_requests r ON re.reqID = r.reqID JOIN car_images ci ON r.carID = ci.carID JOIN catalogue c ON c.carID = ci.carID JOIN users u ON r.owner_email = u.email 
                            WHERE r.renter_email = '".$email."' 
                            AND re.status = 'Unpaid'
                            GROUP BY re.rentID";
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
    <th>Vehicle Name</th>
    <th>Owner Details</th>
    <th>Payment Due Date</th>
    <th>Date Use</th>
    <th>Date Return</th>
    <th>Total Price</th>
</tr>

    
<?php


if ($search_result->num_rows > 0) {
    while($row = $search_result->fetch_assoc()) {
        echo "<form method = 'post' action = 'paynow.php'>";
        echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td>" . $row['name'].
        "</td><td><ul><li>Name:" . $row['firstname'] ." ".  $row['lastname'] . "</li>
        <li>Email: ".$row['owner_email']."</li></ul></td><td>" . $row['due_date'] ."</td><td>" . $row['date_use'] ."</td><td>" . $row['date_return']  ."</td><td>" . $row['total_amount'] ."</td><td><button type = 'submit' name = 'Pay'  value = '" . $row['rentID'] . "' > Pay Now </button></td></tr>\n";
    }

}


?>
</table>
</body>
</html>