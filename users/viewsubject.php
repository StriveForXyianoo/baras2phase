<?php
require 'partials/header.php';
$rollno = $_SESSION['ROLLNO'];
$subjectid = $_GET['idsubject'];
$sql = "SELECT * FROM subjectinformation WHERE SPECIALCODE = '$subjectid'";
$result = mysqli_query($conn, $sql);
foreach($result as $row){
    $subject = $row['SUBJECT'];
    $teacher = $row['TEACHERID'];
    $grade = $row['GRADES'];
    $section = $row['SECTION'];
}
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center subjectname mb-2"><?php echo $subject?></h1>
            <h3 class="text-center subjectname"><?php
            $sql = "SELECT * FROM user WHERE USERID = '$teacher'";
            $result = mysqli_query($conn, $sql);
            foreach($result as $rows){
                echo $rows['NAME'];
            }
            ?></h3>
            <h5 class="text-center subjectname"><?php echo $grade ?> - <?php echo $section?></h5>
        </div>
    </div>
    
    <?php
    $sql = "SELECT * FROM subjectdata WHERE SUBJECTCODE = '$subjectid'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        foreach($res as $ros){
            ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="text-center"><?php echo $ros['DESCRIPTION']?></h5>
                    <a href="open?openme=<?php echo $ros['ID']?>" class="btn btn-sm btn-info">Open</a>
                </div>
                <div class="card-footer">
                    <h6 class="text-center text-muted"><?php echo $ros['STARTDATE']?> - <?php echo $ros['ENDDATE']?></h6>
                </div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="card mt-3">
            <div class="card p-3">
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                       <img src="images/download.png" alt="">
                    </div>
                    <div class="col-lg-9">
                        <h3 class="text-center text-primary">This is where you’ll see updates for this class</h3>
                        <p class="text-center text-muted">Use the stream to connect with your class and check for announcements</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</div>
<?php
require 'partials/foot.php';
?>