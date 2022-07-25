

<?php
#header('refresh:1');
include('dbcon.php');
session_start();
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

  <div class="column" style="width:40%;overflow: scroll;">
  
  
	 	  
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
 
  
  <div class="column" style="width: 40%;overflow: scroll;">  <!-- profile view-->
 
   <form method="post" enctype="multipart/form-data">
  <table>
   
   
<?php
$re1="SELECT * from deptdoctors where doctid=$id";	
$ab1=mysqli_query($con, $re1);
	
while($row31=mysqli_fetch_assoc($ab1))
{
?> 
      <tr>
	  
	  <th>Pharmacy Name</th>
        <td><?php echo $row31['doctname'] ;?></td>
		<td><img src="images/<?php echo $row31['pro'] ;?>" height="100px" width="100px" style="border-radius:50px;"></td>
		
		</tr>
		<tr>
		
		 <th>Pharmacy Id</th>
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

  </div>
</div>

</body>
</html>

