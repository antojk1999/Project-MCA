
<?php
session_start();
$s=$_POST['state'];
$dis=$_POST['district'];
$hos=$_POST['hospital'];
$id=$_POST['id'];
$pass=$_POST['password'];

include('dbcon.php');
//$conn=mysqli_connect("Localhost","root","","hospitals");

$qu="SELECT * FROM `hospital` WHERE hosname='$hos'";
$re=mysqli_query($con,$qu);
while($row=mysqli_fetch_assoc($re))
{
	$db= $row['hosdb'];
	$ad= $row['admin'];
	$pw= $row['password'];
	$hos1= $row['hosname'];
	
	
}
$_SESSION["hos"] = $db;
$_SESSION["id"] = $id;


if($id == $ad && $pass == $pw)
		{		
		$_SESSION['admin']=$hos1;
		
		header("location:admin/dashboard.php");	
		}

	
	
else if($db!=null && $s!=null && $dis!=null)
{
												#-------------------------------------
	$con=mysqli_connect("Localhost","root","",$db);
												#-------------------------------------
	
	$sql="SELECT `doctid`,`doctname`, `password`,`user` FROM `deptdoctors`";

$result1=mysqli_query($con, $sql);
$count=0;
while($row1=mysqli_fetch_assoc($result1))
{
	if($row1['doctid']==$id && $row1['password']==$pass)
	{	
		$count=1;

		if($row1['user']== 1)
		{		
		$_SESSION['dctname']=$row1['doctname'];
		
		header("location:doctor/addwait.php");	
		}
	
		else if($row1['user']== 2)
		{	
		$count=1;
		$_SESSION['dctname']=$row1['doctname'];
		
		header("location:pharmacy/addwait.php");	
		}
	}	

if($count==0)
{
header('location:doctorlogin.php');	
}

}

}
else
{
	header('location:doctorlogin.php');
}
?>
