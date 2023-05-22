<?php
require 'partials/header.php';
$subjectdata = $_GET['openme'];
$myid = $_SESSION['ROLLNO'];
$sql = "SELECT * FROM subjectdata WHERE ID = '$subjectdata'";
$result = mysqli_query($conn, $sql);
foreach($result as $row){
    $subjectcode = $row['SUBJECTCODE'];
    $description = $row['DESCRIPTION'];
    $type = $row['TYPE'];
    $startdate = $row['STARTDATE'];
    $enddate = $row['ENDDATE'];
    $file = $row['FILE'];
    $link = $row['LINK'];
}

?>
<div class="container mt-5">
<?php
if($type =='lesson'){
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="text-start"><?php echo strtoupper($type);?></h4>
            <hr>
            <h5 class="text-center"><?php echo $description?></h5>
            <h5 class="text-end">
            <hr>
            <?php
            if($file == "N/A"){
                ?>
                <a href="<?php echo $link?>" class="btn btn-sm btn-warning">View Link</a>
                <?php
            }elseif($link == "N/A"){
                ?>
                 <iframe src="<?php echo $file?>" frameborder="1" style="width:100%;height:520px;"></iframe>
                <?php
            }else{
                ?>
                    <a href="<?php echo $link?>" class="btn btn-sm btn-warning mb-2">View Link</a>
                    <iframe src="<?php echo $file?>" frameborder="1" style="width:100%;height:520px;"></iframe>
                <?php
            }
            ?>
            <hr>
            <h6 class="float-end"><?php echo $startdate = str_replace("T", " ", $startdate);?></h6>
        </div>
    <?php
}else{
    ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                <h4 class="text-start"><?php echo strtoupper($type);?></h4>
                <h6 class="text-muted">Date Posted : <?php echo $startdate = str_replace("T", " ", $startdate);?></h6>
            <hr>
            <h5 class="text-center"><?php echo $description?></h5>
            <hr>
            <h6 class="float-end"> End Date <?php echo $enddate = str_replace("T", " ", $enddate);?></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center"><?php echo strtoupper($type);?></h5>
                    <hr>
                    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#upload"
                    <?php
                    
                        $sql = "SELECT * FROM uploadstudent WHERE DATAID='$subjectdata' AND STUDENTID='$myid'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0){
                            echo 'disabled';
                        }
                        ?>
                    >Upload Files</button>

                    <hr>
                        <?php
                        
                        ?>
                        <button class="btn btn-sm btn-warning delete-button" data-id="<?php echo $subjectdata;?>"
                        <?php
                        $sql = "SELECT * FROM uploadstudent WHERE DATAID='$subjectdata' AND STUDENTID='$myid'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0){
                            echo 'disabled';
                        }
                        ?>
                        
                        >Mark as Done</button>
                   
                </div>
            </div>
        </div>
    </div>
    <?php
}
require 'modalupload.php';
?>
<script>
   $(document).ready(function() {
    // Attach click event handler to delete buttons
    $('.delete-button').click(function() {
      var id = $(this).data('id');
      
      // Display SweetAlert confirmation dialog
      swal({
        title: "Confirmation",
        text: "Are you sure you want to mark as done.?",
        icon: "warning",
        buttons: ["Cancel", "Yes, mark as done"],
        dangerMode: true,
      })
      .then(function(willDelete) {
        if (willDelete) {
          // Perform AJAX request to delete data
          $.ajax({
            url: 'controllers/markasdone.php', // Replace with your server-side delete script
            type: 'POST',
            data: { id: id },
            success: function(response) {
              // Display SweetAlert success message
              swal("Success", "Data deleted successfully", "success")
              .then(function() {
                // Reload the page
                location.reload();
              });
            },
            error: function(xhr, status, error) {
              // Handle error scenario
              swal("Error", "An error occurred while deleting the data", "error");
            }
          });
        }
      });
    });
  });
  
</script>
</div>
<?php 
require 'partials/foot.php';
?>