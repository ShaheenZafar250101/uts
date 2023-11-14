
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

    <title>UTS - JOBS</title>

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
                    <form action="insert_job.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h3>Post New Job</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Job Name<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control shadow" required name="jname" placeholder="Job Name" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Start Date<span style="color: red;">*</span></label>
                                        <input type="date" class="form-control shadow" required name="sdate" placeholder="Start Date" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Date To Apply<span style="color: red;">*</span></label>
                                        <input type="date" class="form-control shadow" required name="ldate" placeholder="Last Date" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Scale<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control shadow" required name="scale" placeholder="e.g. BPS-18 or BPS-16" style="border: 1px solid #014073">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Project<span style="color: red;">*</span></label>
                                        <select class="form-control shadow" required name="project" style="border: 1px solid #014073">
                                            <?php
                                            $sql1 = 'SELECT * FROM projects where pstatus = "onGoing"';
                                            $result = $conn->query($sql1);
                                            // Use a while loop to fetch rows
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['pname'] . "'>" . $row['pname'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status<span style="color: red;">*</span></label>
                                        <select class="form-control shadow" required name="status" style="border: 1px solid #014073">
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                            <option value="UpComing">UpComing</option>
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