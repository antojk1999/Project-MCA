<?php


if($_POST['log'] == "1") //registration
{

				@$oname1=strtolower($_POST['oname']);
				$oname=str_replace(' ','',$oname1);      
				@$phno=$_POST['phno'];	
				@$email=strtolower($_POST['email']);
				@$psw=$_POST['psw']; 
				@$cpsw=$_POST['cpsw']; 
				/*
				
				$oname1=strtolower('Amal jyothi');    
				$oname=str_replace(' ','',$oname1);    
				$phno='9865784512';	
				$email='A@gmail.com';
				$psw='123';	
				*/
				
				$co1=mysqli_connect('localhost','root','','hosapp');
				$conn = new mysqli('localhost','root','');

			$q1=mysqli_query($co1,"select email from organization where email='$email'");
			if(mysqli_num_rows($q1) > 0)
			{
				$response['success'] =2; 	
				$response['result'] = "Sorry organization exist";    
				echo json_encode($response);
			}
			else
			{

									
								$q=mysqli_query($co1,"INSERT INTO `organization`(`org_name`, `phno`, `email`, `psw`) VALUES ('$oname','$phno','$email','$psw')");
								
								if($q>0)
								{
									$q2="create database $oname";
									if ($conn->query($q2) === TRUE)
									{
										$response['success'] =1; 	
										$response['result'] = "Data Inserted";    
										echo json_encode($response);
									}
									else
									{
										$response['success'] =0; 	
										$response['result'] = "database not created";    
										echo json_encode($response);
									}
								}
								else
								{
									$response['success'] =0; 	
									$response['result'] = "Sorry there is some problem";    
									echo json_encode($response);
								}
			}
}

 
if($_POST['log'] == "2")//login
{
	@$oname1=strtolower($_POST['oname']);
	$oname=str_replace(' ','',$oname1); 
	@$email=strtolower($_POST['email']);
	@$psw=$_POST['psw']; 
	
	
	$co1=mysqli_connect('localhost','root','','hosapp');
	$q1=mysqli_query($co1,"select * from organization where org_name='$oname1' and email='$email' and psw='$psw'");
			if(mysqli_num_rows($q1) > 0)
			{
				$response['success'] =1; 	
				$response['result'] = "Success";    
				echo json_encode($response);
			}
			else
			{
				$response['success'] =0; 	
				$response['result'] = "Unsuccess";    
				echo json_encode($response);
			}
	
}

 #$_POST['log']=3;
if($_POST['log'] == "3")//Creating Queue
{
	/*
				$oname1=strtolower('ajce');    
				$oname=str_replace(' ','',$oname1); 				
				$qname1=strtolower('canteen');    
				$qname=str_replace(' ','',$qname1);				
				
				$psw='123';	
	*/
		
	
	@$qname1=strtolower($_POST['qname']);
	$qname=str_replace(' ','',$qname1); 
	
	@$oname1=strtolower($_POST['db']);
	$oname=str_replace(' ','',$oname1);
	
	@$psw=$_POST['psw']; 
	
	
	$co1=mysqli_connect('localhost','root','',$oname1);
	$q123=mysqli_query($co1,"create table if not EXISTS queuelogin(id int(10) NOT null AUTO_INCREMENT PRIMARY KEY,qname varchar(20) not null,psw varchar(10) NOT null)");
	
	$ssq1=mysqli_query($co1,"insert into queuelogin(qname,psw) values('$qname','$psw')");
	
	$r=mysqli_query($co1,"select id from queuelogin where qname='$qname'");
	$r1=mysqli_fetch_assoc($r);
	$r2=$r1['id'];
	
	$q1234=mysqli_query($co1,"create table if not EXISTS waitcount(id int(10) NOT null ,count int(10) not null)");
	$ssq100=mysqli_query($co1,"insert into waitcount(id) values('$r2')");
	
		$q1=mysqli_query($co1,"create table if not exists $qname(name varchar(20) not null,phno varchar(15) not null,tokenno int(5) not null)");
			if($q1)
				{
					$response['success'] =1; 	
					$response['result'] = "Success";    
					echo json_encode($response);
				}
				else
					{
						$response['success'] =0; 	
						$response['result'] = "Queue Alredy exists";    
						echo json_encode($response);
					}
			
			
}

else
{
				$response['success'] =0; 	
				$response['result'] = "Unsuccess"; 
}



 
if($_POST['log'] == "4")//incert queue
{
	@$oname1=strtolower($_POST['oname']);
	$oname=str_replace(' ','',$oname1); 
	
	@$qname1=strtolower($_POST['qname']);
	$qname=str_replace(' ','',$qname1);
	
	@$fname=strtolower($_POST['fname']);
	@$phno=$_POST['phno']; 
	
	
	$co1=mysqli_connect('localhost','root','',$oname);
	
	$q7=mysqli_query($co1,"SELECT w.count as c FROM waitcount w,queuelogin q where q.id=w.id and q.qname='$qname1'");
	$r7=mysqli_fetch_assoc($q7);
	$c=$r7['c'];
	$c=$c+1;
	$q1=mysqli_query($co1,"insert into $qname(name,phno,tokenno) values('$fname','$phno','$c')");
			if($q1)
			{
				mysqli_query($co1,"update waitcount w,queuelogin q set w.count='$c' where w.id=q.id and q.qname='$qname1'");
				$response['success'] =1; 	
				$response['result'] = "Success";    
				echo json_encode($response);
			}
			else
			{
				$response['success'] =0; 	
				$response['result'] = "Unsuccess";    
				echo json_encode($response);
			}
	
}



if($_POST['log'] == "5")//incert queue
{
	@$oname1=strtolower($_POST['oname']);
	$oname=str_replace(' ','',$oname1); 
	
	@$qname1=strtolower($_POST['qname']);
	$qname=str_replace(' ','',$qname1);
	
	@$fname=strtolower($_POST['fname']);
	@$phno=$_POST['phno']; 
	
	
	$co1=mysqli_connect('localhost','root','',$oname);
	
	$q7=mysqli_query($co1,"select tokenno from $qname where name='$fname' and phno='$phno'");
	$r7=mysqli_fetch_assoc($q7);
	
	
			if($q7)
			{
				
				$response['success'] =1; 	
				$response['result'] = $r7;    
				echo json_encode($response);
			}
			else
			{
				$response['success'] =0; 	
				$response['result'] = "Unsuccess";    
				echo json_encode($response);
			}
	
}

?>

