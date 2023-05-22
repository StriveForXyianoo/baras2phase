<?php
include 'partials/thead.php';
?>
<?php
$subjectcode = $_GET['subjectcode'];
?>
<?php
if(!isset($_SESSION['upload'])){
    $_SESSION['upload'] = "";
}
if($_SESSION['upload']=='success'){
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Grades Successfully Uploaded</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['upload'] = "";
}elseif($_SESSION['upload']=='failed'){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed to Upload Grades</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['upload'] = "";
}
?>
<div class="container mt-3">
    <h3 class="text-center">
        <strong>Student List (<?php echo $subjectcode;?>)</strong>
    </h3>
    <form action="teachercontrol/controll" method="POST">
    <input type="hidden" name="subjectcode" value="<?php echo $subjectcode;?>">
    <button type="submit" class="btn btn-sm btn-primary mb-2" name="print">Print Student Class Record</button>
   
    </form> <button type="button"  class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#uploadrecord">Upload Grades</button>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-stripped">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">Name</th>
                        <th class="text-white">Grade</th>
                        <th class="text-white">Section</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT enrolsubject.*, studentinformation.*,enrolsubject.ID as IDKO FROM enrolsubject INNER JOIN studentinformation ON enrolsubject.STUDENTID = studentinformation.ROLLNO WHERE enrolsubject.SUBJECTID = '$subjectcode' ORDER BY NAME ASC";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        foreach($result as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['NAME']?></td>
                                <td><?php echo $row['GRADE']?></td>
                                <td><?php echo $row['SECTION']?></td>
                                <td>
                                    <a  class="btn btn-sm btn-primary delete-button"data-id="<?php echo $row['IDKO']; ?>">Remove</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="4" class="text-center">No Student Enrolled</td>
                        </tr>
                        <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$sql = "SELECT * FROM subjectinformation WHERE SPECIALCODE = '$subjectcode'";
$result = mysqli_query($conn, $sql);
foreach($result as $row){
    $subjectname = $row['SUBJECT'];
}

include 'uploadsubject.php';
?>
<script src="javascript/removestudent.js"></script>
<?php
include 'partials/tfoot.php';
?>