<?php
session_start();
$_SESSION['ROLLNO']='';
$_SESSION['login']='notlogin';
session_destroy();
header('location: session');
?>