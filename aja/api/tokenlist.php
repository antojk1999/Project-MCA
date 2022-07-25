<?php
#header('Refresh:.1');

	@$hname=$_POST['hname'];
	@$opno=$_POST['opno'];    	
 /*	
@$hname='Medicity,palai';	
@$opno=38;
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
	
$co=mysqli_connect('localhost','root','',$dbname1);
//$co=mysqli_connect('localhost','root','','hospital1');
$query=mysqli_query($co,"SELECT doctname,dept,tokenno,opno,dp.pcalltime,dp.doctid,dp.waitlist from deptdoctors d, hosdept h,doctpatients dp WHERE d.deptid=h.deptid and dp.opno='$opno' and dp.doctid=d.doctid ORDER by dp.doctid ASC");
$query1=mysqli_query($co,"SELECT min(tokenno)as mintok,d.doctname,dept,tokenno,opno,dp.pcalltime,dp.doctid,dp.waitlist from deptdoctors d, hosdept h,pharpatients dp WHERE d.deptid=h.deptid and dp.opno='$opno' and dp.phid=d.doctid ORDER by dp.doctid ASC");

$data_list = array();
$data_list1 = array();
$data_list2 = array();

if(mysqli_num_rows($query) > 0)
{
	$response['success'] =1;
	
 	
	while($real=mysqli_fetch_assoc($query))		
	{
	$did=$real['doctid'];
	$query2=mysqli_query($co,"SELECT min(tokenno) as mintok FROM `doctpatients` WHERE doctid='$did' and waitlist='2'");
	
	$r1= mysqli_fetch_assoc($query2);	
	$data_list[] = $r1 + $real ;			
	}
/*	
if(mysqli_num_rows($query1) > 0)
{
	$real1=mysqli_fetch_assoc($query1);
	$data_list[]=$real1;
}	
*/	$response['result'] = $data_list;
	//$response['tok'] = $data_list1;
 echo json_encode($response);   
}
	
else
{
	$response['success'] =0; 
	$response['result'] = "No data found!";
    
	echo json_encode($response);

}


?>

