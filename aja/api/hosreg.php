<?php

	@$hname=$_POST['hname'];
	@$fname=ucfirst($_POST['fname']);
    @$lname=ucfirst($_POST['lname']);	
    @$phno=$_POST['phno'];	
    @$email=strtolower($_POST['email']);	
    @$dob=$_POST['dob'];


	/*@$hname='ABChospita';
	@$fname='an';
    @$lname='jo';	
    @$phno='741852963';	
    @$email='a@gmail';	
    @$dob='2022-08-07';
*/
	
	$co1=mysqli_connect('localhost','root','','hospitals');
	
	$q=mysqli_query($co1,"SELECT hosdb FROM `hospital` where hosname='$hname'");
	
if(mysqli_num_rows($q)>0)
{
	$r= mysqli_fetch_assoc($q);	
	$dbname=$r['hosdb'];	
	$dbname1=strval($dbname);	
	//echo $dbname1;
}
	
//$co=mysqli_connect('localhost','root','',$dbname1);
$co=mysqli_connect('localhost','root','','hospital1');

$q1=mysqli_query($co,"select * from hosusers where fname='$fname' and lname='$lname' and phno='$phno'");
if(mysqli_num_rows($q1)>0)
{
	$response['success'] =0; 	
	$response['result'] = "You are alredy registered";    
	echo json_encode($response);
}
else
{
$query=mysqli_query($co,"INSERT INTO `hosusers`(`fname`, `lname`, `phno`, `email`, `dob`) VALUES ('$fname','$lname','$phno','$email','$dob')");

if($query)
{
	$response['success'] =1; 	
	$response['result'] = "Data Inserted";    
	echo json_encode($response);
}
}


?>

