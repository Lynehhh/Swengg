<!DOCTYPE html>
<html>
<head>
	<title>Uploading Multiple Files using PHP</title>
</head>
<body>
	<div style="height:50px;"></div>

	<div style="margin:auto; padding:auto; width:80%;">
		<h2>Output:</h2>
		<?php
        require_once("connection.php");
			$query="SELECT * from car_images ci JOIN reservation_requests r ON ci.carID = r.carID
			WHERE r.reqID = $reqID";
			$result =  $con->query($query);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
				?>
				<img src="<?php echo $row['location']; ?>" height="150px;" width="150px;">
				<?php
            }
        }
			
 
		?>
	</div>
</body>
</html>