<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Files</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="add" method="post" enctype='multipart/form-data'>
       <label for="" class="form-label">Upload your File Here</label>
         <input type="file" name="file" id="file" class="form-control" required>
         <input type="hidden" name="dataid" value="<?php echo $subjectdata;?>">
      </div>
      <div class="modal-footer">
       
        <button type="submit" name="upload" class="btn btn-primary">Save changes</button></form>
      </div>
    </div>
  </div>
</div>