<?php
include 'partials/adminhead.php';
$id = $_GET['id'];
$sql = "SELECT * FROM studentinformation WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$rollno = $row['ROLLNO'];
$name = $row['NAME'];
$grade = $row['GRADE'];
$section = $row['SECTION'];
$status = $row['STATUS'];
$gender = $row['GENDER'];
$email = $row['EMAIL'];
?>
<div class="container mt-5">
    <a href="student" class="btn btn-sm btn-primary">View Records</a>
    <a href="" class="btn btn-sm btn-primary">Bulk Added</a>
    <form action="controllers/control" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>">
    <div class="row mt-5">
        <div class="col-lg-4">
           <div class="mb-2">
                <label for="rollno" class="form-label">Roll No.</label>
                <input type="text" name="rollno" id="rollno" class="form-control" value="<?php echo $rollno?>" required>
           </div>
           <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <select name="grade" id="grade" class="form-select">
                <option value="" selected disabled>Choose Grade</option>
                <option value="GRADE 7" <?php if($grade == 'GRADE 7'){ echo 'selected';}?>>Grade 7</option>
                <option value="GRADE 8" <?php if($grade == 'GRADE 8'){ echo 'selected';}?>>Grade 8</option>
                <option value="GRADE 9" <?php if($grade == 'GRADE 9'){ echo 'selected';}?>>Grade 9</option>
                <option value="GRADE 10" <?php if($grade == 'GRADE 10'){ echo 'selected';}?>>Grade 10</option>
                <option value="GRADE 11" <?php if($grade == 'GRADE 11'){ echo 'selected';}?>>Grade 11</option>
                <option value="GRADE 12" <?php if($grade == 'GRADE 12'){ echo 'selected';}?>>Grade 12</option>
            </select>
           </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $name?>" required>
            </div>
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select name="section" id="section" class="form-select">
                    <option value="" selected disabled>Choose Section</option>
                    <option value="A"<?php if($section =='A'){ echo 'selected';}?>>A</option>
                    <option value="B"<?php if($section =='B'){ echo 'selected';}?>>B</option>
                    <option value="C"<?php if($section =='C'){ echo 'selected';}?>>C</option>
                    <option value="D"<?php if($section =='D'){ echo 'selected';}?>>D</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-2">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="Male"<?php if($gender == 'Male'){ echo 'selected';}?>>Male</option>
                    <option value="Female"<?php if($gender == 'Female'){ echo 'selected';}?>>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="" selected disabled>Choose Status</option>
                    <option value="ACTIVE" <?php if($status == 'ACTIVE'){ echo 'selected';}?>>Enroll</option>
                    <option value="INACTIVE" <?php if($status == 'INACTIVE'){ echo 'selected';}?>>UnEnroll</option>
                </select>
            </div>
        </div>
         <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email?>" required>
         </div>
        <div class="row">
            <div class="col"></div>
            <div class="col d-flex">
                <button type="submit" name="updateStudent" class="btn btn-primary">Update Student Information</button>
            </div>
            <div class="col"></div>
        </div>
    </div></form>
</div>
<?php
include 'partials/adminfoot.php';
?>