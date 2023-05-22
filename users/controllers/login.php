<?php
require 'dbconn.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
   
    $sql = "SELECT * FROM studentinformation WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $_SESSION['login'] = 'login';
        $_SESSION['message']='succcess';
        foreach($result as $row){
            $_SESSION['ROLLNO'] = $row['ROLLNO'];
        }
        header('location: ../session.php');
    }else{
        $_SESSION['message']='failed';
       $_SESSION['login'] = 'notlogin';
       header('location: ../session.php');
    }

}
?>