<?php
include 'partials/adminhead.php';
?>
<style>
    table {
        margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  border-collapse: collapse;
  border: 1px solid black;
}

th, td {
  border: 1px solid black;
  padding: 8px;
}

</style>
<div class="container mt-5">
    <a href="add_student" class="btn btn-sm btn-primary">Add Student</a>
    <a href="student" class="btn btn-sm btn-primary">View Student</a>
    <a href="assets/excelfileupload.xlsx" download class="btn btn-sm btn-primary">Download Layout</a>
    <div class="row mt-3">
        <div class="col">
            <form action="teachercontrol/controll.php" method="post" enctype='multipart/form-data'>
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
        <div class="col">
            <label for="section" class="form-label">Section</label>
            <select name="section" id="section" class="form-select">
                <option value="" selected disabled>Choose Section</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <div class="col">
            <label for="file" class="form-label">Excel File</label>
            <input type="file" name="file" id="excelFile" class="form-control" onchange="loadExcelData()">
        </div>
        <button type="submit" name="bulkstudent" class="btn btn-sm btn-primary mt-2">Save Student</button></form>
    </div>
</div>
<script src="javascript/loadexcel.js"></script>
<?php
include 'partials/adminfoot.php';
?>