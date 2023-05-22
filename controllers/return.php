<?php
require 'dbcon.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "UPDATE uploadstudent SET STATUS='CHECKED' WHERE ID = '$id'";
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