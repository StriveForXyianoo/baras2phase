<?php
require 'dbconn.php';
session_start();
$studentid =$_SESSION['ROLLNO'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "INSERT INTO uploadstudent(DATAID,LINK,REMARK,DATEUPLOAD,STUDENTID,STATUS) VALUES ('$id','MARK AS DONE','MARK AS DONE',NOW(),'$studentid','DONE')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $response = array(
            'status' => 'success'
        );
    } else {
        $response = array(
            'status' => 'failed'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>