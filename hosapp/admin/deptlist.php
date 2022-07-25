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
                    <h3 class="text-primary">Add Sub Departments</h3>
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
                                <form method='post'>
                                    <div class="form-body">
                                       
									    <div class="row p-t-20">
                                            <div class="col-md-6">
											<div class="form-group">
											
											
                                                    <label class="control-label">Department</label>
													
													<select class="form-control" name="val" >
													<option value="0">All</option>
														
													<?php 
											$h=mysqli_query($con,"SELECT * FROM `hosdept` WHERE type!=1");
											
											while($r=mysqli_fetch_assoc($h))
											{
												
											?>													
													<option value="<?php echo $r['type']?>"><?php echo $r['dept']?></option>
													
													
											<?php
											
											}
											?>	 
											</select>											
                                                   </div>
                                                
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
										
										<td> <input type="submit" name="sub" class="btn btn-success" value="Submit"></td>
                                      
                                      
                                    </div>
                                </form>
								
<?php
if(isset($_POST['sub']))
{
	
	
	if($_POST['val'] == '0')
	{
	
	$q=mysqli_query($con,"SELECT * FROM `deptdoctors` WHERE user!=1");
	
	}
	else
	{
		$type=$_POST['val']; 
		$q=mysqli_query($con,"SELECT * FROM `deptdoctors` WHERE user='$type'");
	}
?>						<form method="post">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th>ID</th>
                                                <th>Name</th>                                                
                                                <th>Phone Number</th>                                                                                                
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										//$con=mysqli_connect('localhost','root','','hospital1');
										
													
												while($r=mysqli_fetch_assoc($q))
												{
												  ?>
			  
										
                                            <tr>
                                                <td><?php echo $r['doctid']; ?></td>												
                                                <td><?php echo $r['doctname']?></td>                                                
                                                <td><?php echo $r['phno']; ?></td>                                                
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


<?php	
	
}
?>

								
<?php
if(isset($_POST['addd']))
{
	$d=$_SESSION['deptid'];	
	$n=$_POST['name'];
	$id=$_POST['id'];
	$p=$_POST['psw'];	
	$t=$_SESSION['type'];
	$phno=$_POST['phno'];
	echo $d;
	$sql = mysqli_query($con,"INSERT into `deptdoctors` SET `deptid`='$d',doctname='$n',doctid='$id',password='$p',user='$t',phno='$phno'");	
}
?>	

  </div>
                        </div>
                    </div>
                </div>
				
               
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
