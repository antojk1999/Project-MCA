

<?php
#header('refresh:1');
session_start();
include('dbcon.php');
$id=$_SESSION['id'];
$dname=$_SESSION['dctname'];
//$con=mysqli_connect("localhost","root","","hospital1");
?>


<?php
?>


<!DOCTYPE html>
<html>
<head>
<style>

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

input[type=text] {
  width: 80%;
  padding: 10px 15px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid green;
}

* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
  margin-top:2%;
}
  
.column {
	height:550px;
  float: left; 
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

button{
	width:50px;
	height:50px;
	background:#f5f5f5;
	border-radius:15px;
}
</style>
</head>
<body>

<div style="height:50px;width:100%;background:#261870bf;"> 

</div>

<div class="row">

<div class="column" style="width: 15%;background:#261656;">

<?php include("head.php");?>
</div>

  <div class="column" style="width:50%;overflow: scroll;">
  <form method="post" enctype="multipart/form-data">
  <table>
   
   
<?php
$re1="SELECT * from deptdoctors where doctid=$id";	
$ab1=mysqli_query($con, $re1);
	
while($row31=mysqli_fetch_assoc($ab1))
{
?> 
      <tr>
	  
	  <th>Doctor Name</th>
        <td><?php echo $row31['doctname'] ;?></td>
		<td><img src="images/<?php echo $row31['pro'] ;?>" height="100px" width="100px" style="border-radius:50px;"></td>
		
		</tr>
		<tr>
		
		 <th>Doctor Id</th>
        <td><?php echo $row31['doctid'] ;?></td>
		
		<td><input type="file" name="photo"></td>
		
        
      </tr>
	  <tr>
	  <td></td>
	  <td></td>
	  <td><button type="submit" name="pup" >Update Photo</button></td>
	  </tr>
	  
	  
<?php
}

?>     
    </table>
	 </form>
	 	  
<?php
if(isset($_POST['pup']) && ($_FILES["photo"]))
{ 	$filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"]; 
    $folder = "images/".$filename; 
    
	$sql = mysqli_query($con,"UPDATE `deptdoctors` SET `pro`='$filename' WHERE doctid='$id'");	
	move_uploaded_file($tempname, $folder);
header('location:profile.php');

}

?> 
  <form method="post">
  
	<table>	
	<tr>
	
	<tr>
		<tr>
        <th>Old Password</th>
		<td><input type="text" name="old" required></td>
		</tr>
		<tr>
        <th>New Password</th>
		<td><input type="text" name="npass"required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
		<!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   -->
		</tr>
		<tr>
		<th>Retype New Password</th>
		<td><input type="text" name="repass" required></td>
		</tr>
		<tr>
		
		<td><button class="button button1">Submit<input name="submit" hidden></button></td>
		</tr>
	  
	  	
<?php

if (isset($_POST['submit']))
{
//$con=mysqli_connect("localhost","root","","hospital1");
	
	$old=$_POST['old'];
	$npass=$_POST['npass'];
	$repass=$_POST['repass'];
	
	if($npass == $repass )
	{
	
	$qu="SELECT `password` FROM `deptdoctors` WHERE doctid=$id";
	$qu1=mysqli_query($con, $qu);		
	while($ro=mysqli_fetch_assoc($qu1))
	{
		if($ro['password'] == $old)
		{
			$qu2="UPDATE `deptdoctors` SET `password`='$npass' WHERE doctid=$id";
			mysqli_query($con, $qu2);
			
			echo '<tr>
		
		<td></td><td><h4 style="color:red">!!--Your password successfully Updated!!</h4> </td>
		</tr>';
			
		}
		else{
			echo '<tr>
		
		<td></td><td><h4 style="color:red">!!--mismatch occur in old password and new password--!!</h4> </td>
		</tr>';
			
		}
		
		
	}
	}
	else
	{
	
	echo '<tr>
		
		<td></td><td><h4 style="color:red">!-mismatch occur in new password and retype password-!</h4> </td>
		</tr>';
	}
	
	
}

?>	

</table>


</form>	
 </div>
 
  
  <div class="column" style="width: 30%;overflow: scroll;">  <!-- profile view-->
 
  <form method="post">
	<table>
<?php
$re11="SELECT emtime,attendence from deptdoctors where doctid=$id";	
$ab11=mysqli_query($con, $re11);
	
$row311=mysqli_fetch_assoc($ab11)

?>
 <tr>
		 <th>Day Status</th>
        <td>
		<?php echo $row311['attendence']; ?>
		</td>
</tr>
	  <tr>
		 <th>Leave Application</th>
        <td>
		<select name="leave">
		<option value="Full Day Leave" name="leave">Full Day Leave</option>
		<option value="No OP on morning" name="leave">Morning Leave</option>
		<option value="No OP on evening" name="leave">Afternoon Leave</option>
		</select>
		
		
		
		
		</td>
        
      </tr>
	  <tr>
		
        <td><input type="submit" value="Update" name="em12"></td>
        
      </tr>
	  
	  <tr>
	  <td>
	 


</td>
	  </tr>
	  
	  
<?php
if(isset($_POST['em12']))
{
	$le=$_POST['leave'];
mysqli_query($con,"UPDATE `deptdoctors` SET `attendence`='$le' WHERE doctid='$id'");
if($le=='No OP on morning' || $le=='No OP on evening' )
{
echo '<script>alert("Pleace Update consultation time")</script>';
}
}

?>     
    </table>
	</form>  
	
	
	<form method="post"><!-- Consulting Time -->
	<table>
<?php
$re1="SELECT ctime,endtime,avgtime from deptdoctors where doctid=$id";	
$ab1=mysqli_query($con, $re1);
	
$row31=mysqli_fetch_assoc($ab1)

?>		
	  <tr>
	   <th>Start Time</th>
	   <td><?php echo $row31['ctime']; ?></td>
	  </tr>
	  <tr>
	   <th>End Time</th>
	   <td><?php echo $row31['endtime']; ?></td>
	  </tr>
	  <tr>
	   <th><u>Update Your Time</u></th>
	  </tr>
	   <tr>
	   <th>Start Time</th>
	  <td><input type="time" name="start"></td>
	  </tr>
	  <tr>
	   <th>End Time</th>
	   <td><input type="time" name="end"></td>
	  </tr>
	  
	  <tr>
		
        <td><input type="submit" value="Update" name="time"></td>
        
      </tr>
	  
	  <tr>
	  <td>
	 


</td>
	  </tr>
	  
	  
<?php
if(isset($_POST['time']))
{
$avg=$row31['avgtime'];
$start=$_POST['start'];
$end=$_POST['end'];

$a = new DateTime($start);
$b = new DateTime($end);
$interval = $a->diff($b);
$interval1=$interval->format("%H");

$l=($interval1*60)/$avg;

$q1=mysqli_query($con,"UPDATE `deptdoctors` SET `oplimit`=$l,`ctime`='$start',`endtime`='$end' WHERE doctid='$id'");

}

?>     
    </table>
	</form>

	
	
	<form method="post">
	<table>
<?php
$re11="SELECT emtime from deptdoctors where doctid=$id";	
$ab11=mysqli_query($con, $re11);
	
$row311=mysqli_fetch_assoc($ab11)

?>
		<tr>
		 <th>Emergency time Added</th>
        <td><?php echo $row311['emtime']; ?></td>
        
      </tr>
	  <tr>
		 <th>Emergency time</th>
        <td><input type="text" value="00:00" name="eme"></td>
        
      </tr>
	  <tr>
		
        <td><input type="submit" value="Update" name="em"></td>
        
      </tr>
	  
	  <tr>
	  <td>
	 


</td>
	  </tr>
	  
	  
<?php
if(isset($_POST['em']))
{
$ca=$_POST['eme'];
	
$q1=mysqli_query($con,"SELECT `emtime` FROM `deptdoctors` WHERE doctid='$id'");
$q2=mysqli_fetch_assoc($q1);
	
$t11=$q2['emtime'];	
$sec=strtotime($ca)-strtotime('00:00:00');
$cenvertedTime = date('H:i:s',strtotime('+'.$sec.'seconds',strtotime($t11)));

mysqli_query($con,"UPDATE `deptdoctors` SET `emtime`='$cenvertedTime' WHERE doctid='$id'");


	$w1=mysqli_query($con,"SELECT * from doctpatients WHERE waitlist='0' and doctid='$id'");
		while($ro1=mysqli_fetch_assoc($w1))
		{
			$s=$ro1['pcalltime'];
			$cenvertedTime = date('H:i:s',strtotime('+ '.$sec. 'second',strtotime($s)));
			$oo=$ro1['opno'];
			$w12=mysqli_query($con,"UPDATE `doctpatients` SET `pcalltime`='$cenvertedTime' WHERE opno='$oo' and doctid='$id'");
			
		}
}

?>     
    </table>
	</form>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<form method="post" action="#">
	<table>
<?php
$re111="SELECT avgtime,oplimit from deptdoctors where doctid=$id";	
$ab111=mysqli_query($con, $re111);
	
$row3111=mysqli_fetch_assoc($ab111)

?>
	  <tr>
		 <th>Average Time</th>
        <td>		
		<?php echo $row3111['avgtime']; echo '  minutes';?>
		
		</td>
		<tr>
		<th>New Average Time</th>
		<td>		
		<input type="text" name="avgtime" value=<?php echo $row3111['avgtime'];?>>
		
		</td>
		</tr>
		<tr>
		<th>Number Of Patients Allowed</th>
		<td>		
		<?php echo $row3111['oplimit'];?>
		
		</td>
		</tr>
        
      </tr>
	  <tr>
		
        <td><input type="submit" value="Update" name="avg"></td>
        
      </tr>
	  
	  <tr>
	  <td>
	 


</td>
	  </tr>
	  
	  
<?php
if(isset($_POST['avg']))
{
	$ctime=$row31['ctime'];
	$endtime=$row31['endtime'];
	$av=$_POST['avgtime'];
	
$a = new DateTime($ctime);
$b = new DateTime($endtime);
$interval = $a->diff($b);
$interval1=$interval->format("%H");

$l=($interval1*60)/$av;
	
	
mysqli_query($con,"UPDATE `deptdoctors` SET `oplimit`=$l,`avgtime`='$av' WHERE doctid='$id'");
echo '<script>alert("your Time Changed")</script>';

}

?>     
    </table>
	</form>
	
	
  </div>
</div>

</body>
</html>

