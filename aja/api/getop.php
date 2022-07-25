<?php


	@$hname=$_POST['hname'];
	@$name=ucfirst($_POST['name']);
    @$phno=$_POST['phno'];
	
/*
	
	@$hname='ABChospita';	
	@$name='anto';
	@$phno='9061200734';
	*/
	$hname1=strval($hname);	
	$name1=strval($name);
	$phno1=strval($phno);
	
	
	//echo $phno1,$name,$hname;
	

	
	
$co1=mysqli_connect('localhost','root','','hospitals');
	
$q=mysqli_query($co1,"SELECT hosdb FROM `hospital` where hosname='$hname'");
	
if(mysqli_num_rows($q)>0)
{
	$r= mysqli_fetch_assoc($q);	
	$dbname=$r['hosdb'];	
	$dbname1=strval($dbname);	
	//echo $dbname1;
	//echo gettype($dbname1);
}
	
$co=mysqli_connect('localhost','root','',$dbname1);
//$co=mysqli_connect('localhost','root','','hospital1');
$query=mysqli_query($co,"SELECT * FROM `hosusers` WHERE phno=$phno1 and fname='$name1'" );

$data_list = array();

if(mysqli_num_rows($query) > 0)
{
	$real= mysqli_fetch_assoc($query);
	$data_list[] = $real;
	$response['success'] =1; 	
	$response['result'] = $real;
    
	echo json_encode($response);
}
else
{
	$response['success'] =0; 
	$response['result'] = "No data found!";
    
	echo json_encode($response);

}


?>

