<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS || Schedule</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="result_style.css">
  </head>
  <body style="background: #E6E6E6">
    <?php
    include('navbar.php');
    ?>

    <br>
    <!-- <h2 class="text-center text-info">Online Exam Slips</h2> -->
    <hr class="shadow">
    <br>
    
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4 shadow">
            <form action="check_schedule.php" method="post" id="scheduleForm">
              <div class="card-body">
                <!--<h3>Exams Schedule</h3>           -->
                <div class="row">
                 <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Candidate CNIC<span style="color: red;">*</span></label>
                      <input type="text" title="Enter Number Only (e.g 1234567890123)" class="form-control shadow" required style="border: 1px solid #014073" placeholder="Candidate Number" name="cnic" id="integerInput" pattern="[0-9]{13}" oninput="validateInteger(this)">
                      <p id="errorMessage" style="color: red;"></p>
                    </div>          
                  
                      <div class="form-group">
                          <select style="border: 1px solid #014073" class="form-control shadow"  name="job_select">; 
                    <?php
                     include('reference.php');

                    $sql = "SELECT * FROM jobs";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                      echo '<option>Select Job</option>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['j_id'] . '">' . $row['j_name'] . ' ' . $row['scale'] . '</option>';
                            $j_id = $row['j_id'];
                        }
                    } else {
                        echo '<option>No Jobs Available</option>';
                    }
                
                    $conn->close();
                    ?>
                    </select>
                </div>
                <div class="form-group">
                      <br>
                        <input type="submit" class="btn mt-2 btn-success shadow" style="float: left;" value="Submit" name="search" onclick="updateFormAction()">
                    </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
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


    
    <script>
      
      
      function validateInteger(inputElement) {
    let inputValue = inputElement.value.trim(); // Remove all blank spaces
    inputValue = inputValue.replace(/[^0-9.]/g, '');

    const errorMessageElement = document.getElementById("errorMessage");
inputElement.value = inputValue;
    if (/^\d*$/.test(inputValue)) {
        if (inputValue.length >= 13) {
            errorMessageElement.textContent = "";
            inputValue = inputValue.slice(0, 13); // Keep only the first 13 digits
            inputElement.value = inputValue; // Update input value after removing spaces
        } else {
            errorMessageElement.textContent = "Please enter a valid CNIC of at least 13 digits.";
        }
    } else {
        errorMessageElement.textContent = "Please enter a valid CNIC consisting of digits only.";
    }
}

    </script>
    
    
  </body>
</html>