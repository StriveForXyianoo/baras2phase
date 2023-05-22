<?php
session_start();
$_SESSION['ROLE'] = '';
$_SESSION['ID'] = '';
session_destroy();
header('Location: index');
?>