<?php
$host = "localhost";
$name = "root";
$pass = "";
$db = "lmsphase2";


$conn = mysqli_connect($host, $name, $pass, $db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
