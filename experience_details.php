<?php
if (isset($_GET['param1']) && isset($_GET['j_id'])) {
    $param1Value = $_GET['param1'];
    $j_idValue = $_GET['j_id'];
} else {
    echo "<script>history.back();</script>";
    exit; 
}
?>
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

    <br>
    <h2 class="text-center text-info">Online Application Form</h2>
    <hr class="shadow">
    <br>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 55%"></div>
    </div>
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4 shadow">
          <form action="exinsertion.php?j_id=<?php echo urlencode($j_idValue); ?>&param1=<?php echo urlencode($param1Value); ?>" method="post">              
              <div class="card-body">
                <h3>Experience Information</h3>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Organization/ Employer Name<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="organization" placeholder="Organization/ Employer Name" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Job Title<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="jtitle" placeholder="Job Title" style="border: 1px solid #014073">
                    </div>
                  </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>From<span style="color: red;">*</span></label>
                            <input type="date" class="form-control shadow" required name="fdate" placeholder="Start Date" style="border: 1px solid #014073">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>To<span style="color: red;">*</span></label>
                            <input type="date" class="form-control shadow" required name="tdate" placeholder="End Date" style="border: 1px solid #014073">
                          </div>
                    </div>
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Total Experience in Years<span style="color: red;">*</span></label>
                      <input type="number" class="form-control shadow" required name="ytotal" placeholder="Enter Number of Years" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <br>
                  <div class="col-md-12">
                    
                        <input type="checkbox" id="privacyCheckbox">
                        <span style="color: red; text-justify: auto;">I do hereby that, the solemnly declare that all the information provided by me in this application form and all the additional particulars/documents/ certificates furnished along with it are true to the best of my knowledge and belief and nothing has been concealed. I also declare that I have never been dismissed or removed from Govt service under any provincial, federal government autonomous and semi-autonomous or state enterprise. If any wrong or incorrect is found later, I shall be liable to disciplinary action which may result in cancellation of my candidature and even my employment.</span>                   
                    <div class="form-group">
                     
                      <input type="submit" disabled class="btn mt-2 btn-success shadow" style="float: right;" id="submitBtn" value="Submit & Print Challan" name="search">
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
    let inputValue = inputElement.value.replace(/\s/g, ''); // Remove all blank spaces
    const errorMessageElement = document.getElementById("errorMessage");

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


      function convertToUppercase() {
  const inputField = document.getElementById("cname");
  const errorMessage = document.getElementById("nameerrorMessage");

  let inputValue = inputField.value.trim(); // Remove leading/trailing spaces

  // Remove non-letter characters and multiple spaces
  inputValue = inputValue.replace(/[^a-zA-Z ]/g, '');
  inputValue = inputValue.replace(/\s+/g, ' ');

  if (inputValue === '') {
    inputField.value = '';
    errorMessage.textContent = '';
  } else {
    inputField.value = inputValue.toUpperCase();
    errorMessage.textContent = '';
  }
}


const privacyCheckbox = document.getElementById('privacyCheckbox');
    const submitBtn = document.getElementById('submitBtn');

    privacyCheckbox.addEventListener('change', function() {
      if (privacyCheckbox.checked) {
        submitBtn.disabled = false;
      } else {
        submitBtn.disabled = true;
      }
    });

    </script>
    
    
  </body>
</html>
