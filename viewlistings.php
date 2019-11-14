<?php
session_start(); 
require_once('connection.php');
?>

<html> 
<head></head>
<body> 

<form action="viewlistings.php" method="post" style = "margin-top: 30px;  margin-left:18%;">
        <label  style = "background-color: #B4C540; padding-left: 5%; padding-right:5%; padding-top: 10px; padding-bottom: 10px; border:none; color: white; font-weight: bold;"> Vehicle Search </label>
            <input type="text" name="valueToSearch" placeholder=" Search by car brand, type or name" style = "width: 65%; padding-top: 10px; padding-bottom: 10px; border: 1px solid #ccc;">
            <button  name="search" value ="search" style =  "background-color: Transparent; background-repeat:no-repeat;border: none;"  ><img src = "button.png" style = "width: 25px; height: 25px;   "></button>
</form>

<?php
            $email = $_SESSION['email'];
            if(isset($_POST['search']))
            {

                $valueToSearch = $_POST['valueToSearch'];
                // search in all table columns
                // using concat mysql function
                $query = "  SELECT ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability  FROM catalogue c 
                            JOIN car_images ci ON c.carID = ci.carID 
                            WHERE CONCAT(c.brand, c.car_type, c.name) LIKE '%".$valueToSearch."%' 
                            AND c.owner_email = '".$email."'GROUP BY c.carID";
                $search_result = filterTable($query);
                
            }
            else {
                $query = "  SELECT ci.location, c.carID, c.name, c.brand, c.car_type, c.fuel_type, c.seater, c.price, c.availability 
                            FROM catalogue c JOIN car_images ci ON c.carID = ci.carID 
                            WHERE c.owner_email = '".$email."'GROUP BY c.carID";
                $search_result = filterTable($query);
            }

           
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
    <th>Name</th>
    <th>Brand</th>
    <th>Car Type</th>
    <th>Fuel Type</th>
    <th>Seater</th>
    <th>Price</th>
    <th>Availability</th>
</tr>

    
<?php


if ($search_result->num_rows > 0) {
    while($row = $search_result->fetch_assoc()) {
        echo "<form method = 'post' action = 'specificlisting.php'>";
        echo "\t<tr><td><img src =" . $row['location'] . " height ='150px;' width = '150px;'></td><td><button type = 'submit' name = 'view'  value = '" . $row['carID'] . "' >" . $row['name'] ." </button></td><td>" . $row['brand'] ."</td><td>" . $row['car_type'] ."</td><td>" . $row['fuel_type'] ."</td><td>" . $row['seater'] ."</td><td>" . $row['price'] ."</td><td>" . $row['availability'] ."</td></tr>\n";
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