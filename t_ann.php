<?php
include 'partials/thead.php';
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <h5><strong>Announcement</strong>
            <a href="t_view" class="btn btn-primary btn-sm float-end">View Announcement</a>
            </h5>
            <hr>
            <form action="controllers/announcement" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" name="time" id="time" class="form-control" required>
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
                    <button type="submit" name="saveannc" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'partials/adminfoot.php';
?>