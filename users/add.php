<?php
session_start();
require '../controllers/dbcon.php';
if(isset($_POST['upload'])){
    $studentid = $_SESSION['ROLLNO'];
    $dataid = $_POST['dataid'];
    $remark = 'SUBMITTED';
    $files = $_FILES['file'];
    $status ='DONE';

    //move file to folder ../uploads
    $directory = "../uploads/";
    $file = $directory . basename($_FILES["file"]["name"]);
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $file)){
        $sql = "INSERT INTO uploadstudent(DATAID,LINK,REMARK,DATEUPLOAD,STUDENTID,STATUS) VALUES ('$dataid','$file','$remark',NOW(),'$studentid','$status')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $response = array(
                'status' => 'success'
            );
        }else{
            $response = array(
                'status' => 'failed'
            );
        }
    }else{
        $response = array(
            'status' => 'failed'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    
    header('location: open?openme='.$dataid.'');

}
?>