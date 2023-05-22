<?php
include 'partials/adminhead.php';
if(!isset($_SESSION['studentadd'])){
    $_SESSION['studentadd'] = "";
}
if(!isset($_SESSION['studentupdate'])){
    $_SESSION['studentupdate'] = "";
}
if(!isset($_SESSION['bulkstudent'])){
    $_SESSION['bulkstudent'] = "";
}
if($_SESSION['studentadd'] == "failed"){
    //echo success alert using bootstrap alert
    ?>
    <div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
  <strong>Failed to Add Please Complete information Need</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['studentadd'] = "";
}else if($_SESSION['studentadd'] == "success"){
    //echo success alert using bootstrap alert
    ?>
    <div class="alert alert-primary mt-5 alert-dismissible fade show" role="alert">
  <strong>Data Successfully Added</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['studentadd'] = "";
}elseif($_SESSION['studentupdate'] == "success"){
    //echo success alert using bootstrap alert
    ?>
    <div class="alert alert-primary mt-5 alert-dismissible fade show" role="alert">
  <strong>Data Successfully Updated</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['studentupdate'] = "";
}
if($_SESSION['bulkstudent']=='success'){
    ?>
    <div class="alert alert-primary mt-5 alert-dismissible fade show" role="alert">
  <strong>Bulk Student Added</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['bulkstudent'] = "";
}elseif($_SESSION['bulkstudent']=='failed'){
    ?>
    <div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
  <strong>Failed to Add Bulk Student</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['bulkstudent'] = "";

}
?>
<?php
// paganation start here
if(isset($_GET['page_no']) && $_GET['page_no'] !== ''){
    $page_no = $_GET['page_no'];
}else{
    $page_no = 1;
}

//total row or record  to display 
$total_records_per_page = 10;

//offset value
$offset = ($page_no - 1) * $total_records_per_page;

//previous page
$previous_page = $page_no - 1;
//next page
$next_page = $page_no + 1;

//total of page count of the record 
$result = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM studentinformation");
$records = mysqli_fetch_array($result);
//store of total 
$total_records = $records['total_records'];

//get the total number of pages 
$total_no_of_page = ceil($total_records / $total_records_per_page);
?>
<div class="container mt-5">
    <a href="add_student" class="btn btn-sm btn-primary">Add Student</a>
    <a href="bulk_student" class="btn btn-sm btn-primary">Bulk Added</a>
    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-stripped table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">Roll No.</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Gender</th>
                        <th class="text-white">Grade</th>
                        <th class="text-white">Section</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM studentinformation LIMIT $offset, $total_records_per_page";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        foreach($result as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['ROLLNO'] ?></td>
                                <td><?php echo $row['NAME'] ?></td>
                                <td><?php echo $row['GENDER'] ?></td>
                                <td><?php echo $row['GRADE'] ?></td>
                                <td><?php echo $row['SECTION'] ?></td>
                                <td><?php echo $row['STATUS'] ?></td>
                                <td>
                                    <a href="edit_student?id=<?php echo $row['ID']?>" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger delete-button" data-id="<?php echo $row['ID']; ?>">Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">No Student Record</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="float-end">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link
                        <?php echo ($page_no <= 1)? 'disabled' :'';?>"<?php echo ($page_no > 1)? 'href=?page_no='.$previous_page :'';?>
                        >Previous</a></li>
                        
                        <?php
                        for($counter = 1; $counter <= $total_no_of_page; $counter++){
                            ?>
                             <li class="page-item"><a class="page-link" href="?page_no=<?php
                             echo $counter; ?>"><?php echo $counter?></a></li>
                            <?php
                        }
                        ?>
                       
                       
                        <li class="page-item"><a class="page-link
                        <?php echo ($page_no >= $total_no_of_page)? 'disabled' :'';?>"<?php echo ($page_no < $total_no_of_page)? 'href=?page_no='.$next_page :'';?>
                        >Next</a></li>
                    </ul>
            </nav>
            <div class="p-10">
                <strong>Page <?php echo $page_no ?> of <?php echo $total_no_of_page?></strong>
            </div>
        </div>
    </div>
</div>
<script src="javascript/deletestud.js"></script>
<?php
include 'partials/adminfoot.php';
?>