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
    <title>Hosapp - Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .fdopr {}

        .fdsearch {
            float: right;
            margin-bottom: 10px;

        }

        .fdsearch input {
            border-top: none;
            border-right: none;
            border-left: none;
            border-color: blue;
        }

        .fdsearch:input-placeholder {
            font-style: italic;
        }

        .fdsort {
            float: left;
            margin-bottom: 10px;
        }

        .fdsort select {
            border-top: none;
            border-right: none;
            border-left: none;
            border-color: blue;
        }
    </style>
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
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Doctors List</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               

                                <div class="table-responsive m-t-40">
                                    <div class="fdopr">
                                        <div class="fdsort">
                                            
                                        </div>
                                        <div class="fdsearch">
                                            
                                    </div>
									<form method="post">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th>Doctor ID</th>
                                                <th>Doctors Name</th>
                                                <th>Department</th>
                                                <th>Phone Number</th>
                                                <th>email</th>                                                
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										include('dbcon.php');
										//$con=mysqli_connect('localhost','root','','hospital1');
										
											$q=mysqli_query($con,"select *,dept from deptdoctors d,hosdept h where h.deptid=d.deptid and d.user=1 ORDER by dept asc");
			
												while($r=mysqli_fetch_assoc($q))
												{
												  ?>
			  
										
                                            <tr>
                                                <td><?php echo $r['doctid']; ?></td>
												<input name="id" value="<?php echo $r['doctid']; ?>" hidden>
                                                <td><?php echo $r['doctname']?></td>
                                                <td><?php echo $r['dept']; ?></td>
                                                <td><?php echo $r['phno']; ?></td>
                                                <td><?php echo $r['email']; ?></td>
                                                <td>
												
												<a href="delete.php?id=<?php echo $r['doctid']; ?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                   <!-- <a href="update_menu.php" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a> -->
                                                </td>
                                            </tr>
											
											<?php
												}
											?>
                                        </tbody>
                                    </table>
									</form>
									
									
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    
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