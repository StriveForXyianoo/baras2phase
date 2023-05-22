<?php
session_start();
require 'dbcon.php';
if(isset($_POST['email']) && isset($_POST['password'])){


$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM user WHERE EMAIL = '$email' AND PASSWORD = '$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    foreach($result as $row){
        $_SESSION['ROLE'] = $row['ROLE'];
        $_SESSION["ID"] = $row['USERID'];
    }
    $response = array(
        'status' => 'success'
    );
}else{
    $response = array(
        'status' => 'failed'
    );
}
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>