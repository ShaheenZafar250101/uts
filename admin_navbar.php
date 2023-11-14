<?php



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
    <!-- Bootstrap core JavaScript-->
    <script src="libraries/jquery/jquery.min.js"></script>
    <script src="libraries/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="libraries/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="libraries/chart.js/Chart.min.js"></script>

    <title>UTS - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="libraries/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_index.php">
    <div class="sidebar-brand-icon">
        <!-- <i class="fas fa-laugh-wink"></i> -->
        <img src='img/logo.png' height="60px" width="70px" >
    </div>
    <div class="sidebar-brand-text mx-3">UTS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="admin_index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Applications</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Applications:</h6>
    <?php
    function encryptStatus($status, $encryptionKey) {
        // Use AES-256-CBC encryption
        $iv = $encryptionKey; // Make sure to use a unique IV for each encryption
        $encryptedData = openssl_encrypt($status, 'AES-256-CBC', $encryptionKey, 0, $iv);
        return urlencode($encryptedData);
    }

    // Define your encryption key (should be kept secret)
    $encryptionKey = "your_secret_key";

    // Encrypt and create links
    $acceptedStatus = encryptStatus('Accepted', $encryptionKey);
    $pendingStatus = encryptStatus('Pending', $encryptionKey);
    $rejectedStatus = encryptStatus('Rejected', $encryptionKey);
    ?>

    <a class="collapse-item" href="applications.php?status=<?php echo $acceptedStatus; ?>">Accepted</a>
    <a class="collapse-item" href="applications.php?status=<?php echo $pendingStatus; ?>">Pending</a>
    <a class="collapse-item" href="applications.php?status=<?php echo $rejectedStatus; ?>">Rejected</a>
</div>


    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Projects</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Projects:</h6>
            <?php

    // Define your encryption key (should be kept secret)
    $encryptionKey = "your_secret_key";

    // Encrypt and create links
    $onGoingStatus = encryptStatus('onGoing', $encryptionKey);
    $previousStatus = encryptStatus('previous', $encryptionKey);
    $upComingStatus = encryptStatus('upComing', $encryptionKey);
    ?>
            <a class="collapse-item" href="add_project.php">Add New Project +</a>
            <!--<a class="collapse-item" href="add_job.php">Create Jobs +</a>-->
            <a class="collapse-item" href="projects.php?status=<?php echo $onGoingStatus; ?>">OnGoing</a>
            <a class="collapse-item" href="projects.php?status=<?php echo $previousStatus; ?>">Previous</a>
            <a class="collapse-item" href="projects.php?status=<?php echo $upComingStatus; ?>">UpComing</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobs"
        aria-expanded="true" aria-controls="collapseJobs">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Jobs</span>
    </a>
    <div id="collapseJobs" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jobs:</h6>
            <?php

    // Define your encryption key (should be kept secret)
    $encryptionKey = "your_secret_key";

    // Encrypt and create links
    $onGoingJobs = encryptStatus('Available', $encryptionKey);
    $previousJobs = encryptStatus('Not Available', $encryptionKey);
    $upComingJobs = encryptStatus('UpComing', $encryptionKey);
    ?>
            <!-- <a class="collapse-item" href="add_project.php">Add New Project +</a> -->
            <a class="collapse-item" href="add_job.php">Create Jobs +</a>
            <a class="collapse-item" href="jobs.php?status=<?php echo $onGoingJobs; ?>">OnGoing</a>
            <a class="collapse-item" href="jobs.php?status=<?php echo $previousJobs; ?>">Previous</a>
            <a class="collapse-item" href="jobs.php?status=<?php echo $upComingJobs; ?>">UpComing</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
    Schedule
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseexams"
        aria-expanded="true" aria-controls="collapseexams">
        <i class="fas fa-fw fa-book-open"></i>
        <span>Scheduled Exam</span>
    </a>
    <div id="collapseexams" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Scheduled Exam:</h6>
            <?php

    // Define your encryption key (should be kept secret)
    $encryptionKey = "your_secret_key";

    // Encrypt and create links
    $onGoingExams = encryptStatus('Active', $encryptionKey);
    $previousExams = encryptStatus('Closed', $encryptionKey);
    // $upComingJobs = encryptStatus('UpComing', $encryptionKey);
    ?>
            <!-- <a class="collapse-item" href="add_project.php">Add New Project +</a> -->
            <a class="collapse-item" href="schedule_exam.php">Scehdule Exam +</a>
            <a class="collapse-item" href="exams.php?status=<?php echo $onGoingExams; ?>">Scheduled</a>
            <a class="collapse-item" href="exams.php?status=<?php echo $previousExams; ?>">Closed</a>
            <!-- <a class="collapse-item" href="exams.php">Previous</a> -->
            <!-- <a class="collapse-item" href="jobs.php?status=<//?php echo $upComingJobs; ?>">UpComing</a> -->
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<div class="mb-3 text-center d-none d-md-inline">
    <button class="btn btn-primary border-0"><a class="text-white" href="logout.php">Logout</a></button>
</div>
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Bootstrap core JavaScript-->
<script src="libraries/jquery/jquery.min.js"></script>
    <script src="libraries/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="libraries/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="libraries/chart.js/Chart.min.js"></script>

</body>
</html>