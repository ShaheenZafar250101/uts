<?php
if (isset($_GET['j_id'])) {
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
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
    </div>
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4 shadow">
            <form action="pinsertion.php?j_id=<?php echo urlencode($j_idValue); ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <h3>Personal Information</h3>
                  <div class="col-md-12">
                    <div class="passport-frame  float-right" id="passportFrame">
                      <img id="passportImage" src="#" alt="Add Passport Size Photo" />
                      <button type="button" style="visibility: hidden" class="remove-button" onclick="removeImage()">Remove</button>
                      <button type="button"  style="margin-left:1px; margin-top: 69px;" class="add-picture-button" id="addPictureButton" onclick="document.getElementById('pic').click()">Add Picture</button>
                    <input type="file" required id="pic" name="cimage" accept="image/*" onchange="validateImageSize()" style="display: none;">
                    <p id="imgerrorMessage" style="color: red;"></p>
                    </div>
                    
                  </div>                  
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Full Name<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="cname" id="cname" placeholder="Candidate Name" style="border: 1px solid #014073" oninput="convertToUppercase()" maxlength="20">
                      <p id="nameerrorMessage" style="color: red;"></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Father Name<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required id="fname" name="fname" placeholder="Father Name" style="border: 1px solid #014073" oninput="convertNameToUppercase()" maxlength="20">
                      <p id="fnameerrorMessage" style="color: red;"></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Candidate CNIC<span style="color: red;">*</span></label>
                      <input type="text" title="Enter Number Only (e.g 1234567890123)" class="form-control shadow" required style="border: 1px solid #014073" placeholder="Candidate Number" name="cnic" id="integerInput" pattern="[0-9]{13}" oninput="validateInteger(this)">
                      <p id="errorMessage" style="color: red;"></p>
                    </div>                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Gender<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="gender" style="border: 1px solid #014073">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Date of Birth<span style="color: red;">*</span></label>
                      <input type="date" class="form-control shadow" required name="dob" placeholder="DOB" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Email<span style="color: red;">*</span></label>
                      <input type="email" class="form-control shadow" required name="email" placeholder="Email Address" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Disability<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="disability" style="border: 1px solid #014073">
                      <option value="no">No</option>
                      <option value="yes">Yes</option>
                      <!-- <option>Other</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Postal Address<span style="color: red;">*</span></label>
                      <input type="address" class="form-control shadow" required name="address" placeholder="Postal Address" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>City<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="city" placeholder="City" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>District<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="district" placeholder="District" style="border: 1px solid #014073">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Domicile<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="domicile" style="border: 1px solid #014073">
                      <option value="Islamabad">Islamabad</option>
                      <option value="Punjab">Punjab</option>
                      <option value="Sindh(U)">Sindh (U)</option>
                      <option value="Sindh(R)">Sindh (R)</option>
                      <option value="Balochistan">Balochistan</option>
                      <option value="KPK">KPK</option>
                      <option value="Azad Kashmir">Azad Kashmir</option>
                      <option value="FATA/GB">FATA/GB</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Phone No<span style="color: red;">*</span></label>
                      <input type="text" class="form-control shadow" required name="pno" placeholder="Phone Number" style="border: 1px solid #014073"  pattern="[0-9]{11}" oninput="validateNumber(this)">
                      <p id="nerrorMessage" style="color: red;"></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Mobile No</label>
                      <input type="text" class="form-control shadow" name="mno" placeholder="Mobile NUmber" style="border: 1px solid #014073"  pattern="[0-9]{11}" oninput="validateMobile(this)">
                      <p id="merrorMessage" style="color: red;"></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Religion<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="religion" style="border: 1px solid #014073">
                      <option value="Muslim">Muslim</option>
                      <option value="Non-Muslim">Non Muslim</option>
                      <!-- <option>Other</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Are Govt. Serving Employee?<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="service" style="border: 1px solid #014073">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                      <!-- <option>Other</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Are you retired from Pakistan Armed Forces?<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="retired" style="border: 1px solid #014073">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                      <!-- <option>Other</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select Desired Test City<span style="color: red;">*</span></label>
                      <select class="form-control shadow" required name="tcenter" style="border: 1px solid #014073">
                      <option value="Islamabad">Islamabad</option>
                      <option value="Lahore">Lahore</option>
                      <option value="Peshawar">Peshawar</option>
                      <option value="Quetta">Quetta</option>
                      <!-- <option>Other</option> -->
                      </select>
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

function validateNumber(inputElement) {
  let inputValue = inputElement.value.trim(); // Remove all blank spaces
  inputValue = inputValue.replace(/[^0-9.]/g, '');

    const errorMessageElement = document.getElementById("nerrorMessage");
    inputElement.value = inputValue;
    if (/^\d*$/.test(inputValue)) {
        if (inputValue.length >= 11) {
            errorMessageElement.textContent = "";
            inputValue = inputValue.slice(0, 11); // Keep only the first 13 digits
            inputElement.value = inputValue; // Update input value after removing spaces
        } else {
            errorMessageElement.textContent = "Please enter a valid Mobile Number of at least 11 digits.";
        }
    } else {
        errorMessageElement.textContent = "Please enter a valid Mobile Number consisting of digits only.";
    }
}

function validateMobile(inputElement) {
  let inputValue = inputElement.value.trim(); // Remove all blank spaces
  inputValue = inputValue.replace(/[^0-9.]/g, '');

    const errorMessageElement = document.getElementById("merrorMessage");
    inputElement.value = inputValue;
    if (/^\d*$/.test(inputValue)) {
        if (inputValue.length >= 11) {
            errorMessageElement.textContent = "";
            inputValue = inputValue.slice(0, 11); // Keep only the first 13 digits
            inputElement.value = inputValue; // Update input value after removing spaces
        } else {
            errorMessageElement.textContent = "Please enter a valid Mobile Number of at least 11 digits.";
        }
    } else {
        errorMessageElement.textContent = "Please enter a valid Mobile Number consisting of digits only.";
    }
}

function convertToUppercase() {
  const inputField = document.getElementById("cname");
  const errorMessage = document.getElementById("nameerrorMessage");

  let inputValue = inputField.value;

  // Remove non-letter characters
  inputValue = inputValue.replace(/[^a-zA-Z ]/g, '');

  // Replace multiple spaces with a single space

  if (inputValue === '') {
    inputField.value = inputValue.trim();
    errorMessage.textContent = '';
  } else {
    inputValue = inputValue.replace(/\s+/g, ' ');
    inputField.value = inputValue.toUpperCase();
    errorMessage.textContent = '';
  }
}

function convertNameToUppercase() {
  const inputField = document.getElementById("fname");
  const errorMessage = document.getElementById("fnameerrorMessage");

  let inputValue = inputField.value;

  // Remove non-letter characters
  inputValue = inputValue.replace(/[^a-zA-Z ]/g, '');

  // Replace multiple spaces with a single space

  if (inputValue === '') {
    inputField.value = inputValue.trim();
    errorMessage.textContent = '';
  } else {
    inputValue = inputValue.replace(/\s+/g, ' ');
    inputField.value = inputValue.toUpperCase();
    errorMessage.textContent = '';
  }
}

function validateImageSize() {
  const fileInput = document.getElementById('pic');
  const errorMessage = document.getElementById('imgerrorMessage');
  const passportImage = document.getElementById('passportImage');
  const addPictureButton = document.getElementById('addPictureButton');

  errorMessage.textContent = '';

  if (fileInput.files && fileInput.files[0]) {
    const fileSize = fileInput.files[0].size; // in bytes
    if (fileSize > 50240) {
      errorMessage.textContent = 'Image size must be less than 50KB.';
      fileInput.value = ''; // Clear the selected file
      passportImage.src = ''; // Clear the displayed image
      return;
    }
    
    const reader = new FileReader();
    reader.onload = function (e) {
      passportImage.src = e.target.result;
      addPictureButton.style.display = 'none'; // Hide the Add Picture button
      passportImage.parentNode.querySelector('.remove-button').style.visibility = 'visible'; // Show the Remove button
    };
    reader.readAsDataURL(fileInput.files[0]);
  }
}

function removeImage() {
  const passportImage = document.getElementById('passportImage');
  const addPictureButton = document.getElementById('addPictureButton');
  passportImage.src = ''; // Clear the displayed image
  passportImage.parentNode.querySelector('.remove-button').style.visibility = 'hidden'; // Hide the Remove button
  addPictureButton.style.display = 'block'; // Show the Add Picture button
  document.getElementById('pic').value = ''; // Clear the selected file
}

  
    </script>
    
    
  </body>
</html>
