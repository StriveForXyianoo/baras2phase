<?php
session_start();
$id = $_SESSION['ID'];
require 'dbcon.php';
if(isset($_POST['saveannc'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    $sql = "INSERT INTO announcement(TITLE,DESCRIPTION,DATE,TIME,STATUS,who) VALUES ('$title','$description','$date','$time','$status','$id')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['annadd'] = "success";
        header("Location: ../viewannouncement");
    }else{
        $_SESSION['annadd'] = "failed";
        header("Location: ../viewannouncement");
    }
}
?>