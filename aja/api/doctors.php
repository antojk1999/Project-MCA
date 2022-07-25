<?php
#include 'connection.php';

$data_list = array();


@$hname = $_POST['hname'];
//$hname = "ABChospita";
$co1=mysqli_connect('localhost','root','','hospitals');
$q=mysqli_query($co1,"SELECT hosdb FROM `hospital` where hosname='$hname'");
if(mysqli_num_rows($q) > 0)
{
	$real= mysqli_fetch_assoc($q);	
	$dbname=$real['hosdb'];
	//$data_list[] = $real;
	
	
}
$co=mysqli_connect('localhost','root','',$dbname);

$query=mysqli_query($co,"SELECT * FROM deptdoctors d,hosdept h where d.deptid=h.deptid and d.user=1 ORDER by dept" );


if(mysqli_num_rows($query) > 0)
{
	while($real= mysqli_fetch_assoc($query))
	{

		$data_list[] = $real;
	}

	$response['success'] =1; 
	//$response['db'] =$dname; 
	$response['result'] = $data_list;
    
	echo json_encode($response);
}
else
{
	$response['success'] =0; 
	$response['result'] = "No data found!";
    
	echo json_encode($response);

}

?>

