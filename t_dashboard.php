<?php
include 'partials/thead.php';
?>
<?php

if(!isset($_SESSION['subjectadd'])){
    $_SESSION['subjectadd'] = "";
}

?>
<div class="container mt-5">
    <?php
    if($_SESSION['subjectadd']=='success'){
        ?>
       <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>Subject Successfully Added</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        <?php
        $_SESSION['subjectadd'] = "";
    }elseif($_SESSION['subjectadd']=='failed'){
        ?>
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Failed To Add Subject</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        <?php
        $_SESSION['subjectadd'] = "";
    }



    //count the my subject
    $sub = "SELECT COUNT(ID) FROM subjectinformation WHERE STATUS = 'ACTIVE' AND TEACHERID = '$id'";
    $result = mysqli_query($conn, $sub);
    $row = mysqli_fetch_assoc($result);
    $count = $row['COUNT(ID)'];

    //count the activity
    $act = "SELECT COUNT(ID) FROM subjectdata WHERE TYPE='ACTIVITY'  AND TEACHERID='$id'";
    $result = mysqli_query($conn, $act);
    $row = mysqli_fetch_assoc($result);
    $countact = $row['COUNT(ID)'];

    //count assignment 
    $ass = "SELECT COUNT(ID) FROM subjectdata WHERE TYPE='ASSIGNMENT'  AND TEACHERID='$id'";
    $result = mysqli_query($conn, $ass);
    $row = mysqli_fetch_assoc($result);
    $countass = $row['COUNT(ID)'];

    //count quiz 
    $quiz = "SELECT COUNT(ID) FROM subjectdata WHERE TYPE='QUIZ'  AND TEACHERID='$id'";
    $result = mysqli_query($conn, $quiz);
    $row = mysqli_fetch_assoc($result);
    $countquiz = $row['COUNT(ID)'];
    ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-start"><strong>Total Subject</strong></h5>
                    <h6 class="text-end"><strong><?php echo $count?></strong></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-start"><strong>Activity</strong></h5>
                    <h6 class="text-end"><strong><?php echo $countact?></strong></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-start"><strong>Assigment</strong></h5>
                    <h6 class="text-end"><strong><?php echo $countass?></strong></h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-start"><strong>Quiz</strong></h5>
                    <h6 class="text-end"><strong><?php echo $countquiz?></strong></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <h3 class="text-center">
            <strong>My Subject</strong>
            <button class="btn btn-sm btn-warning float-end" data-bs-toggle="modal" data-bs-target="#AddSubject">Add Subject</button>
        </h3>
        <table class="table table-stripped table-hover">
            <thead class="bg-dark">
                <tr>
                    <th class="text-white">Subject Name</th>
                    <th class="text-white">Grade</th>
                    <th class="text-white">Section</th>
                    <th class="text-white">Class Code</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM subjectinformation WHERE STATUS = 'ACTIVE' AND TEACHERID = '$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    foreach($result as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['SUBJECT']?></td>
                            <td><?php echo $row['GRADES']?></td>
                            <td><?php echo $row['SECTION']?></td>
                            <td><?php echo $row['SPECIALCODE']?></td>
                            <td>
                                <a href="t_sub?idsubject=<?php echo $row['ID']?>" class="btn btn-sm btn-primary">View</a>
                                <button class="btn btn-sm btn-danger delete-button" data-id="<?php echo $row['ID']; ?>">Delete</button>
                            </td>
                        </tr>
                        <?php
                    }

                }else{
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">No Subject</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require 'modalsubject.php';
?>
<script src="javascript/deletesubject.js"></script>
<?php
include 'partials/tfoot.php';
?>