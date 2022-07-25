<?php


	@$hname=$_POST['hname'];
	@$opno=$_POST['opno'];
    @$phno=$_POST['phno'];	
	
	$co1=mysqli_connect('localhost','root','','hospitals');
	
	$q=mysqli_query($co1,"SELECT hosdb FROM `hospital` where hosname='$hname'");
	
if(mysqli_num_rows($q)>0)
{
	$r= mysqli_fetch_assoc($q);	
	$dbname=$r['hosdb'];	
	$dbname1=strval($dbname);	
	//echo $dbname1;
}
	
$co=mysqli_connect('localhost','root','',$dbname1);
//$co=mysqli_connect('localhost','root','','hospital1');
$query=mysqli_query($co,"select tokenno from doctpatients d,hosusers h where d.opno='$opno' and h.opno='$opno' and h.phno='$phno'");

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

