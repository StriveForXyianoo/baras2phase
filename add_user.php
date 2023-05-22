<?php
include 'partials/adminhead.php';
?>

<div class="container mt-5">
    <a href="user" class="btn btn-primary mb-2 btn-sm"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;View User</a>
    <div class="container">
        <form action="controllers/control" method="post">
           <div class="row">
           <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="" selected disabled>Choose Role</option>
                        <option value="ADMINISTRATOR">Administrator</option>
                        <option value="INSTRUCTOR">Instructor</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" name="Email" id="Email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="" selected disabled>Choose Status</option>
                        <option value="ACTIVE">Active</option>
                        <option value="INACTIVE">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
            
            </div>
           </div>
           <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
            <button type="submit" name="save" class="btn btn-sm btn-warning"><i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;Save Information</button>
            </div>
            <div class="col-lg-4"></div>
           </div>
        </form>
    </div>
</div>

<?php
include 'partials/adminfoot.php';
?>