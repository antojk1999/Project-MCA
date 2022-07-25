<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HosApp</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
	
	
</head>
<body>

    <di class="main">

        <!-- Sign up form -->
        <sectio class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Select Your Hospital</h2>
                        <form method="POST" action="configdoc.php" class="register-form" id="register-form">
                            <div class="form-group">
								
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>							
								
							<select name="state" id="sta" style="width:250px;height:30px;margin-left:30px;cellspacing:50px;border:none;" >
								<option value="none" selected disabled hidden>Select State</option>
                                <option name="state" id="state" >kerala</option>
                                
							</select>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <select name="district" id="dis" style="width:250px;height:30px;margin-left:30px;cellspacing:50px;border:none;" required>
								<option value="none" selected disabled hidden>Select District</option>
                                <option  name="district" id="district">kottayam</option>
                                
							</select>
							
                            </div>
							
                            <div class="form-group">
                               <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								
                            <select name="hospital" name="hospital" id="hos" style="width:250px;height:30px;margin-left:30px;cellspacing:50px;border:none;" required>
								<option value="none" selected disabled hidden>Select Hospital</option>
								
								<?php	
								include('dbcon.php');
								//$con=mysqli_connect("Localhost","root","","hospitals") or die(mysqli_error);
								$qu="SELECT hosname FROM hospital";
								$re=mysqli_query($con,$qu);
								while($row=mysqli_fetch_assoc($re))
								{	
										echo $row['hosname'];
								?>								
                                <option name="hospital" id="hospital"><?php echo $row["hosname"]; ?></option>
                                <?php
								}
								?>
							</select>
							 
                            </div>
							<div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
								<input type="text" name="id" id="id1" placeholder="Login Id" required> 
                            </div>
							<div class="form-group">
                               <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                           <input type="password" name="password" id="pass" placeholder="Password" required>
							
                            </div>
                         
                            
                            <div class="form-group form-button">
                              <input type="submit" name="subm" id="signup" class="form-submit" value="Submit"/>
								
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/heart.jpg" alt="sing up image"></figure>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>