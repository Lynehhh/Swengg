<?php
require_once("connection.php" );

if(isset($_GET['ownerprofile'])){
$email = $_GET['ownerprofile'];
echo "Renter Feedback";
$renterquery = "SELECT f.rentID, f.type, f.rating, f.comments, f.date, rr.renter_email, u.firstname , u.lastname   FROM feedback f LEFT JOIN rentals r ON f.rentID = r.rentID LEFT JOIN reservation_requests rr ON r.reqID = rr.reqID LEFT JOIN users u ON rr.owner_email = u.email
WHERE rr.renter_email = 'lliam_sanchez@dlsu.edu.ph' AND f.type = 'Renter'";

$result = mysqli_query($con, $renterquery);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <div class="name">
        <h5><?php echo  $row['firstname'] . " " . $row['lastname']?> </h5>
    </div>
    <div class="date">
        <p><?php echo $row['date']?></p>
    </div>
    <div class="review-comment">
        <p>
        <?php echo $row['comments']?>
        </p>
    </div>
        
   

<?php
    }
}
else{
   echo "0 Results";
} 
echo "Seller Feedback";
$ownerquery = "SELECT f.rentID, f.type, f.rating, f.comments, f.date, rr.owner_email, u.firstname , u.lastname   FROM feedback f LEFT JOIN rentals r ON f.rentID = r.rentID LEFT JOIN reservation_requests rr ON r.reqID = rr.reqID LEFT JOIN users u ON rr.renter_email = u.email
WHERE rr.owner_email = 'lliam_sanchez@dlsu.edu.ph' AND f.type = 'Owner'";

$result1 = mysqli_query($con, $ownerquery);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) { ?>
        <div class="name">
        <h5><?php echo  $row['firstname'] . " " . $row['lastname']?> </h5>
    </div>
    <div class="date">
        <p><?php echo $row['date']?></p>
    </div>
    <div class="review-comment">
        <p>
        <?php echo $row['comments']?>
        </p>
    </div>
        
   

<?php
    }
}
else{
   echo "0 Results";
} 
}

?>

