
<?php
include('dbcon.php');
header("Reload:1");
if(isset($_POST['submit3'])){
	$n=$_POST['tk'];
	$a=$_POST['op'];
	
//$con=mysqli_connect("localhost","root","","hospital1");	
$sql1="delete from doctpatients where doctid=$id and tokenno=$n";
mysqli_query($con, $sql1);

	
$sql2="INSERT INTO `waitlist`(`doctid`, `opno`, `tokenno`) VALUES ($id,$a,$n)";
mysqli_query($con, $sql2);



$re1="SELECT * from waitlist where doctid=$id order by tokenno ASC";
	
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
<form class="form-container" method="post" action="">
		 
		 <button style="width:100px;height:50px;background:white;border-radius:9px;" name="submit2" >
		 <a  href="patientdel.php?va=<?php echo $row3['tokenno'] ?>" >Call</a>
		 </button></form>
</td>
<td>
<form class="form-container" method="post" action="">
		 
		 
		 <button style="width:80px;	height:50px;background:white;border-radius:9px;decoration:none;" name="submit3" >
		 <a  href="patientdel.php?va=<?php echo $row3['tokenno'] ?>" >Remove</a>
		 </button>
		
		</form>
</td>
</tr>
</table>
<?php
}
}
?>
