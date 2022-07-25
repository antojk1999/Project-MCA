<?php
#include 'connection.php';
$con=mysqli_connect('localhost','root','','hospital1');
$data_list = array();

if(isset($_POST['atid']))
{
	@$id = $_POST['atid'];
 
$query=mysqli_query($con,"SELECT * from hosdept hos,deptdoctors de where hos.deptid=de.deptid and doctid=$id");



if(mysqli_num_rows($query) > 0)
{
	$real= mysqli_fetch_assoc($query);
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
}
else{
	$response['success'] =0; 
	$response['result'] = "No Access!";
    
	echo json_encode($response);
}


?>

