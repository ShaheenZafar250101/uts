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
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
    </div>
    <div class="container-fluid">
      <div class="row">      
        <div class="col-md-12 m-auto">
          <div class="card mt-4 shadow">
          <form action="upload_receipt.php?j_id=<?php echo urlencode($j_idValue); ?>&param1=<?php echo urlencode($param1Value); ?>" enctype="multipart/form-data" method="post">              
              <div class="card-body">
                <!-- <h3>Fee Receipt</h3> -->
                <div class="row">

                  <div class="col-md-4">
                    
                  </div>
                  <br>
                  <div class="col-md-4">
                  <div class="form-group">
                      <label>Paid Fee Challan<span style="color: red;">*</span></label>
                      <input type="file" class="form-control shadow" required name="address" accept=".pdf, .png, .jpg, .jpeg" placeholder="Enter Number of Years" style="border: 1px solid #014073">
                    <p style="color:red">Upload your paid fee challan inorder to print your Roll No. Slip</p>
                    </div>
                        <div class="form-group">
                      <input type="submit" class="btn mt-2 btn-success shadow" style="float: right;" id="submitBtn" value="Submit" name="search">
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

    
  </body>
</html>
