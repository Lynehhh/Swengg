<html>
                                
<?php
    require_once('connection.php');
    session_start();
    if(isset($_GET['rate_form_submit'])){
        if(empty($_GET['review'])){
            $sql = "INSERT INTO feedback (rentID, type, rating, date)
                    VALUES (".$_SESSION['rate_rent'].", 'Renter', ".$_GET['rate'].", current_date())";
        }
        else{
            $sql = "INSERT INTO feedback (rentID, type, rating, comment, date)
                    VALUES (".$_SESSION['rate_rent'].", 'Renter', ".$_GET['rate'].", '".$_GET['review']."', current_date())";
        }
        
        echo $sql;
         $result = $con->query($sql);
                            
                            if($result === true){
                                header('location:stransactions_completed_use.php');
                            }
                            else{
                                header('location:stransactions_completed_use.php?Invalid=Error occured please try again');
    }
}
?>
</html>