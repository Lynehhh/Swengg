<html>
<head></head>
<body>

<?php
session_start(); 
require_once('connection.php');

$carID =  $_SESSION['carID']; 
$name=  $_SESSION['name'];
$brand =  $_SESSION['brand'];
$car_type =  $_SESSION['car_type'];
$fuel_type =  $_SESSION['fuel_type'];
$seater =  $_SESSION['seater']; 
$price =  $_SESSION['price'];
$availability =  $_SESSION['availability']; 
$description  =  $_SESSION['description']; 

$query= "SELECT location FROM car_images WHERE carID = $carID";
$result =  $con->query($query);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
				?>
				<img src="<?php echo $row['location']; ?>" height="150px;" width="150px;">
				<?php
            }
        }

?>

<form method = "POST" action = >
Name: <input type = "text" name = "name"  placeholder = "<?php echo $name?>"> <br>
Brand: <input type = "text" name = "brand"  placeholder ="<?php echo $brand?>"> <br>
Car Type: <input type = "text" name = "cartype"  placeholder ="<?php echo $car_type?>"> <br>
Fuel Type: <input type = "text" name = "fueltype"  placeholder ="<?php echo $fuel_type?>"> <br>
Seater: <input type = "text" name = "seater"  placeholder ="<?php echo $seater?>"> <br>
Price: <input type = "text" name = "price"  placeholder ="<?php echo $price?>"> <br>
Availability: <input type = "text" name = "availability"  placeholder ="<?php echo $availability?>"> <br>
Description: <input type = "text" name = "description"  placeholder ="<?php echo $description?>"> <br>
<input type = "submit" name = "update" value = "Update" formaction = "processedit.php">
<input type = "submit" name = "delete" value = "Delete Listing" formaction = "processdelete.php" >
<input type = "submit" name = "back" value = "Back">
</form>

</body>
</html>
