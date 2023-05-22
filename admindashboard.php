<?php
include 'partials/adminhead.php';
//count the male student where statsu is active
$mcount = "SELECT COUNT(ID) as totalMale FROm studentinformation WHERE GENDER='Male' AND STATUS='ACTIVE'";
$mresult = mysqli_query($conn, $mcount);
$mrow = mysqli_fetch_assoc($mresult);
$male = $mrow['totalMale'];

//count the female student where statsu is active
$fcount = "SELECT COUNT(ID) as totalFemale FROm studentinformation WHERE GENDER='Female' AND STATUS='ACTIVE'";
$fresult = mysqli_query($conn, $fcount);
$frow = mysqli_fetch_assoc($fresult);
$female = $frow['totalFemale'];

//count the total student where status is ACTIVE
$total = "SELECT COUNT(ID) as totalStudent FROM studentinformation WHERE STATUS='ACTIVE'";
$totalresult = mysqli_query($conn, $total);
$totalrow = mysqli_fetch_assoc($totalresult);
$totalstudent = $totalrow['totalStudent'];

//coun the total student where status is INACTIVE
$unenroll = "SELECT COUNT(ID) as totalUnenroll FROM studentinformation WHERE STATUS='INACTIVE'";
$unenrollresult = mysqli_query($conn, $unenroll);
$unenrollrow = mysqli_fetch_assoc($unenrollresult);
$totalunenroll = $unenrollrow['totalUnenroll'];

//count the total instructor
$instructor = "SELECT COUNT(ID) as totalInstructor FROM user WHERE ROLE='INSTRUCTOR'";
$instructorresult = mysqli_query($conn, $instructor);
$instructorrow = mysqli_fetch_assoc($instructorresult);
$totalinstructor = $instructorrow['totalInstructor'];


//count the total student per  grade where status is ACTIVE
$sq = "SELECT GRADE,COUNT(ID) as totalStudent FROM studentinformation WHERE STATUS='ACTIVE'  GROUP BY GRADE ORDER BY GRADE DESC";
$sqresult = mysqli_query($conn, $sq);
$gradearray = array();
$studentarray = array();
while($sqrow = mysqli_fetch_assoc($sqresult)){
    array_push($gradearray, $sqrow['GRADE']);
    array_push($studentarray, $sqrow['totalStudent']);
}
$grade = json_encode($gradearray);
$count = json_encode($studentarray);


//count the subject 
$subject = "SELECT COUNT(ID) as subjectinformation FROM subjectinformation";
$subjectresult = mysqli_query($conn, $subject);
$subjectrow = mysqli_fetch_assoc($subjectresult);
$totalsubject = $subjectrow['subjectinformation'];



?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                <canvas id="myChart" style="hieght:18rem;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                <canvas id="gender" style="hieght:18rem;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5><strong>Total Student</strong></h5>
                    <h3 class="text-end"><?php echo $totalstudent?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5><strong>Number of Instructor</strong></h5>
                    <h3 class="text-end"><?php echo $totalinstructor?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5><strong>Number of Subjects</strong></h5>
                    <h3 class="text-end"><?php echo $totalsubject?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5><strong>Number of Unenroll</strong></h5>
                    <h3 class="text-end"><?php echo $totalunenroll?></h3>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($gradearray)?>,
      datasets: [{
        label: '# of Students',
        data: <?php echo json_encode($studentarray)?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
  const ctx2 = document.getElementById('gender');

  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['Female', 'Male'],
      datasets: [{
        label: 'Gender',
        data: [<?php echo $female?>, <?php echo $male?>],
        borderWidth: 2
      }]
    }
    
  });
</script>

<?php
include 'partials/adminfoot.php';
?>