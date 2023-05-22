<?php
require 'dbconn.php';
session_start();
if(isset($_POST['enroll'])){
    $subject = $_POST['subject'];
    $rollno = $_POST['rollno'];
    
    //check if existing
    $sql = "SELECT * FROM enrolsubject WHERE STUDENTID = '$rollno' AND SUBJECTID = '$subject'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       $_SESSION['enroll'] = 'existing';
         header('location: ../subject');
    }else{
        $sql = "INSERT INTO enrolsubject(STUDENTID, SUBJECTID) VALUES ('$rollno', '$subject')";
        if(mysqli_query($conn, $sql)){
            $_SESSION['enroll'] = 'enroll';
            header('location: ../subject');
        }else{
            $_SESSION['enroll'] = 'notenroll';
            header('location: ../subject');
        }
    }


   
}
?>