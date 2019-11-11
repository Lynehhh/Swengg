<?php
/*session_start();
require_once('db/connection.php');

	if (isset($_POST['Login']))

	{
        
		if (empty($_POST['email']) || empty ($_POST['password']))
		{
			header("location:login.php?Empty=Please Fill in the blanks.");
		}
		else
		{
            
            
			$query="select * from users where Email='".$_POST['email']."' and Password='".$_POST['password']."'";
            $result = mysqli_query($con,$query);
			

			if (mysqli_fetch_assoc($result))
			{
                $_SESSION['email'] = $_POST['email'];
                $userQuery = "select UserType from users where Email='".$_POST['email']."'";
                $userType =	 mysqli_fetch_row(mysqli_query($con, $userQuery));


                if($userType[0]== 'Manager'){
                header("location:sales_sales_list.php"); // indicate customized file location
                }
                else if($userType[0]== 'Assistant Manager'){
                    header("location:order_add_order.php"); // indicate customized file location
                    }

                else if($userType[0]== 'Sales'){
                        header("location:order_sales_order.php"); // indicate customized file location
                        }

			}
			else
			{
                echo"
                    <div class='container'>
                        <div class='alert alert-danger alert-dismissible'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Error!</strong> Invalid Username and Password
                            </div>
                      </div>
                ";
                //header("location:login.php?Invalid=Invalid Username and Password");
                // add alert and fix the bg
			}
		}
    } */
    
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>GOGO BIYAHE</title>
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
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</head>
<body background = "images\background.jpg" style = "background-size: cover;">
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41"> GOGO BIYAHE</span>
                
                <!-- Start Login Form -->
				<form method="post" action="" class="login100-form validate-form p-b-33 p-t-5">
                    
                    <span class="login100-form-title2 p-b-41">Account Signup</span>
                    
                    <div class="row">
                        <div class="wrap-input100 validate-input" data-validate = "">
						<input class="input100" type="text" name="email" placeholder="First Name" required />
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "">
						<input class="input100" type="text" name="email" placeholder="Last Name" required />
						<span class="focus-input100"></span>
					</div>
                    </div>

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