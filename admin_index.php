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

<?php
    include('admin_navbar.php');
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

    
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <div class="row mt-5">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Applications</div>
                                                <?php
                                                    $sql = "SELECT COUNT(r_id) AS count FROM receipts"; // Alias the COUNT result as 'count'
                                                    $result = $conn->query($sql);

                                                    if ($result) {
                                                        $row = $result->fetch_assoc(); // Fetch the result as an associative array
                                                        $count = $row['count']; // Get the 'count' value from the array
                                                        // echo $count; // Output the count
                                                    } else {
                                                        echo 'not found';
                                                    }
                                                ?>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Accepted Applications</div>
                                                <?php
                                                    $sql2 = "SELECT COUNT(r_id) AS count FROM receipts where verification = 'Accepted'"; // Alias the COUNT result as 'count'
                                                    $result2 = $conn->query($sql2);

                                                    if ($result2) {
                                                        $row2 = $result2->fetch_assoc(); // Fetch the result as an associative array
                                                        $count2 = $row2['count']; // Get the 'count' value from the array
                                                        // echo $count; // Output the count
                                                    } else {
                                                        echo 'not found';
                                                    }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Rejected Applications</div>
                                                <?php
                                                    $sql3 = "SELECT COUNT(r_id) AS count FROM receipts where verification = 'Rejected'"; // Alias the COUNT result as 'count'
                                                    $result3 = $conn->query($sql3);

                                                    if ($result3) {
                                                        $row3 = $result3->fetch_assoc(); // Fetch the result as an associative array
                                                        $count3 = $row3['count']; // Get the 'count' value from the array
                                                        // echo $count; // Output the count
                                                    } else {
                                                        echo 'not found';
                                                    }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-trash fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Applications</div>
                                                <?php
                                                    $sql4 = "SELECT COUNT(r_id) AS count FROM receipts where verification = 'Pending'"; // Alias the COUNT result as 'count'
                                                    $result4 = $conn->query($sql4);

                                                    if ($result4) {
                                                        $row4 = $result4->fetch_assoc(); // Fetch the result as an associative array
                                                        $count4 = $row4['count']; // Get the 'count' value from the array
                                                        // echo $count; // Output the count
                                                    } else {
                                                        echo 'not found';
                                                    }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count4; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Applications Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Applications Ratio</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Accepted
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Rejected
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Pending
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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


    <?php
 include('reference.php');

 $monthlyData = array();

// Query to retrieve the count of applications submitted each month
$sql5 = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month_year, COUNT(*) AS count
        FROM personal_details
        GROUP BY month_year
        ORDER BY month_year";

$result5 = $conn->query($sql5);

if (!$result5) {
    // Handle the error, e.g., by printing an error message or logging it
    echo "Error: " . $conn->error;
} else {
    while ($row5 = $result5->fetch_assoc()) {
        $monthlyData[$row5['month_year']] = $row5['count'];
    }
}

// Create an array for chart labels and data
$chartLabels = array();
$chartData = array();

// Loop through the monthly data and format it for the chart
foreach ($monthlyData as $monthYear => $count) {
    $chartLabels[] = $monthYear;
    $chartData[] = $count;
}

// Encode the chart data as JSON for use in JavaScript
$chartDataJson = json_encode($chartData);
$chartLabelsJson = json_encode($chartLabels);
?>

<!-- JavaScript code for rendering the chart -->
<script>
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $chartLabelsJson; ?>,
            datasets: [{
                label: 'Application Forms Filled',
                data: <?php echo $chartDataJson; ?>,
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
                pointRadius: 3,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: 'rgba(78, 115, 223, 1)',
                pointHoverRadius: 3,
                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                pointHitRadius: 10,
                pointBorderWidth: 2,
            }],
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM YYYY'
                        },
                        tooltipFormat: 'MMM YYYY'
                    },
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Applications'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

<?php 
 include('reference.php');

?>
 <?php
        $sql6 = "SELECT COUNT(*) as count, verification FROM receipts GROUP BY verification";
        $result6 = $conn->query($sql6);

        $data = array();

        while ($row6 = $result6->fetch_assoc()) {
            $data[$row6['verification']] = $row6['count'];
        }
        ?>
        <?php
        // Encode the $data array as JSON for use in JavaScript
        $data_json = json_encode($data);
        ?>

        <script>
        // Use the $data_json variable to populate the chart data dynamically
        var dynamicData = <?php echo $data_json; ?>;
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Accepted", "Rejected", "Pending"],
            datasets: [{
            data: [dynamicData['Accepted'], dynamicData['Rejected'], dynamicData['Pending']],
            backgroundColor: ['#4e73df', '#C30205', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#890104', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
        </script>




</body>

</html>