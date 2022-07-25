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
                    <h3 class="text-primary">Report Generation</h3>
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
                                <form method='post' action="report1.php">
                                    <div class="form-body">
                                       
									    <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <input type="datetime" name="da" class="form-control" max=<?php echo date('Y-m-d'); ?>>
                                                   </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
										
                                  <input type="submit" name="sub" class="btn btn-success" value="Generate Report">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
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
