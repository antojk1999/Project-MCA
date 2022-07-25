<?php
session_start();
include('dbcon.php');
if(isset($_POST['submit1']))
		 {
//$con=mysqli_connect("localhost","root","","hospital1");

$id=$_POST['id'];
$password=$_POST['password'];
$_SESSION['id']=$id;
$_SESSION['pass']=$password;


$sql="SELECT  `doctid`,`doctname`, `password` FROM `deptdoctors`";

$result1=mysqli_query($con, $sql);

while($row1=mysqli_fetch_assoc($result1))
{
	if($row1['doctid']==$id && $row1['password']==$password)
	{
		
		header("location:addwait.php");
	}
	
}
		 }
		 
		 
		 
		 
		 
		 
		 
		 
		 ?>
		 
		 