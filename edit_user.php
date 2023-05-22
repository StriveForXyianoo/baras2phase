<?php
include 'partials/adminhead.php';

$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['NAME'];
$role = $row['ROLE'];
$Email = $row['EMAIL'];
$status = $row['STATUS'];
?>

<div class="container mt-5">
    <a href="user" class="btn btn-primary mb-2 btn-sm"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;View User</a>
    <div class="container">
        <form action="controllers/control" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
           <div class="row">
           <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $name?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="" selected disabled>Choose Role</option>
                        <option value="ADMINISTRATOR" <?php if($role == 'ADMINISTRATOR'){ echo 'selected';}?>>Administrator</option>
                        <option value="INSTRUCTOR" <?php if($role == 'INSTRUCTOR'){ echo 'selected';}?>>Instructor</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" name="Email" value="<?php echo $Email?>" id="Email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="" selected disabled>Choose Status</option>
                        <option value="ACTIVE" <?php if($status == 'ACTIVE'){ echo 'selected';}?>>Active</option>
                        <option value="INACTIVE" <?php if($status == 'INACTIVE'){ echo 'selected';}?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
            
            </div>
           </div>
           <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
            <button type="submit" name="saveupdate" class="btn btn-sm btn-warning"><i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;Update Information</button>
            </div>
            <div class="col-lg-4"></div>
           </div>
        </form>
    </div>
</div>

<?php
include 'partials/adminfoot.php';
?>