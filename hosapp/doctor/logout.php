<?php
session_unset();
session_destroy();
header("location:../doctorlogin.php");
?>