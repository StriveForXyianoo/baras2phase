<?php

?>

<!-- Modal -->
<div class="modal fade" id="uploadrecord" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Grades</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="teachercontrol/controll" method="post" enctype='multipart/form-data'>
        <div class="mb-2">
        <label for="subjectname" class="form-label">Subject Name</label>
        <input type="text" name="subjectname" id="subjectname" class="form-control" value="<?php echo $subjectname?>" readonly>
        <input type="hidden" name="subjectid" id="" value="<?php echo $subjectcode?>">
        </div>
        <div class="mb-2">
        <label for="subjectname" class="form-label">Files</label>
        <input type="file" name="file" id="file" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="upload" class="btn btn-primary">Upload</button></form>
      </div>
    </div>
  </div>
</div>