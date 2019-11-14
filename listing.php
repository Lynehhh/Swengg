<html>
<body>

<?php 
require_once('connection.php');

$selectCarType = "SELECT type FROM ref_car_type"; 
$result = $con->query($selectCarType);
?>
		
<form method="POST" action="processlisting.php" enctype="multipart/form-data">
Name: <input type = "text" name = "carname"><br>
Brand: <input type = "text" name = "brand"><br>

Car Type: <select name = "carType" >
                <option> ------- </option>
                <?php while($row = $result->fetch_assoc()) { ?>
                <option> <?php echo $row['type'];?> </option>
                <?php } ?>
        </select><br>
<?php
$selectFuelType = "SELECT type FROM ref_fuel_type"; 
$result2 = $con->query($selectFuelType);
?>
Fuel Type: <select name = "fuelType" >
                <option> ------- </option>
                <?php while($row = $result2->fetch_assoc()) { ?>
                <option> <?php echo $row['type'];?> </option>
                <?php } ?>
        </select><br>
Seater: <input type = "number" name = "seater"><br>
Price: <input type = "number" name = "price"><br>
Description: <input type = "text" name = "description"><br>
Image:<input type="file" name="files[]" multiple><br>
Documents: <input type="file" name="docs[]" multiple><br>
 <input type="submit" name="submit" value="submit">
</form>

</body>
</html>