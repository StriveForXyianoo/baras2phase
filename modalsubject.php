<!-- Modal -->
<div class="modal fade" id="AddSubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Subject</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controllers/inst_controller" method="post">
          <div class="mb-3">
            <label for="" class="form-label">Subject Name</label>
            <input type="text" name="subjectname" id="subjectname" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="grades" class="form-label">Grade</label>
            <select name="grades" id="grades" class="form-select">
              <option value="" selected disabled>Choose Grade</option>
              <option value="GRADE 7">Grade 7</option>
              <option value="GRADE 8">Grade 8</option>
              <option value="GRADE 9">Grade 9</option>
              <option value="GRADE 10">Grade 10</option>
              <option value="GRADE 11">Grade 11</option>
              <option value="GRADE 12">Grade 12</option>
            </select>
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
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
              <option value="" selected disabled>Choose Status</option>
              <option value="ACTIVE">Active</option>
              <option value="INACTIVE">Inactive</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="radio" name="enroll" id="" value="Enroll"> &nbsp; Enroll All Students <br>
            <input type="radio" name="enroll" id="" value="let"> &nbsp; Don't Enroll Students
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="subjectadd" class="btn btn-primary">Save changes</button></form>
      </div>
    </div>
  </div>
</div>