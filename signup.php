<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    
      <!-- PLUGINS CSS STYLE -->
  <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style1.css">
    
    <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body background = "images\home\hero.jpg">

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container" style="width: 900px;">
                <div class="signup-content" style="padding: 10px 45px;">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title mb-20">Create account</h2>
                        <div class="row">
                            <div class="col-md-4 offset-md-1 col-lg-12 offset-lg-0">
                                
                                    <!-- First Name -->
                                    <div class="col-lg-6 col-md-12">
                                        <label for="comunity-name">First Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-input" name="name" id="name" placeholder="First Name"/>
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-lg-6 col-md-12">
                                        <label for="comunity-name">Last Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-input" name="name" id="name" placeholder="Last Name"/>
                                        </div>
                                    </div>
                                
                                <!-- Email -->
                                <div class="col-lg-12 col-md-12">
                                    <label for="comunity-name">Email</label>
                                    <div class="form-group">
                                        <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="col-lg-12 col-md-12">
                                    <label for="comunity-name">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                                    </div>
                                </div>
                                <!-- Date of Birth -->
                                <div class="col-lg-6 col-md-12">
                                    <label for="comunity-name">Date of Birth</label>
                                    <div class="form-group">
                                        <input type="date" class="form-input" name="" id="" placeholder="Date of Birth"/>
                                    </div>
                                </div>
                                <!-- Contact -->
                                <div class="col-lg-6 col-md-12">
                                    <label for="comunity-name">Contact Number</label>
                                    <div class="form-group">
                                        <input type="number" class="form-input" name="" id="" placeholder="Contact Number"/>
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-lg-12 col-md-12">
                                    <label for="comunity-name">Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-input" name="name" id="name" placeholder="Address"/>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 mt-30">
                                    <label for="comunity-name">Upload Proof of Identity</label>
                                    <!-- Upload Docs -->
                                    <div class="form-group choose-file mb-20">
                                        <input type="file" class="form-control-file d-inline" id="input-file" multiple="">
                                    </div>
                                </div>

                            </div>
                            <!-- Image 
                            <div class="col-md-4 offset-md-1 col-lg-3 offset-lg-0">
                                <div class="form-group" style="padding: 0%;">
                                    <img src="images/user/user-thumb.jpg" alt="">
                                </div>
                                
                                <div class="form-group choose-file mb-20">
                                    <input type="file" class="form-control-file d-inline" id="input-file">
                                 </div>
                                <label for="comunity-name">Upload Proof of Identity</label>
                                <div class="form-group choose-file mb-20">
                                    <input type="file" class="form-control-file d-inline" id="input-file" multiple="">
                                </div>
                            </div> -->
                        </div>
                        <!-- Sign Up button -->
                        <div class="form-group mt-30">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
