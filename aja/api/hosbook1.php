
<?php
if(isset($_GET['dname']))
{
$a=$_GET['dname'];	
$data_list1 = array();
$co=mysqli_connect('localhost','root','','hospitals');
$q=mysqli_query($co,"SELECT hosname FROM hospital where district='$a'" );

if(mysqli_num_rows($q) > 0)
{
	while($real1= mysqli_fetch_assoc($q))
	{

		$data_list1[] = $real1;
		
	}

	$response['success'] =1; 
	
	$response['hosname'] = $data_list1;
	
	echo json_encode($response);
}
else
{
	$response['success'] =0; 
	$response['result'] = "No data found!";
    
	echo json_encode($response);

}
	
	
}

else{
	$response['success'] =0; 
	$response['result'] = "No data found!";
    
	echo json_encode($response);
}
?>