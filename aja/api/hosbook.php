<?php


$co=mysqli_connect('localhost','root','','hospitals');
$query=mysqli_query($co,"SELECT DISTINCT district FROM `hospital`" );

$data_list = array();


if(mysqli_num_rows($query) > 0)
{
	while($real= mysqli_fetch_assoc($query))
	{

		$data_list[] = $real;
		
	}

	$response['success'] =1; 
	
	$response['districts'] = $data_list;
	
	echo json_encode($response);
}
else
{
	$response['success'] =0; 
	$response['result'] = "No data found!";
    
	echo json_encode($response);

}

?>

