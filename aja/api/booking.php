<?php


	@$hname=$_POST['hname'];
	@$did=$_POST['doctid'];
	
	@$fname=$_POST['fname'];
	@$opno=$_POST['opno'];
    @$phno=$_POST['phno'];	
	 @$dap1=$_POST['dap'];
	 $dap=date('Y-m-d',strtotime($dap1));
	 
/*	
	@$hname='Medicity,Palai';
	@$did='101';
	
	@$fname='a2';
	@$opno='38';
    @$phno='9061200734';
	 @$dap1='2022-07-26';
	 $dap=date('Y-m-d',strtotime($dap1));
	 echo $dap;
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
	
$co=mysqli_connect('localhost','root','',"$dbname1");
$q1=mysqli_query($co,"select * from hosusers where fname='$fname' and opno='$opno' and phno='$phno'");

$data_list = array();

if(mysqli_num_rows($q1) > 0)
{
	$tc=mysqli_query($co,"SELECT d.endtime,d.attendence as at,w.count as c,d.oplimit as op FROM `waitcount` w,deptdoctors d where w.doctid=d.doctid and d.doctid=$did");
	$tc1= mysqli_fetch_assoc($tc);
	$c=$tc1['c'];
	$op=$tc1['op'];
	$at=$tc1['at'];
	$et=$tc1['endtime'];
	$var=0;
	$var1=0;
	
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d');
	$t=date('H:i:s');
	
	
		if($dap == $d && $t > $et)//book date == today date and current time > end time ...not continued OP Stoped
		{
			$var=1;
		}
		#echo $var;
		
		
		
	if(($c < $op) && ($at!='Full Day Leave'))
	{
		if($var1==0)
		{				
			
					$q2=mysqli_query($co,"select count as cu from waitcount where doctid='$did'");
						
					$r1= mysqli_fetch_assoc($q2);
					$tk=$r1['cu']+1;
					
					
					
				$s13=mysqli_query($co,"SELECT avgtime,ctime,emtime FROM `deptdoctors` WHERE doctid=$did");
				if($r1=mysqli_fetch_assoc($s13))
				{	
					 $avgtime1=$r1['avgtime'];
					 $startTime=$r1['ctime'];
					 $emtime=$r1['emtime'];
					
				}	
					$mi=$tk-1;//get the difference in tokenno	
					$mul=$mi*$avgtime1;	
					$cenvertedTime = date('H:i:s',strtotime('+ '.$mul. 'minutes',strtotime($startTime)));
					
						
					$q3=mysqli_query($co,"SELECT `doctid`, `opno` FROM `doctpatients` WHERE opno='$opno' and doctid='$did' and bdate='$dap'");
					if(mysqli_num_rows($q3)>0)
					{
						$response['success'] =0; 	
						$response['result'] = "You are alredy registered";
						
					}
					else
					{
						date_default_timezone_set('Asia/Kolkata');
						$tib=date("H:i:s");
						
						if($tib > $startTime)
						{
							$r1=mysqli_query($co,"select count(*) as cou from doctpatients where waitlist=0 and doctid='$did' ");
							$r2=mysqli_fetch_assoc($r1);
							
							if ($r2['cou'] == 0)
							{
								 $tk11=strtotime($emtime)-strtotime('00:00:00');
								 $tib1=date('H:i:s',strtotime('+'.$tk11.'seconds',strtotime($tib)));
								
								$r3=mysqli_query($co,"INSERT INTO `doctpatients`(`doctid`, `opno`, `tokenno`,`pcalltime`,`bdate`) VALUES ('$did','$opno','$tk','$tib1','$dap')");
								$r5=mysqli_query($co,"UPDATE `waitcount` set `count`='$tk' WHERE doctid='$did'");
							}
							else if ($r2['cou'] > 0)
							{
								
								$b=($r2['cou']+1) * $avgtime1;
								$ct = date('H:i:s',strtotime('+ '.$b. 'minutes',strtotime($tib)));
								
								$tk11=strtotime($emtime)-strtotime('00:00:00');//emergency time updation 
								$ct1=date('H:i:s',strtotime('+'.$tk11.'seconds',strtotime($ct)));
								 
								
								$r3=mysqli_query($co,"INSERT INTO `doctpatients`(`doctid`, `opno`, `tokenno`,`pcalltime`,`bdate`) VALUES ('$did','$opno','$tk','$ct1','$dap')");
								$r4=mysqli_query($co,"UPDATE `waitcount` set `count`='$tk' WHERE doctid='$did'");
							}
						}
						else
						{
						
						$tk112=strtotime($emtime)-strtotime('00:00:00');
						$c1=date('H:i:s',strtotime('+'.$tk112.'seconds',strtotime($cenvertedTime)));	
						#$c1=date('H:i:s',strtotime('+'.$tk11.'seconds',strtotime($cenvertedTime)));
						
						$q4=mysqli_query($co,"INSERT INTO `doctpatients`(`doctid`, `opno`, `tokenno`,`pcalltime`,`bdate`) VALUES ('$did','$opno','$tk','$c1','$dap')");
						$q4=mysqli_query($co,"UPDATE `waitcount` set `count`='$tk' WHERE doctid='$did'");
						}
						$response['success'] =1; 	
						$response['result'] = "registraion success";
						
					}
					
					
					echo json_encode($response);
		}
		else
			{
				$response['success'] =0; 
				$response['result'] = "No data found!";
				
				echo json_encode($response);

			}
	
	}
	
		else
		{
			$response['success'] =0; 
			$response['result'] = "limit exee or absence of doctor";
			
			echo json_encode($response);

		}
}
else
{
	$response['success'] =0; 
	$response['result'] = "Not Registered Yet";
    
	echo json_encode($response);

}


?>

