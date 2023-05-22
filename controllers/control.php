<?php
include 'dbcon.php';
session_start();
$id = $_SESSION['ID'];
require '../phpmail.php';
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $role = $_POST['role'];
    $Email = $_POST['Email'];
    $status = $_POST['status'];
   
    //generate userid
    $len = 6;
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charlen = strlen($char);
    $userid = '';
    for ($i = 0; $i < $len; $i++) {
        $userid .= $char[rand(0, $charlen - 1)];
    }    
    //generate random password
    $length = 12;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }
    $newpass = md5($password);
    

    $mail->Body = "Your account has been created as $role. Your userid is $userid and your password is $password";
    $mail->addAddress($Email);
    if($mail->send()){
        $sql = "INSERT INTO user (USERID,NAME,EMAIL,ROLE,STATUS,PASSWORD) VALUES ('$userid','$name','$Email','$role','$status','$newpass')";
    $result = mysqli_query($conn,$sql);
    if($result){
       
        $_SESSION['useradd'] = "success";
        header("Location: ../userph");
    }else{
        $sql = "DELETE FROM user WHERE USERID = '$userid'";
        $result = mysqli_query($conn,$sql);
        $_SESSION['useradd'] = "failed";
        header("Location: ../userph");
    }
    }

    

}

if(isset($_POST['addStudent'])){
    $rollno = $_POST['rollno'];
    $grade = $_POST['grade'];
    $name = $_POST['name'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $email = $_POST['email'];

     //generate random password
     $length = 12;
     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters);
     $password = '';
     for ($i = 0; $i < $length; $i++) {
         $password .= $characters[rand(0, $charactersLength - 1)];
     }

     $newpass = md5($password);
    if($rollno == "" || $grade == "" || $name == "" || $section == "" || $gender == "" || $status == "" || $email == ""){
        $_SESSION['studentadd'] = "fail";
        header("Location: ../add_student");
    }else{
        $mail->Body = "Your account has been created as student. Your userid is $rollno and your password is $password";
        $mail->addAddress($email);
        if($mail->send()){
            $sql = "INSERT INTO studentinformation(ROLLNO,NAME,GENDER,GRADE,SECTION,STATUS,EMAIL,PASSWORD) VALUES ('$rollno','$name','$gender','$grade','$section','$status','$email','$newpass')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['studentadd'] = "success";
            header("Location: ../student");
        }else{
            $_SESSION['studentadd'] = "failed";
            header("Location: ../student");
        }
        }
        

    }
}

if(isset($_POST['saveupdate'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $Email = $_POST['Email'];
    $status = $_POST['status'];

    $sql = "UPDATE user SET NAME = '$name', ROLE = '$role', EMAIL = '$Email', STATUS = '$status' WHERE ID = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['userupdate'] = "success";
        header("Location: ../userph");
    }else{
        $_SESSION['userupdate'] = "failed";
        header("Location: ../userph");
    }
    
}
if(isset($_POST['updateStudent'])){
    $id = $_POST['id'];
    $rollno = $_POST['rollno'];
    $grade = $_POST['grade'];
    $name = $_POST['name'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $email = $_POST['email'];

    $sql = "UPDATE `studentinformation` SET `ROLLNO`='$rollno',`NAME`='$name',`GENDER`='$gender',`GRADE`='$grade',`SECTION`='$section',`STATUS`='$status',`EMAIL`='$email' WHERE ID = '$id' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['studentupdate'] = "success";
        header("Location: ../student");
    }else{
        $_SESSION['studentupdate'] = "failed";
        header("Location: ../student");
    }
    
}
if(isset($_POST['upload'])){
    $specialcode = $_POST['specialcode'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $stardate = $_POST['star-date'];
    $end = $_POST['enddate'];
    $type = $_POST['type'];
    $_FILES["file"]["name"];
    $teacherid = $_SESSION["ID"];
    $id = $_POST['id'];

    $directory = "../uploads/";
    $file = $directory . basename($_FILES["file"]["name"]);
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $file)){
        $sql = "INSERT INTO subjectdata(DESCRIPTION,LINK,FILE,STARTDATE,ENDDATE,SUBJECTCODE,TYPE,TEACHERID) VALUES ('$description','$link','$file','$stardate','$end','$specialcode','$type','$teacherid')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['upload'] = "success";
            header("Location: ../t_sub?idsubject=$id");
        }else{
            $_SESSION['upload'] = "failed";
            header("Location: ../t_sub?idsubject=$id");
        }

    }else{
        $sql = "INSERT INTO subjectdata(DESCRIPTION,LINK,FILE,STARTDATE,ENDDATE,SUBJECTCODE,TYPE,TEACHERID) VALUES ('$description','$link','N/A','$stardate','$end','$specialcode','$type','$teacherid')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['upload'] = "success";
            header("Location: ../t_sub?idsubject=$id");
        }else{
            $_SESSION['upload'] = "failed";
            header("Location: ../t_sub?idsubject=$id");
        }
    }

}
?>