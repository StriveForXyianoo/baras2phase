<?php
include 'partials/thead.php';
$subid = $_GET['subjectcode'];
$sql = "SELECT * FROM subjectdata WHERE SUBJECTCODE ='$subid'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$dataid = $row['ID'];

?>
<div class="container-fluid mt-3">
<table class="table table-hover table-stripped">
    <thead class="bg-dark">
        <tr>
            <th class="text-white">Name</th>
            <th class="text-white">Grade</th>
            <th class="text-white">Section</th>
            <th class="text-white">Quiz ID</th>
            <th class="text-white">Files</th>
            <th class="text-white">Date Submit</th>
            <th class="text-white">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT studentinformation.*, subjectdata.*, uploadstudent.*, uploadstudent.ID AS deleteid FROM studentinformation INNER JOIN uploadstudent ON studentinformation.ROLLNO = uploadstudent.STUDENTID INNER JOIN subjectdata ON subjectdata.ID = uploadstudent.DATAID WHERE uploadstudent.DATAID = '$dataid' ORDER BY uploadstudent.DATEUPLOAD;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
                foreach($result as $row){
                    ?>
                    <tr>
                        <td><?php echo $row['NAME']?></td>
                        <td><?php echo $row['GRADE']?></td>
                        <td><?php echo $row['SECTION']?></td>
                        <td><?php echo $row['DESCRIPTION']?></td>
                        <td><?php echo $row['LINK']?></td>
                        <td><?php echo $row['DATEUPLOAD']?></td>
                        <td>
                            <button class="btn btn-sm btn-warning delete-button" data-id="<?php echo $row['deleteid']; ?>">Return</button>
                           
                        </td>
                    </tr>
                    <?php
                }
        }else{
            ?>
            <tr>
                <td colspan="7" class="text-center">No Class Submit Their Works</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</div>
<script>
    $(document).ready(function() {
    // Attach click event handler to delete buttons
    $('.delete-button').click(function() {
      var id = $(this).data('id');
      
      // Display SweetAlert confirmation dialog
      swal({
        title: "Confirmation",
        text: "Returning File Mean it Already Checked?",
        icon: "warning",
        buttons: ["Cancel", "Yes, delete it"],
        dangerMode: true,
      })
      .then(function(willDelete) {
        if (willDelete) {
          // Perform AJAX request to delete data
          $.ajax({
            url: 'controllers/return.php', // Replace with your server-side delete script
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
<?php 
include 'partials/tfoot.php';?>