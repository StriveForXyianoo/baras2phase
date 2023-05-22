<?php
require 'partials/header.php';
if(isset($_POST['addSubject'])){
    $subjectocde = $_POST['subjectocde'];
    $sql = "SELECT * FROM subjectinformation WHERE SPECIALCODE = '$subjectocde'";
    $result = mysqli_query($conn, $sql);
}
?>
<div class="container mt-5">
<?php
if(mysqli_num_rows($result)>0){
    foreach($result as $row){
        ?>
        <div class="row mb-3">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h5>Enroll Subject</h5>
          </div>
          <div class="card-body">
            <h3 class="card-title"><?php echo $row['SUBJECT']?></h3>
            <p class="card-text text-center"><?php echo $row['GRADES']?> - <?php echo $row['SECTION']?></p>
            <h5 class="text-center text-warning"><?php
            $teacher = $row['TEACHERID'];
            $sql = "SELECT * FROM user WHERE USERID = '$teacher'";
            $result = mysqli_query($conn, $sql);
            foreach($result as $rows){
                echo $rows['NAME'];
            }
            ?></h5>
            <form action="controllers/control" method="post">
                <input type="hidden" name="subject" value="<?php echo $subjectocde?>">
                <input type="hidden" name="rollno" value="<?php echo $_SESSION['ROLLNO']?>">
                <button type="submit" name="enroll" class="btn btn-sm btn-success">Enroll</button>
            </form>
          </div>
          
        </div>
      </div>
  </div>
        <?php
    }
}else{
    echo '<h1 class="text-center mt-5">No Subject</h1>';
}
?>

</div>
<?php
require 'partials/foot.php';
?>
