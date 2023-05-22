<?php
 require 'vendor/autoload.php';
 require '../config.php';
session_start();
require '../phpmail.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

if(isset($_POST['print'])){
    $subjectcode = $_POST['subjectcode'];

    $sql = "SELECT enrolsubject.*, studentinformation.* FROM enrolsubject INNER JOIN studentinformation ON enrolsubject.STUDENTID = studentinformation.ROLLNO WHERE enrolsubject.SUBJECTID = '$subjectcode' ORDER BY NAME ASC";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        //generate  excel file with  the list of student including their studentID and name
        //sert the cell header into center and bold
        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        //make also the cell  width pit to text
        $sheet->getColumnDimension('A')->setAutoSize(true);
        //add more width to the cell

        //all column in g and more will have the formula average  of c,d,e,f


        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);

        //set the border of the cell of eacher cell and colums
        $sheet->getStyle('A1:H1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A1:H1')->getBorders()->getAllBorders()->getColor()->setARGB('000000');
        //set c,d,e,f,g,h to center
        $sheet->getStyle('C1:H1')->getAlignment()->setHorizontal('center');
        //set the border of each column and row
        $sheet->getStyle('A1:H1')->getBorders()->getOutline()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->setCellValue('A1', 'Student ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'FIRST QUARTER');
        $sheet->setCellValue('D1', 'SECOND QUARTER');
        $sheet->setCellValue('E1', 'THIRD QUARTER');
        $sheet->setCellValue('F1', 'FOURTH QUARTER');
        $sheet->setCellValue('G1', 'FINAL GRADE');
        $sheet->setCellValue('H1', 'REMARKS');
        $i = 2;
        foreach($result as $row){
            $sheet->setCellValue('A'.$i, $row['STUDENTID']);
            $sheet->setCellValue('B'.$i, $row['NAME']);
            $sheet->setCellValue('C'.$i, '');
            $sheet->setCellValue('D'.$i, '');
            $sheet->setCellValue('E'.$i, '');
            $sheet->setCellValue('F'.$i, '');
            //set the g with the formula of average of c,d,e,f round off to no decimal place
            $sheet->setCellValue('G'.$i, '=ROUND(AVERAGE(C'.$i.':F'.$i.'),0)');
            //set the h with the formula of if g is greater than 74 then passed else failed if failed the cell color is red
            $sheet->setCellValue('H'.$i, '=IF(G'.$i.'>74,"PASSED","FAILED")');
            $i++;
        }
     
        $writer = new Xlsx($spreadsheet);
        $filename = 'Student Class Record.xlsx';
        //download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $filename.'"');
        $writer->save('php://output');

        header('Location: t_student?subjectcode='.$subjectcode.'');
        }else{
        ?>
        <script>
            alert("No Student Enrolled");
            window.location.href = "../t_student?subjectcode=<?php echo $subjectcode?>";
        </script>
        <?php
    }
}
use PhpOffice\PhpSpreadsheet\IOFactory;
if(isset($_POST['upload'])){
    $subjectid = $_POST['subjectid'];
    $subjectname = $_POST['subjectname'];
    $file = $_FILES['file'];
    $filepath = $file['tmp_name'];

    $reader = IOFactory::load($filepath);
    $worksheet = $reader->getActiveSheet();
    $data = $worksheet->toArray();

    foreach($data as $row){
        $studentid = $row['0'];
        $una = $row['2'];
        $pangalawa = $row['3'];
        $pangatlo = $row['4'];
        $pangapat = $row['5'];
        $finalgrade = $row['6'];
        $remarks = $row['7'];
        $sql = "INSERT INTO gradesinformation(STUDENTID,SUBJECTID,SUBJECT,UNA,PANGALAWA,PANGATLO,PANGAPAT,FINALGRADE,REMARKS) VALUES ('$studentid','$subjectid','$subjectname','$una','$pangalawa','$pangatlo','$pangapat','$finalgrade','$remarks')";
        $result = mysqli_query($conn, $sql);
    }
    if($result){
        $_SESSION['upload'] = "success";
        header('Location: ../t_student?subjectcode='.$subjectid.'');
    }else{
        $_SESSION['upload'] = "failed";
        header('Location: ../t_student?subjectcode='.$subjectid.'');
    }


    
    
}
if(isset($_POST['bulkstudent'])){
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $file = $_FILES['file'];
    $filepath = $file['tmp_name'];

    $reader = IOFactory::load($filepath);
    $worksheet = $reader->getActiveSheet();
    $data = $worksheet->toArray();

    //read each row of the excel file except the first column
    $firstrow = true;

    foreach($data as $row){
        if($firstrow){
            $firstrow = false;
            continue;
        }
        $rollno = $row['0'];
        $name = $row['1'];
        $gender = $row['2'];
        $email = $row['3'];

        //generate random password
        $length = 12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        $newpass = md5($password);

        $mail->Body = "Your account has been created as Student. Your email is $email and your password is $password";
        $mail->addAddress($email);
        if($mail->send()){
            $sql = "INSERT INTO studentinformation(ROLLNO,NAME,GENDER,SECTION,STATUS,EMAIL,PASSWORD,GRADE) VALUES ('$rollno','$name','$gender','$section','Active','$email','$newpass','$grade')";
            $result = mysqli_query($conn, $sql);
        }else{
            $_SESSION['bulkstudent'] = "failed";
            header('Location: ../student');
        }

    }
    if($result){
        $_SESSION['bulkstudent'] = "success";
        header('Location: ../student');
    }else{
        $_SESSION['bulkstudent'] = "failed";
        header('Location: ../student');
    }
   

}

?>