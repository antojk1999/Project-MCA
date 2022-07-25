

<?php
include('dbcon.php');
session_start();
$id=$_SESSION['id'];
$password=$_SESSION['pass'];
?>
<html>
<head>
<style>

.form-popup {
  
  display: none;
  position: fixed;
  top:10%;
  bottom:10%;
  right:31%;
  
  
  border: 3px solid #f1f1f1;
  z-index: 9;
}

.form-container {
  max-width: 500px;
  padding: 30px;
  background-color:white;
  
}

.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

ul li a{
	color:white;
	text-decoration:none;
	
}

button{
	width:150px;
	height:50px;
	background:#f5f5f5;
	border-radius:15px;
}

btn{
	top:10%;
	width:150px;
	height:50px;
	background:#24ddf5;
	border-radius:15px;
}
</style>
</head>
<body>

<div style="
margin-top:-10px;
background:green	;
width:100%;
height:100px;">
<p style="margin-left:80%;"><a href="userlogin.php"> <button>Logout</button></a></p>
</div>
<div style="margin-top:-15px;
margin-left:0px;
background:;
width:200px;
height:100%;">


<div style="margin-left:-50px">
<ul>

 <table cellpadding="20px" cellspacing="20px" >
 <tr>
 <td><l><button>Hospital Booking</button> </li></td>
 </tr>
 <tr>
 <td><l><button>Hospital Booking</button> </li></td>
 </tr>
 <tr>
 <td><l><button>Hospital Booking</button> </li></td>
 </tr>
 <tr>
 <td><l><button>Hospital Booking</button> </li></td>
 </tr>
 
</ul>
</table>
</div>

</div>


<div
style="margin-top:-500px; ">



<?php
//$con=mysqli_connect("localhost","root","","hospital1");
	
	
	$re="SELECT ho.fname,ho.lname,ho.opno,tokenno as tokenno from hosusers ho,doctpatients d WHERE d.doctid=$id AND d.opno=ho.opno order by tokenno asc";
	
	$ab=mysqli_query($con, $re);

	
while($row3=mysqli_fetch_assoc($ab))
{

?>

<table>
<tr>
<td>
<br>
<div style="
margin-left:40%;
background-color: solid white;
border-radius:20px;
  width: 500px;
  border: 5px solid green;
  padding: 10px;
  ">

<table style="margin-left:0%;">
<tr>
<td>Name:</td>
<td><?php echo $row3['fname'] ;echo " ";echo $row3['lname']?> </td><br>
</tr>
<tr>

<td >OP Number:</td>
<td style="margin-left:150%"><?php echo $row3['opno'] ;?></td>
</tr>
<tr>
<td>Token Number:</td>
<td><?php echo $row3['tokenno'] ;?></td>
</tr>
<tr>
<td>
<form class="form-container" method="post" action="">
		 
		 <button style="width:70px;height:40px;background:white;border-radius:9px;" >
		 <a  href="patientdel.php?va=<?php echo $row3['tokenno'] ?>" name="submit2">move</a>
		 </button>
		 </form>
</td>
<td>
<form class="form-container" method="post" action="">
		 
		 <input type="text" name="tk" value="<?php echo $row3['tokenno'] ?>" hidden>
		 <input type="text" name="op" value="<?php echo $row3['opno'] ?>" hidden>
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
<div style="
margin-left:40%;
background-color: solid white;
border-radius:20px;
  width: 500px;
  border: 5px solid green;
  padding: 10px;
  ">
  


<?php
if(isset($_POST['submit3']))
{
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


  
  
<table style="margin-left:0%;">
<tr>

<td >OP Number:</td>
<td style="margin-left:150%"><?php echo $row31['opno'] ;?></td>
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

</td>
<?php
}

?>
</tr>
</table>
</div>

<?php
}
?>

</div>
</body>
</html>

