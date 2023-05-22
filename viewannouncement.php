<?php
include 'partials/adminhead.php';
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-stripped">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">Title</th>
                        <th class="text-white">Description</th>
                        <th class="text-white">Date Post</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM announcement WHERE STATUS = 'ACTIVE'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        foreach($result as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['TITLE']?></td>
                                <td><?php echo $row['DESCRIPTION']?></td>
                                <td><?php echo $row['DATE']?></td>
                                <td><?php echo $row['TIME']?></td>
                                <td>
                                    <button class="btn btn-sm btn-danger delete-button" data-id="<?php echo $row['ID']; ?>">Delete</button>
                                </td>
                            </tr>
                            <?php
                        }

                    }else{
                        ?>
                        <tr>
                            <td colspan="5" class="text-center">No Announcement</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="javascript/deleteann.js"></script>
<?php
include 'partials/adminfoot.php';
?>