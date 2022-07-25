<?php
include 'connection.php';
$id = $_GET['id'];
$status =0;
mysqli_query($con,"UPDATE tbl_login set status='$status' where login_id = '$id'");
header("Location:../customers.php");
?>