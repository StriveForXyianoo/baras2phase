<?php
include 'partials/adminhead.php';
?>

<div class="container mt-5">
<?php

if(!isset($_SESSION['useradd'])){
    $_SESSION['useradd'] = "";
}
if(!isset($_SESSION['userupdate'])){
    $_SESSION['userupdate'] = "";
}
if($_SESSION['useradd'] == "success"){
   //echo success alert using bootstrap alert
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Data Successfully Added</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['useradd'] = "";
}elseif($_SESSION['useradd'] == "failed"){
    //echo swalfire alert
    ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed to Add Data</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['useradd'] = "";
}elseif($_SESSION['userupdate'] == "failed"){
    //echo swalfire alert
    ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed to Update Data</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['userupdate'] = "";
}elseif($_SESSION['userupdate'] == "success"){
    //echo swalfire alert
    ?>
   <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Data Successfully Updated</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    $_SESSION['userupdate'] = "";

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
$result = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM user");
$records = mysqli_fetch_array($result);
//store of total 
$total_records = $records['total_records'];

//get the total number of pages 
$total_no_of_page = ceil($total_records / $total_records_per_page);
?>
        <a href="add_user" class="btn btn-primary mb-2 btn-sm"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add User</a>
    <div class="card ">

        <div class="card-body">
            <table class="table table-stripped table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">Name</th>
                        <th class="text-white">Email</th>
                        <th class="text-white">Role</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user LIMIT $offset, $total_records_per_page";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                            foreach($result as $row){
                                ?>
                                <tr>
                                   
                                    <td><?php echo $row['NAME']?></td>
                                    <td><?php echo $row['EMAIL']?></td>
                                    <td><?php echo $row['ROLE']?></td>
                                    <td><?php echo $row['STATUS']?></td>
                                    <td>
                                        <a href="edit_user?id=<?php echo $row['ID'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger delete-button" data-id="<?php echo $row['USERID']; ?>">Delete</button>
                                    </td>
                                </tr>
                                <?php
                            }
                    }else{
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">No Record Found</td>
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

<script src="javascript/deletestudent.js"></script>
<?php
include 'partials/adminfoot.php';
?>