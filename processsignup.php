  <?php
  require_once('connection.php');
session_start();
                    if (isset($_POST['submit']))
                    { 
                        $firstname = $_POST['firstName'];
                        $lastname = $_POST['lastName'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confPassword = $_POST['confPassword'];
                        $usertype = "Renter";
                        $address = $_POST['address'];
                        $city = $_POST['city'];


                        
                        if($password == $confPassword){

                           

                        $query = "INSERT INTO users (email, lastname, firstname, password, streetadd, city, usertype)
                            VALUES('".$email."', '".$lastname."', '".$firstname."', '".$password."' , '".$address."', '".$city."' ,  '".$usertype."')";
                        if(mysqli_query($con,$query)) { 
                            $_SESSION['email'] = $email;
                            $_SESSION['user_type'] = $usertype;
                            $alert= "successfully added new user";
                             header("location:home.php");
                            echo "<script language='javascript'>";
                            echo "alert('.$alert.')";
                            echo '</script>';
                        }
                        else { 
                            $errormessage = mysqli_error($con);
                            echo $errormessage;
                        }
                    }
                    else{
                        header("location:signup.php");

                    }
                    }
                    ?>