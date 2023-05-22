<?php
require 'partials/header.php';
$myid = $_SESSION['ROLLNO'];
?>
<div class="container mt-3">
    <?php
    if(!isset($_SESSION['enroll'])){
        $_SESSION['enroll'] = '';
    }
    if($_SESSION['enroll']=='enroll'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Subject Enrolled.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        $_SESSION['enroll'] = '';
    }elseif($_SESSION['enroll']=='notenroll'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Subject Not Enrolled.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        $_SESSION['enroll'] = '';
    }elseif($_SESSION['enroll']=='existing'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Subject Already Enrolled.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        $_SESSION['enroll'] = '';
    }
    ?>
    <h3>Subject</h3>
    <div class="row">
        <div class="col">
            <h5 class="float-end"> Search Class Code</h5>
        </div>
        <div class="col"><form action="subjectview" method="post">
            <input type="search" name="subjectocde" class="form-control" placeholder="Search Class Code" required>
            
        </div>
        <div class="col"><button type="submit" name="addSubject" class="btn  btn-warning">Enroll Subject</button></div></form>
    </div>
    <h2 class="text-center mt-3">My Subject</h2>
    <table class="table table-stripped table hover">
        <thead class="bg-dark">
            <tr>
                <th class="text-white">Subject</th>
                <th class="text-white">Teacher</th>
                <th class="text-white">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT enrolsubject.*,enrolsubject.ID as enrolid,subjectinformation.*,user.* FROM enrolsubject INNER JOiN subjectinformation ON subjectinformation.SPECIALCODE = enrolsubject.SUBJECTID INNER JOIN user ON user.USERID = subjectinformation.TEACHERID WHERE enrolsubject.STUDENTID ='$myid'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                    foreach($result as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['SUBJECT']?></td>
                            <td><?php echo $row['NAME']?></td>
                            <td><a href="viewsubject?idsubject=<?php echo $row['SPECIALCODE']?>" class="btn btn-sm btn-primary">View</a>
                            <button class="btn btn-sm btn-danger delete-button"data-id="<?php echo $row['enrolid']; ?>">Unenroll</button>
                            </td>

                        </tr>
                        <?php
                    }
            }else{
                echo '<h1 class="text-center mt-5">No Subject</h1>';
            }
            ?>
        </tbody>
    </table>
</div>
<script src="javascript/uneroll.js"></script>
<?php
require 'partials/foot.php';
?>