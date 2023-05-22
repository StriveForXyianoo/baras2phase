<?php
require 'partials/header.php';
$rollno = $_SESSION['ROLLNO'];?>
<div class="container mt-5">
    
    <div class="card">
        <div class="card-header">
            <h5 class="text-center card-title">My Grades</h5>
        </div>
        <div class="card-body">
            <table class="table table-stripped table-bordered tabble-hover">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">Subject</th>
                        <th class="text-white">1st Grading</th>
                        <th class="text-white">2nd Grading</th>
                        <th class="text-white">3rd Grading</th>
                        <th class="text-white">4th Grading</th>
                        <th class="text-white">Final Rating</th>
                        <th class="text-white">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM gradesinformation WHERE STUDENTID = '$rollno'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        foreach($result as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['SUBJECT']?></td>
                                    <td><?php echo $row['UNA']?></td>
                                    <td><?php echo $row['PANGALAWA']?></td>
                                    <td><?php echo $row['PANGATLO']?></td>
                                    <td><?php echo $row['PANGAPAT']?></td>
                                    <td><?php echo $row['FINALGRADE']?></td>
                                    <td><?php echo $row['REMARKS']?></td>
                                </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="5" class="text-end bg-dark text-white">Final Average</td>
                            <td colspan="2" class="text-center bg-dark text-white">
                                <?php
                                $sql = "SELECT ROUND(AVG(FINALGRADE),0) AS FINAL FROM gradesinformation WHERE STUDENTID = '$rollno'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['FINAL'];
                                ?>
                            </td>
                        </tr>
                        <?php
                    }else{
                        ?>
                        <tr>
                            <td colspan="5" class="text-center">No Grades Available</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require 'partials/foot.php';?>