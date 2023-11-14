
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS || Application Form</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="result_style.css">
  </head>
  <body style="background: #E6E6E6">
<?php
include('navbar.php');
?>

    
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4">
          <div id="popupCard">
  <!-- <div class="row">
  <div class="col-md-12 ml-4"><h2>Instructions</h2></div>
  <div class="col-md-12 ml-4">
  <label style="color: red;">Note: </label>
  <ul style="list-style-type:square;">
    	<li style="margin-left: 50px;"> Date for application submission is Friday, 21st July 2023.</li>
    	<li style="margin-left: 50px;">Application should reach UTS office latest by last date of submission of Application form.</li>
    	<li style="margin-left: 50px;">UTS will not be responsible for late receiving of Application.</li>
  </ul></div>
</div>
</div> -->
  </div>
    </div>
    </div>
    </div>
    </div>


    <div class="container-fluid">
      
  <div class="row mb-8">
  <div class="col-md-12"><h2 style='text-align:center;color:green'>Available Jobs</h2></div>
  
  <?php
 include('reference.php');

    $updatejobs = "UPDATE jobs
    SET `status` = 'Not Available'
    WHERE `status` = 'Available' AND `l_date` < CURDATE()";
    $updateresult = $conn->query($updatejobs);
    
    $updatejob = "UPDATE jobs
    SET `status` = 'Available'
    WHERE `status` = 'UpComing' AND `s_date` <= CURDATE()";
    $updatejobresult = $conn->query($updatejob);


    $getjobs = "SELECT * FROM jobs WHERE `status` = 'Available' AND `l_date` >= CURDATE()";
    $jobsResult = $conn->query($getjobs);
    $jobsCount = $jobsResult->num_rows;

echo "<div class='row container-fluid'><div class='col-12'>";
$encryptionKey = "your_secret_key";

if ($jobsCount > 0) {
    // echo "<ol>";
    while ($row = $jobsResult->fetch_assoc()) {
        
        $j_id = $row['j_id'];
        $j_name = $row['j_name'];
        $scale = $row['scale'];
        $lastdate = $row['l_date'];
        $getproject = "SELECT * FROM projects WHERE `project_id` = " . $row['project_id'] . " AND pstatus = 'onGoing'";
        $projectResult = $conn->query($getproject);
        $projectCount = $projectResult->num_rows;
      if($projectCount > 0){
        while($row1 = $projectResult->fetch_assoc()){
          $projectName = $row1['pname'];
          $counter = 1;
          $encryptionKey = "your_secret_key"; // This should be kept secure
          // Encrypt the data
          $j_id = openssl_encrypt($j_id, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);

          echo '<table class="bg-light table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Job Name</th>
              <th scope="col">Department</th>
              <th scope="col">Scale</th>
              <th scope="col">Last Date To Apply</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">'.$counter.'</th>
              <td>'.$j_name.'</td>
              <td>'.$projectName.'</td>
              <td>'.$scale.'</td>
              <td>'.$lastdate.'</td>
              <td class="apply-link" style="cursor:pointer" id="divmove" onclick="window.location.href = \'personal_details.php?j_id=' . $j_id . '\'"><a>Apply Now</a></td>
              </tr>
          </tbody>
        </table>';
      }
      }
       
    }
    echo "<p style='margin-left:3rem;color:red'>Click on Apply Now to Proceed</p>";
    echo "</div></div>";
} else {
  echo "<div class='row'><div class='col-4'></div><div class='col-4'><p style='text-align:center;color:red'>No job Available to Apply</p></div></div>";
echo "<div class='row'>
<div class='col-6'></div>
<div class='col-4'>
    <a href='javascript:history.back()'><- Go Back</a>
</div>
</div>
";
}

?>
</div>
  </div>
    

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
    include('footer.php');
?>    
  </body>
</html>
