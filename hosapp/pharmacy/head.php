<?php
include('dbcon.php');
//$con=mysqli_connect("localhost","root","","hospital1");
$id=$_SESSION['id'];
?>
<style>

button{
	width:150px;
	height:50px;
	background:#f5f5f5;
	border-radius:10px;
}

</style>

 <table >
				<tr>
				 <td><l><a href="addwait.php"><button>Patients List</button></a></li></td>
				 </tr>
				 <tr>
				 <td><l><a href="profile.php"><button>Profile</button></a></li></td>
				 </tr>				  
				 <tr>
				 <td><l><a href="logout.php"><button >LogOut</button></a</li></td>
				 </tr>
				 <form method="post">
				 <tr>
				 <td><l><a href=""><button name="end1" >End Up The Day</button></a</li></td>
				 </tr>
				 </form>
				
</table>

<?php

if(isset($_POST['end1']))
{	
	
	mysqli_query($con,"DELETE FROM `pharpatients` WHERE phid='$id'");
	mysqli_query($con,"UPDATE `waitcount` SET `count`=0 WHERE  doctid='$id'");
	
	header("location:addwait.php");
}
	?>