
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
    <!-- <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
    </div> -->
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4">
          <div id="popupCard">
  <div class="row">
  <div class="col-md-12 ml-4"><h2>Instructions</h2></div>
  <div class="col-md-12 ml-4">
      <li style="margin-left: 50px;">The application form properly with complete and correct information.</li> 
      <li style="margin-left: 50px;">Do not leave any field blank, otherwise your application shall be rejected.</li> 
      <li style="margin-left: 50px;">Incorrect, false or forged information may result in cancellation of your candidature at any stage.</li> 
      <li style="margin-left: 50px;">Attach two recent passport size photograph and attested copy of CNIC.</li> 
      <li style="margin-left: 50px; color: red;">By hand submission of application form is not allowed.</li> 
      <li style="margin-left: 50px;">Keep visiting <a href="http://uts.com.pk" >http://uts.com.pk</a> for updates.</li> 
      <li style="margin-left: 50px; color: red;">Test fee is non-refundable and non-transferable.</li> 
  </ul>

  <label style="color: red;">Note: </label>
  <ul style="list-style-type:square;">
    	<!--<li style="margin-left: 50px;"> Date for application submission is Friday, 21st July 2023.</li>-->
    	<li style="margin-left: 50px;">Application must be submitted before the last date of submission of Application form.</li>
    	<li style="margin-left: 50px;">UTS will not be responsible for late receiving of Application.</li>

  </ul>

  <label style="color: red;">Eligibility Criteria: </label>
  <p style="color: grey;">If Your Reply Is “Yes” To all conditions below, Then Please Proceed Further. Otherwise You Are Not Eligible To Apply</p>
  <ul style="list-style-type:square;">
    	<input type="checkbox" id="c1" style="margin-left: 50px;"><span style="margin-left: 10px;text-justify: auto;">Your Age According To The Prescribed Age Limit For The Desired Post?</span></input><br>
    	<input type="checkbox" id="c2" style="margin-left: 50px;"><span style="margin-left: 10px;text-justify: auto;">Do You Have Requisite Qualification & Experience As Mentioned In Advertisement?</span></input><br>
    	<input type="checkbox" id="c3" style="margin-left: 50px;"><span style="margin-left: 10px;text-justify: auto;">Is Your Domicile According To The Desired Post As Mentioned In Advertisement?</span></input>

  </ul>

  <div class="col-md-12">
    <button class="btn btn-success mt-4 mb-4" disabled id="proceed" onclick="window.location.href='available_jobs.php'">Proceed</button>
  </div>
</div>
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
      
      const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const nextButton = document.getElementById('proceed');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        nextButton.disabled = !allChecked;
      });
    });
    </script>
    
    
  </body>
</html>
