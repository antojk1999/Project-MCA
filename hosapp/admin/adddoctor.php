<?php
include('dbcon.php');
//$con=mysqli_connect('localhost','root','','hospital1');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/foodpicky.png">
    <title>HomeFoodi - Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
         <?php include('header.php'); ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include('sidebar.php'); ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="height:1200px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Doctors</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                     <div class="row">
                                      
					
					 <div class="container-fluid">
                <!-- Start Page Content -->	
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                                <form method='post' >
                                    <div class="form-body">
                                       
									    <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Doctor ID</label>
                                                    <input type="text"  name="doid" class="form-control" placeholder="Doctor ID" autocomplete="off" required>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
                                        
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text"  name="fname" class="form-control" placeholder="First name" autocomplete="off" required>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text"  name="lname" class="form-control form-control-danger" placeholder="Last name" autocomplete="off" required >
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Department</label>
                                                    <select name="id" class="form-control">
												<?php 
												$q=mysqli_query($con,"select * from hosdept where type='1'");
												while($r=mysqli_fetch_assoc($q))
												{
												?>												
												<option name="id" value="<?php echo $r['deptid']?>"><?php echo $r['dept']; ?></option>
												<?php
												}
												?>
												</select>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control form-control-danger" placeholder="email" autocomplete="off" required>
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
										 <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile</label>
                                                    <input type="text" pattern="[0-9]{10}" name="phno" class="form-control form-control-danger" placeholder="Mobile" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" --><input type="text" title="must contain number,uppercase,lowecase,atleast 8 character" name="psw" required class="form-control form-control-danger" placeholder="password" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
										
                                  <input type="submit" name="sub" class="btn btn-success" value="Add">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <!-- <footer class="footer"> © 2022 All rights reserved. Made with &#x1F49C; by <b><a
                        href="https://www.youtube.com/channel/UC4_6-VSWBw_QHMyjrDDEvVQ"> GPW</a></b> Team. </footer> -->
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>
</html>

<?php
if(isset($_POST['sub']))
{

	$doid=$_POST['doid'];
	$fname=ucwords($_POST['fname']);
	$lname=ucwords($_POST['lname']);
	$id=$_POST['id'];
	$email=strtolower($_POST['email']);
	$phno=$_POST['phno'];
	$psw=$_POST['psw'];
	
	echo $id;
	echo $fname;
	echo $lname;
	echo $doid;
	echo $doid;
	echo $psw;
	echo $email;
	echo $phno;
	
	
	$sql=mysqli_query($con,"INSERT INTO `deptdoctors`(`deptid`, `doctname`, `lname`, `doctid`, `password`, `user`, `email`, `phno`)
	VALUES ('$id','$fname','$lname','$doid','$psw','1','$email','$phno')");
	$sql1=mysqli_query($con,"INSERT INTO `waitcount`(`doctid`) VALUES ('$doid')");
	if($sql && $sql1)
	{
		echo "<script>alert('success')</script>";
	}
	else
	{
		echo "<script>alert('bad luck')</script>";
	}
}
?>