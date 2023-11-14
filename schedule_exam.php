<?php

session_start();

// Check if the user is not logged in or session has expired
// $session_timeout = 60 * 60; // 60 minutes (in seconds)
if (!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) {
    // Clear session data
    session_unset();
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
 include('reference.php');

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UTS - Exams</title>

    <!-- Custom fonts for this template-->
    <link href="libraries/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
<?php
include('admin_navbar.php');
?>
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card mt-4 shadow">
                    <form action="insert_schedule.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h3>Schedule New Exam</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Job Name<span style="color: red;">*</span></label>
    <select class="form-control shadow" required name="jname" id="jobSelect" style="border: 1px solid #014073">
        <?php
        $sql2 = 'SELECT * FROM jobs';
        $result2 = $conn->query($sql2);
        echo "<option value='' data-jname=''>Select a Job</option>";
        while ($row1 = $result2->fetch_assoc()) {
            echo "<option value='" . $row1['project_id'] . "' data-jname='" . $row1['j_name'] . "'>" . $row1['j_name'] . $row1['scale'] . "</option>";
        }
        ?>
    </select>
    
    <!-- <label>Project Name</label>
    <input type="text" id="projectName" readonly> -->
    
    <!-- Hidden input field to store j_name value -->
    <input type="hidden" id="jNameHidden" name="jname" readonly>

                                    <!-- <label>Project Name</label>
                                    <input type="text" id="projectName" readonly> -->
                                  
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Exam Date<span style="color: red;">*</span></label>
                                        <input type="date" class="form-control shadow" required name="sdate" placeholder="Start Date" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Exam Start Time<span style="color: red;">*</span></label>
                                        <input type="time" class="form-control shadow" required name="extime" placeholder="Start Date" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Project<span style="color: red;">*</span></label>
                                        <input class="form-control shadow" type="text" id="projectName" required name="project" placeholder="Please Select a Job Name" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Test Center<span style="color: red;">*</span></label><br>
                                        <label for="islamabad">
                                        <input type="checkbox" id="islamabad" name="center[]" value="Islamabad">
                                        Islamabad
                                        </label>
                                        <label for="lahore">
                                            <input type="checkbox" id="lahore" name="center[]" value="Lahore">
                                            Lahore
                                        </label>
                                        <label for="peshawar">
                                            <input type="checkbox" id="peshawar" name="center[]" value="Peshawar">
                                            Peshawar
                                        </label>
                                        <label for="quetta">
                                            <input type="checkbox" id="quetta" name="center[]" value="Quetta">
                                            Quetta
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" class="btn mt-2 btn-success shadow" style="float: right;" value="Submit & Continue" name="schedule">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include('admin_footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script>
$(document).ready(function() {
    $('#jobSelect').on('change', function() {
        var selectedProjectID = $(this).val();
        var selectedJName = $(this).find(':selected').data('jname'); // Get j_name from data attribute
        
        // Update the hidden input field with the selected j_name
        $('#jNameHidden').val(selectedJName);
        
        // Make an AJAX request to fetch the project name based on the selected project ID
        $.ajax({
            type: 'POST',
            url: 'fetch_project_name.php',
            data: { projectID: selectedProjectID },
            success: function(data) {
                $('#projectName').val(data);
            }
        });
    });
});
</script>


    <!-- Bootstrap core JavaScript-->
    <script src="libraries/jquery/jquery.min.js"></script>
    <script src="libraries/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="libraries/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="libraries/chart.js/Chart.min.js"></script>
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>