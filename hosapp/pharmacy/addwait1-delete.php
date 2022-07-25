
<?php
include("head.php");
#header('refresh:1');
session_start();
$id=$_SESSION['id'];
$password=$_SESSION['pass'];
?>

<div
style="margin-top:-500px;">

<table style="margin-top:10%;" >

<tr>
<td>

</td>
<td>

</td>
<td>
Waitinglist
</td>
<td>

</td>
</tr>



<?php
$con=mysqli_connect("localhost","root","","hospital1");
	
	$qwe=0;
	$re="SELECT ho.fname,ho.lname,ho.opno,tokenno as tokenno from hosusers ho,doctpatients d WHERE d.waitlist=0 and d.doctid=$id AND d.opno=ho.opno order by tokenno asc";
	
	$ab=mysqli_query($con, $re);
?>





<?php
	
while($row3=mysqli_fetch_assoc($ab))
{

?>

<tr >
<td style="overflow-y: scroll;">
<br>

<div style="float:left;width:500%;margin-left:40%;background-color: solid white;border-radius:20px;  width: 500px;  border: 5px solid green;  padding: 10px;">


<table style="margin-left:0%;">
<tr>
<td>Name:</td>
<td></td>
<td><?php echo $row3['fname'] ;echo " ";echo $row3['lname']?> </td><br>
</tr>
<tr>

<td >OP Number:</td>
<td></td>
<td style="margin-left:150%"><?php echo $row3['opno'] ;?></td>
</tr>
<tr>
<td>Token Number:</td>
<td></td>
<td><?php echo $row3['tokenno'] ;?></td>
</tr>
<tr>
<td>
<form class="form-container" method="post">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:white;border-radius:9px;" name="sub1">
		 Lab
		 </button>
		
</form>
		
</td>
<td>
<form class="form-container" method="post">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:white;border-radius:9px;" name="sub2">
		 Pharmacy
		 </button>
		
</form>
		
</td>
<td>
<form class="form-container" method="post">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:white;border-radius:9px;" name="sub3">
		 Remove
		 </button>
		
</form>
		
</td>
<td>
<form class="form-container" method="post">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:white;border-radius:9px;" name="submit3">
		 Add to Wait
		 </button>
		
</form>
		
</td>
</tr>
</table>
</div>
</td>



<?php
}
?>



<td>

 
 <div style="float:right; width: 50%;refresh:1; margin-top:%;margin-left:60%;background-color:solid white;border-radius:20px;  width: 500px; height:500px; border: 5px solid green;  padding:10px;overflow: scroll;">
<?php
if(isset($_POST['submit3']))
{
	$n=$_POST['tk'];
	$a=$_POST['op'];
	$f=$_POST['fn'];
	$l=$_POST['ln'];
	
	
	
	
$con=mysqli_connect("localhost","root","","hospital1");	
$sql1="UPDATE `doctpatients` SET `waitlist`=1 WHERE doctid=$id and tokenno=$n ";
mysqli_query($con, $sql1);

	
#$sql2="INSERT INTO `waitlist`(`doctid`, `opno`, `tokenno`) VALUES ($id,$a,$n)";
#mysqli_query($con, $sql2);

}
?>
<?php
$re1="SELECT * from doctpatients where doctid=$id and waitlist=1 order by tokenno ASC";
	
$ab1=mysqli_query($con, $re1);

	
while($row31=mysqli_fetch_assoc($ab1))
{
?>

<table>
<tr>
<td >OP Number:</td>
<td ><?php echo $row31['opno'] ;?></td>
</tr>
<tr>
<td>Token Number:</td>
<td><?php echo $row31['tokenno'] ;?></td>
</tr>
<tr>
<td>
<form class="form-container" method="post" >
		 <input type="text" name="tk" value="<?php echo $row31['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row31['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row31['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row31['lname'] ?>" hidden>
		 <button style="width:100px;height:50px;background:white;border-radius:9px;" name="submit5" >
		 Call
		 </button>
</form>
</td>
<td>
<form class="form-container" method="post">
		 
		 <input type="text" name="tk1" value="<?php echo $row31['tokenno'] ?>" hidden>
		 <input type="text" name="op1" value="<?php echo $row31['opno'] ?>" hidden>
		 <button style="width:80px;	height:50px;background:white;border-radius:9px;decoration:none;" name="submit4" >
		 Remove
		 </button>
		
</form>


</td>
</tr>
</table>
<?php
}
?>

 
 
</div>
</td>

</tr>
</table>


</div>


<?php
if(isset($_POST['submit4']))
{
	$n1=$_POST['tk1'];
	$a1=$_POST['op1'];
$con=mysqli_connect("localhost","root","","hospital1");	
$s1="delete from doctpatients where doctid=$id and opno=$a1 and tokenno=$n1";
mysqli_query($con, $s1);
}
?>
<?php
if(isset($_POST['submit5']))
{
	$n1=$_POST['tk'];
	$a1=$_POST['op'];
$con=mysqli_connect("localhost","root","","hospital1");	
$s1="UPDATE `doctpatients` SET `waitlist`=0 WHERE doctid=$id and opno=$a1 and tokenno=$n1";
mysqli_query($con, $s1);
}
?>