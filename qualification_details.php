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
  <body style="background: #E6E6E6" onload="stopBack();">
    <?php
    include('navbar.php');
    ?>

    <br>
    <h2 class="text-center text-info">Online Application Form</h2>
    <hr class="shadow">
    <br>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 35%"></div>
    </div>
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4 shadow">
          <form action="qinsertion.php?j_id=<?php echo urlencode($j_idValue); ?>=&param1=<?php echo urlencode($param1Value); ?>" method="post">              
          <div class="card-body">
                <h3>Academic Information</h3>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Current Education<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="dname" style="border: 1px solid #014073">
                      <option value="Matric">Matric
                        (10 Years)
                        </option>
                      <option value="Intermediate">Intermediate
                        (12 Years)
                        </option>
                      <option value="BS(14 Years)">Bachelor
                        (14 Years)
                        </option>
                      <option value="BS/MS(16 Years)">Bachelor (Hons)/ Master
                        (16 Years)
                        </option>
                      <option value="Diploma">Diploma</option>
                      <option value="Others">Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Degree Title<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="dtitle" placeholder="Degree Title" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Passing Year<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="passyear" placeholder="Year of Passing" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Major Subject<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="major" placeholder="Major Subject e.g (Computer Science)" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Obtained Marks / CGPA<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="gpa" placeholder="Obtained Marks / CGPA" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Total Marks / CGPA<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="total" placeholder="Total Marks / CGPA" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>University / Board<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="board" placeholder="Univesity / Board" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <br>
                      <input type="submit" class="btn mt-2 btn-success shadow" style="float: right;" value="Submit & Continue" name="search">
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
    function stopBack() {
        window.history.go(1);
        alert('You can edit application after submission');
    }


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



    </script>
    
    
  </body>
</html>
