<?php
include 'partials/adminhead.php';
?>
<div class="container mt-5">
    <a href="student" class="btn btn-sm btn-primary">View Records</a>
    <a href="" class="btn btn-sm btn-primary">Bulk Added</a>
    <form action="controllers/control" method="post">
    <div class="row mt-5">
        <div class="col-lg-4">
           <div class="mb-2">
                <label for="rollno" class="form-label">Roll No.</label>
                <input type="text" name="rollno" id="rollno" class="form-control" required>
           </div>
           <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <select name="grade" id="grade" class="form-select">
                <option value="" selected disabled>Choose Grade</option>
                <option value="GRADE 7">Grade 7</option>
                <option value="GRADE 8">Grade 8</option>
                <option value="GRADE 9">Grade 9</option>
                <option value="GRADE 10">Grade 10</option>
                <option value="GRADE 11">Grade 11</option>
                <option value="GRADE 12">Grade 12</option>
            </select>
           </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select name="section" id="section" class="form-select">
                    <option value="" selected disabled>Choose Section</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-2">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="" selected disabled>Choose Status</option>
                    <option value="ACTIVE">Enroll</option>
                    <option value="INACTIVE">UnEnroll</option>
                </select>
            </div>
        </div>
         <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
         </div>
        <div class="row">
            <div class="col"></div>
            <div class="col d-flex">
                <button type="submit" class="btn btn-primary">Save Student Information</button>
            </div>
            <div class="col"></div>
        </div>
    </div></form>
</div>
<?php
include 'partials/adminfoot.php';
?>