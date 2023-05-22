<?php
session_start();
if($_SESSION['ROLE']=="ADMINISTRATOR"){
    header('Location: admindashboard');
}
if($_SESSION['ROLE']=="INSTRUCTOR"){
    header('Location: t_dashboard');
}
if($_SESSION['ROLE']==''){
    header('Location: index');
}
?>