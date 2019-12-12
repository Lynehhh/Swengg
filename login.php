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
		
		
		if($result = $con->query($query)){
			if ($result->num_rows > 0) { 
				while($row = $result->fetch_assoc()) {
					$_SESSION['email'] = $row['email'];
					$_SESSION["user_type"] = $row["usertype"];
				}
			}
			header("location:home.php"); 
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
	<title>JANSY COMMERCIAL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    
    <style>
        a:hover {
          color: green;
        }
    </style>
    
</head>
<body background = "images\background.jpg" style="background-repeat: no-repeat; background-size: cover;">
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41"> Account Login </span>
                
                <!-- Start Login Form -->
				<form method="post" action="" class="login100-form validate-form p-b-33 p-t-5">
                    
                    <span class="login100-form-title2 p-b-41"><img src="images/logoDemo.png" alt="" style="width: 70%;"></span>
                    
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    <p class="wrap-input100 text-center">
                        Don't have an account ? <a href="signup.php" class="">Sign Up here</a>
                    </p>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" value="Submit" name="Login" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
                <!-- End Login Form -->
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
