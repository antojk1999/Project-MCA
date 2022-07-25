

<?php
session_start();
if(isset($_SESSION['id']))
{
#header('refresh:1');

$id=$_SESSION['id'];
$dname=$_SESSION['dctname'];
?>


<?php
?>


<!DOCTYPE html>
<html>
<head>
<style>
.butto {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.butt {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
  margin-top:2%;
}
  
.column {
	height:500px;
  float: left; 
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

button{
	width:200px;
	height:50px;
	background:#f5f5f5;
	border-radius:15px;
}
</style>
</head>
<body>

<div style="height:50px;width:100%;background:#261870bf;"> 

</div>

<div class="row">

<div class="column" style="width: 15%;background:#261656;">

<?php include("head.php");?>
</div>

  <div class="column" style="width:50%;overflow: scroll;">
	<table>	
		<tr>
		<th><button class="butto butt">Patients List</button></th>
		</tr>
		<tr>
        <th>Name</th>
        <th>Op Number</th>
		<th>Token Number</th>
		<th>Time</th>
		</tr>	
	  
	  	
<?php

$con=mysqli_connect("localhost","root","","hospital1");
	
	$qwe=0;
	
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d');
	$re="SELECT d.pcalltime,ho.fname,ho.lname,ho.opno,tokenno as tokenno from hosusers ho,doctpatients d WHERE d.bdate='$d' and d.waitlist in ('0','2') and d.doctid=$id AND d.opno=ho.opno order by tokenno asc";
	
	$ab=mysqli_query($con, $re);	
while($row3=mysqli_fetch_assoc($ab))
{

?>	  
      <tr>	  
        <td><?php echo $row3['fname'] ;echo " ";echo $row3['lname']?> </td>
        <td><?php echo $row3['opno'] ;?></td>
        <td><?php echo $row3['tokenno'] ;?></td>
        <td><?php echo $row3['pcalltime'] ;?></td>
      </tr>
	  
	  <tr>
	  <td>
	  
	 <form method="post" action="addwait.php">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:#056f51;border-radius:9px;" name="submit12">
		<text style="color:white;"> Call
		 </button>
		
		</form>
	  </td>
	  <td>
	  <!--
<form method="post">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:#056f51;border-radius:9px;" name="sub2">
		 <text style="color:white;">Pharmacy
		 </button> -->
		
</form>
	  </td>
	  <td>
	  <form method="post">
		 
		 <input type="text" name="tk1" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op1" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:#ee1414a8;border-radius:9px;" name="submit4">
		 <text style="color:white;">Remove</text>
		 </button>
		
</form>
	  </td>
	  <td>
<form method="post" action="addwait.php">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:#056f51;border-radius:9px;" name="submit3">
		 <text style="color:white;">Add to Wait
		 </button>
		
</form>
		
</td>
</tr>
	  
	  
  <?php
  }
  ?>
  
  
 </table>

 </div>
 <?php
if(isset($_POST['submit12']))		//add to pharmacy not cmpleate
{
$a1=$_POST['op'];
$con=mysqli_connect("localhost","root","","hospital1");

date_default_timezone_set('Asia/Kolkata');
$d=date('H:i:s');

$w=mysqli_query($con,"UPDATE `doctpatients` SET `waitlist`=2,`calltime`='$d' WHERE doctid='$id' and opno='$a1'");

$r=mysqli_query($con,"SELECT tokenno,pcalltime,calltime FROM `doctpatients`WHERE doctid='$id' and waitlist=2 and tokenno in(SELECT max(tokenno) from doctpatients where waitlist=2)");
if($ro=mysqli_fetch_assoc($r))
{
	
	$t11=$ro['pcalltime'];
	$t12=$ro['calltime'];
	
	//$t1=new DateTime($t11);
	//$t2=new DateTime($t12);
	//$cal=$t1->diff($t2);
	//$c=$cal->format('%H:%i');
	
	$s1 = strtotime($t11);
	$m1 = strtotime($t12);
	$ca=$s1-$m1;

	if($ca < 0)
	{
		//plus all tme
		
		$ca=abs($ca);		
		$w1=mysqli_query($con,"SELECT * from doctpatients WHERE waitlist='0' and doctid='$id'");
		while($ro1=mysqli_fetch_assoc($w1))
		{
			$s=$ro1['pcalltime'];
			$cenvertedTime = date('H:i:s',strtotime('+ '.$ca. 'seconds',strtotime($s)));
			$oo=$ro1['opno'];
			$w12=mysqli_query($con,"UPDATE `doctpatients` SET `pcalltime`='$cenvertedTime' WHERE opno='$oo'");
			
		}
	}
	else
	{
		//minus all time
		$ca=abs($ca);		
		$w1=mysqli_query($con,"SELECT * from doctpatients WHERE waitlist='0' and doctid='$id'");
		while($ro1=mysqli_fetch_assoc($w1))
		{
			$s=$ro1['pcalltime'];
			$cenvertedTime = date('H:i:s',strtotime('- '.$ca. 'seconds',strtotime($s)));
			$oo=$ro1['opno'];
			$w12=mysqli_query($con,"UPDATE `doctpatients` SET `pcalltime`='$cenvertedTime' WHERE opno='$oo'");
			
		}
		
		
	}
	
	$p=mysqli_query($con,"UPDATE `doctpatients` SET `pcalltime`='$d',atime=$ca WHERE doctid='$id' and opno='$a1' and `waitlist`=2");

}
}
?>
 
 
 
<?php
if(isset($_POST['sub2']))		//add to pharmacy not cmpleate
{
$a1=$_POST['op'];
$con=mysqli_connect("localhost","root","","hospital1");	
$qu="SELECT `doctid`, `opno` FROM `pharpatients` WHERE doctid=$id and opno=$a1";
$re1=mysqli_query($con, $qu);
$rowcount=mysqli_num_rows($re1);
if($rowcount > 0)
{
echo '<script>alert("Already added to the pharmacy")</script>';
}
else
{
	$w=mysqli_query($con,"select count as c from waitcount WHERE doctid='2010'");
	$w1=mysqli_fetch_assoc($w);
	$w2=$w1['c']+1;	
	$s11="INSERT INTO `pharpatients`(`phid`, `doctid`, `opno`, `tokenno`) VALUES ('2010','$id','$a1',$w2)";
	$w3=mysqli_query($con,"UPDATE `waitcount` SET `count`='$w2' WHERE doctid='2010'");
	
	
	
mysqli_query($con, $s11);
echo '<script>alert("Successfully added to the pharmacy")</script>';
}

}
?>
  
    
  <div class="column" style="width: 30%;overflow: scroll;">
  <?php
if(isset($_POST['submit3'])) 		//add to wait
{
	
	$n=$_POST['tk'];
	$a=$_POST['op'];
	$f=$_POST['fn'];
	$l=$_POST['ln'];

$con=mysqli_connect("localhost","root","","hospital1");	

$wa=mysqli_query($con,"select max(wait) as wait from doctpatients where doctid=$id;");
$w1=mysqli_fetch_assoc($wa);
$c=$w1['wait'];
$c=$c+1;

$sql1="UPDATE `doctpatients` SET `waitlist`=1,wait=$c WHERE doctid=$id and tokenno=$n ";
mysqli_query($con, $sql1);


#$sql2="INSERT INTO `waitlist`(`doctid`, `opno`, `tokenno`) VALUES ($id,$a,$n)";
#mysqli_query($con, $sql2);


}
?>
    <table>
	<tr>
		<th><button class="butto butt">Wailting List</button></th>
		</tr>
      <tr>
        <th>OP Number</th>
        <th>Token Number</th>
        
      </tr>
	  
	  
	  
	  
<?php
$re1="SELECT * from doctpatients where doctid=$id and waitlist=1 order by wait ASC";
	
$ab1=mysqli_query($con, $re1);

	
while($row31=mysqli_fetch_assoc($ab1))
{
?>

	  
	  
	  
      <tr>
        <td><?php echo $row31['opno'] ;?></td>
        <td><?php echo $row31['tokenno'] ;?></td>
        
      </tr>
	  
	  <tr>
	  <td>
	  <form  method="post" action="addwait.php">
		 <input type="text" name="tk" value="<?php echo $row31['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row31['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row31['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row31['lname'] ?>" hidden>
		 <button style="width:100px;height:50px;background:#056f51;border-radius:9px;" name="submit5" >
		 <text style="color:white;">Call
		 </button>
</form>
	  </td>
	  
	  <td>
<form  method="post">
		 
		 <input type="text" name="tk1" value="<?php echo $row31['tokenno'] ?>" hidden>
		 <input type="text" name="op1" value="<?php echo $row31['opno'] ?>" hidden>
		 <button style="width:80px;	height:50px;background:#ee1414a8;border-radius:9px;decoration:none;" name="submit4" >
		 <text style="color:white;">Remove
		 </button>
		
</form>


</td>
	  </tr>
	  
	  
<?php
}

?>     
    </table>
  </div>
</div>

</body>
</html>

<?php
if(isset($_POST['submit4']))		//remove from waitlist
{
	$n1=$_POST['tk1'];
	$a1=$_POST['op1'];
$con=mysqli_connect("localhost","root","","hospital1");	
$s1="delete from doctpatients where doctid=$id and opno=$a1 and tokenno=$n1";
mysqli_query($con, $s1);





}
?>
<?php
if(isset($_POST['submit5']))		//call from waitlist
{
	
	$n1=$_POST['tk'];
	$a1=$_POST['op'];
$con=mysqli_connect("localhost","root","","hospital1");	
$s1="UPDATE `doctpatients` SET `waitlist`=0 WHERE doctid=$id and opno=$a1 and tokenno=$n1";
mysqli_query($con, $s1);
}
}
else{
	
	header("location:../doctorlogin.php");
}
?>

