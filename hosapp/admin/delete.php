<?php
include('dbcon.php');
//$con=mysqli_connect('localhost','root','','hospital1');
$i=$_GET['id'];
mysqli_query($con,"DELETE FROM `deptdoctors` WHERE doctid=$i");
mysqli_query($con,"DELETE FROM `waitcount` WHERE doctid=$i");
header("location:listdoc.php");

?>