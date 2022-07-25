<?php
session_start();
if(isset($_SESSION['admin']))
{
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
    
    <title>Hosapp - Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dash.css" rel="stylesheet">
</head>

<body class="fix-header">




    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
       
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
                    <h3 class="text-primary">Welcome to dashboard</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->



                <div class="row">


                    <div class="container-fluid">
                        
<!-- ========================= Main ==================== -->
<div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
			

            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
			<?php
			$q2=mysqli_query($con,"select count(*) as c1 from hosusers");
			$r2=mysqli_fetch_assoc($q2)
			?>
			
			
			<div class="card">
			<div>
			<div class="numbers"><?php echo $r2['c1'];?></div>
							<div class="cardName">Users</div>
						</div>
						<div class="iconBx">
							<ion-icon name="eye-outline"></ion-icon>
						</div>
			</div>
			
			
			
			<?php
			
			$q=mysqli_query($con,"select * from hosdept");
			
			while($r=mysqli_fetch_assoc($q))
			{
			  ?>
			  
			  <div class="card">
						<div>
						<?php
						$d=$r['deptid'];
						$q1=mysqli_query($con,"select count(*) as c from deptdoctors where deptid='$d'");
						$r1=mysqli_fetch_assoc($q1)
						?>
						
							<div class="numbers"><?php echo $r1['c'];?></div>
							<div class="cardName"><?php echo $r['dept']; ?></div>
						</div>

						<div class="iconBx">
							<ion-icon name="eye-outline"></ion-icon>
						</div>
					</div>
			  
			  
			  <?php
			}
			
			?>
			
				
                
                
            </div>

            <!-- ================ Order Details List ================= -->
            
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
}
else
{
	header("location:../doctorlogin.php");
}
?>