 <?php
 session_start();
$id=$_SESSION['id'];
 $tn=$_GET['va'];
 echo $tn;

		if(isset($_POST['submit2']))
		{
			echo $tn;
		//operation of next buuton
		include('dbcon.php');
		//$con=mysqli_connect("localhost","root","","hospital1");
		$de="DELETE FROM `doctpatients` WHERE doctid='$id' and tokenno='$tn'";
		mysqli_query($con, $de);
		header("location:doctorpage.php");
			
		}
			 
		  
		 ?>