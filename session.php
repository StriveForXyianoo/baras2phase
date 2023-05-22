<?php
if(!isset($_SESSION['ROLE'])){
    $_SESSION['ROLE'] = '';
}
if($_SESSION['ROLE'] =='ADMINISTRATOR'){
    header('Location: admindashboard');
}

if($_SESSION['ROLE'] == '' || $_SESSION['ROLE'] == ''){
    header('Location: index');
}
?>