<?php
include 'partials/thead.php';
$id = $_GET['idsubject'];
$sql = "SELECT * FROM subjectinformation WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$subject = $row['SUBJECT'];
$grades = $row['GRADES'];
$section = $row['SECTION'];
$specialcode = $row['SPECIALCODE'];
?>
<div class="container-fluid mt-3">
    <h3 class="text-center"><?php echo $subject?>
    <a href="t_student?subjectcode=<?php echo $specialcode?>" class="float-end btn btn-primary btn-sm">View Student</a> <br>
    <a href="files?subjectcode=<?php echo $specialcode?>" class="float-end btn btn-primary btn-sm">Files</a> <br>
    </h3>
    
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h6><strong>Class Code</strong></h6>
                    <h6><?php echo $specialcode?></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <form action="controllers/control.php" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="specialcode" value="<?php echo $specialcode?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                        <label for="description" class="form-label">Title</label>
                        <input type="text" name="description" id="description" class="form-control">
                        <div class="row">
                            <div class="col">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="https://www.google.com">
                                <label for="star-date" class="form-label">Start Date</label>
                                <input type="datetime-local" name="star-date" id="star-date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="file" id="file" class="form-control">
                                    <label for="enddate" class="form-label">End Date</label>
                                <input type="datetime-local" name="enddate" id="enddate" class="form-control">
                            </div>
                        </div>
                    <div class="mt-2">
                        <label class="form-label">Type</label>
                        <select name="type" id="type" class="form-select">
                            <option value=""selected disabled>Please Choose</option>
                            <option value="assigment">Assigment</option>
                            <option value="activity">Activity</option>
                            <option value="quiz">Quiz</option>
                            <option value="lesson">Lesson Materials</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary"type="submit" name="upload">Upload</button></form>
            </div>
            
        </div>
    </div>
    <div class="container mt-3">
        <?php
        $sql = "SELECT * FROM subjectdata WHERE SUBJECTCODE = '$specialcode' ORDER BY ID DESC";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            foreach($result as $row){
                ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="text-center">
                            <strong><?php echo $row['DESCRIPTION']?></strong>
                        </h5>
                        <hr>
                        <?php
                        if($row['TYPE'] == 'assigment'){
                            ?>
                            <h6 class="text-center">
                                <strong>Assigment</strong>
                            </h6>
                            <?php
                        }elseif($row['TYPE'] == 'activity'){
                            ?>
                            <h6 class="text-center">
                                <strong>Activity</strong>
                            </h6>
                            <?php
                        }elseif($row['TYPE'] == 'quiz'){
                            ?>
                            <h6 class="text-center">
                                <strong>Quiz</strong>
                            </h6>
                            <?php
                        }elseif($row['TYPE'] == 'lesson'){
                            ?>
                            <h6 class="text-center">
                                <strong>Lesson Materials</strong>
                            </h6>
                            <?php
                        }
                        ?>
                        <hr>
                        <?php
                        if($row['LINK'] == "N/A"){
                            ?>
                           <button class="btn btn-sm btn-warning " onclick="openFileInNewTab('phase2LMS/<?php echo $row['FILE']?>')">View Uploaded File</button>
                            <?php
                        }elseif($row['FILE'] == "N/A"){
                            ?>
                            <a href="<?php echo $row['LINK']?>" class="btn btn-sm btn-warning">View Link</a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="card-foot">
                        <p class="text-muted text-center">
                            <?php echo $row['STARTDATE']?>
                        </p>
                    </div>
                </div>
                <?php
            }
        }else{
            echo '<h3 class="text-center">No Data</h3>';
        }
        ?>
    </div>
</div>
<script>
     function openFileInNewTab(fileUrl) {
            var newTab = window.open('_blank');
            newTab.location.href = fileUrl;
        }
</script>
<?php
include 'partials/tfoot.php';
?>