<?php
session_start();
$id = $_SESSION['ID'];
require 'dbcon.php';

if(isset($_POST['subjectadd'])){
   $subjectname = $_POST['subjectname'];
    $grades = $_POST['grades'];
    $section = $_POST['section'];
    $status = $_POST['status'];
    $enroll = $_POST['enroll'];

    //generate subject code
    $len = 6;
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charlen = strlen($char);
    $subjectcode = '';
    for ($i = 0; $i < $len; $i++) {
        $subjectcode .= $char[rand(0, $charlen - 1)];
    }


    $sql = "INSERT INTO subjectinformation(SUBJECT,GRADES,SECTION,STATUS,SPECIALCODE,TEACHERID) VALUES ('$subjectname','$grades','$section','$status','$subjectcode','$id')";
    $result = mysqli_query($conn,$sql);
    if($result){
        if($enroll == "Enroll" ){
            $sql = "SELECT * FROM studentinformation WHERE GRADE = '$grades' AND SECTION = '$section'";
            $result = mysqli_query($conn,$sql);
            foreach($result as $row){
                $studentid = $row['ROLLNO'];
                $sql = "INSERT INTO enrolsubject(STUDENTID,SUBJECTID) VALUES ('$studentid','$subjectcode')";
                $result = mysqli_query($conn,$sql);
            }

        }
        $_SESSION['subjectadd'] = "success";
        header("Location: ../t_dashboard");
    }else{
        $_SESSION['subjectadd'] = "failed";
        header("Location: ../t_dashboard");
    }

}

?>