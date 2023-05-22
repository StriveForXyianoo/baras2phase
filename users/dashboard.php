<?php
require 'partials/header.php';
$sql = "SELECT * FROM announcement WHERE STATUS ='ACTIVE' ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

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
            <?php $teacherid = $row['who'];
            $sql = "SELECT * FROM user WHERE USERID = '$teacherid'";
            $res = mysqli_query($conn, $sql);
            foreach($res as $ros){
              ?>
              <h5 class="text-muted">Posted by <?php echo $ros['NAME']?></h5>
              <?php
            }
            ?>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['TITLE']?></h5>
            <p class="card-text"><?php echo $row['DESCRIPTION']?></p>
            
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $row['DATE']?>-<?php echo $row['TIME']?>
          </div>
        </div>
      </div>
  </div>


      <?php
    }
   }else{
        echo '<h1 class="text-center mt-5">No Announcement</h1>';
   }
   ?>

</div>
<?php
require 'partials/foot.php';
?>