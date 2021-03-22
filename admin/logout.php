<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
$_SESSION['errmsg']="You have successfully logout";
header("location:index.php");
?>
