<?php
session_start();
require_once('connection.php');

	if (isset($_POST['Login']))

	{
        
		if (empty($_POST['email']) || empty ($_POST['password']))
		{
			header("location:login.php?Empty=Please Fill in the blanks.");
		}
		else
		{
            
            
			$query="select * from users where email='".$_POST['email']."' and password='".$_POST['password']."'";
            $result = mysqli_query($con,$query);
			

			if (mysqli_fetch_assoc($result))
			{
                $_SESSION['email'] = $_POST['email'];
               // $userQuery = "select usertype from users where email='".$_POST['email']."'";
                //$userType =	 mysqli_fetch_row(mysqli_query($con, $userQuery));


              //  if($userType[0]== '2'){
                header("location:viewlistings.php"); // indicate customized file location
              //  }
               

			}
			else
			{
                header("location:login.php?Invalid=Invalid Username and Password");
            
			}
		}
    }
    
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>GOGO BIYAHE</title>
</head>
<body>
    <form method = "post" action ="" >
    <input type = "text" name = "email" placeholder = "Email">
    <input type = "password" name = "password" placeholder = "Password">
    <button type="submit" value="Submit" name="Login"> Login </button>
    </form>
</body>
</html>
