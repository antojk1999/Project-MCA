

<?php
#header('refresh:1');
include('dbcon.php');
session_start();
$id=$_SESSION['id'];
$dname=$_SESSION['dctname'];
?>


<?php
?>


<!DOCTYPE html>
<html>
<head>
<style>
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
        <th>Name</th>
        <th>Op Number</th>
		<th>Token Number</th>
		</tr>	
	  
	  	
<?php

//$con=mysqli_connect("localhost","root","","hospital1");
	
	$qwe=0;
	$re="SELECT ho.fname,ho.lname,ho.opno,tokenno as tokenno from hosusers ho,pharpatients d WHERE d.waitlist=0 and d.phid=$id AND d.opno=ho.opno order by tokenno asc";
	
	$ab=mysqli_query($con, $re);	
while($row3=mysqli_fetch_assoc($ab))
{

?>	  
      <tr>	  
        <td><?php echo $row3['fname'] ;echo " ";echo $row3['lname']?> </td>
        <td><?php echo $row3['opno'] ;?></td>
        <td><?php echo $row3['tokenno'] ;?></td>
      </tr>
	  
	  <tr>
	  <td>
	  
	 
	  </td>
	  <td>
	  
	  </td>
	  <td>
	  <form method="post">
		 
		 <input type="text" name="tk1" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op1" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:#f91d1df2;border-radius:9px;" name="submit4">
		 <text style="color:white;">Remove</text>
		 </button>
		
</form>
	  </td>
	  <td>
<form method="post">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
		 <input type="text" name="fn" value="<?php echo $row3['fname'] ?>" hidden>
		 <input type="text" name="ln" value="<?php echo $row3['lname'] ?>" hidden>
		 <button style="width:90px;height:40px;background:#0ac3b9;border-radius:9px;" name="submit3">
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
  
    
  <div class="column" style="width: 30%;overflow: scroll;">
  <?php
if(isset($_POST['submit3']))
{
	
	$n=$_POST['tk'];
	$a=$_POST['op'];
	$f=$_POST['fn'];
	$l=$_POST['ln'];

//$con=mysqli_connect("localhost","root","","hospital1");	
$sql1="UPDATE `pharpatients` SET `waitlist`=1 WHERE phid=$id and tokenno=$n ";
mysqli_query($con, $sql1);

	
#$sql2="INSERT INTO `waitlist`(`doctid`, `opno`, `tokenno`) VALUES ($id,$a,$n)";
#mysqli_query($con, $sql2);

}
?>
    <table>
      <tr>
        <th>OP Number</th>
        <th>Token Number</th>
        
      </tr>
	  
	  
	  
	  
<?php
$re1="SELECT * from pharpatients where phid=$id and waitlist=1 order by tokenno ASC";
	
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
	  <form  method="post" >
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
if(isset($_POST['submit4']))
{
	$n1=$_POST['tk1'];
	$a1=$_POST['op1'];
//$con=mysqli_connect("localhost","root","","hospital1");	
$s1="delete from pharpatients where phid=$id and opno=$a1 and tokenno=$n1";
mysqli_query($con, $s1);
}
?>
<?php
if(isset($_POST['submit5']))
{
	#header('refresh:1');
	$n1=$_POST['tk'];
	$a1=$_POST['op'];
//$con=mysqli_connect("localhost","root","","hospital1");	
$s1="UPDATE `pharpatients` SET `waitlist`=0 WHERE phid=$id and opno=$a1 and tokenno=$n1";
mysqli_query($con, $s1);
}
?>