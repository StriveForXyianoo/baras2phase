<?php
session_start();
if(!isset($_SESSION['login'])){
   $_SESSION['login'] = 'notlogin';
}
if($_SESSION['login'] == 'notlogin'){
    header('location: index.php');
}
if($_SESSION['login'] == 'login'){
    header('location: dashboard');
}
?>