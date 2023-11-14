
<?php
 include('reference.php');

 // Check if 'status' is set and not empty
if (!isset($_GET['status']) || empty($_GET['status'])) {
    echo "<script>alert('Redirecting back...');
    history.back();</script>";
    exit;
}

$status = $_GET['status'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <script>
        function openRemarksPopup(j_id, s_date,l_date) {
    // Create the pop-up container
    var popupContainer = document.createElement("div");
    popupContainer.id = "popup-container";
    popupContainer.classList.add("popup-container");

    // Create the pop-up content
    var popupContent = document.createElement("div");
    popupContent.classList.add("popup-content");

    // Add HTML content for the select box and submit button
    popupContent.innerHTML = `
        <form action="update_job.php" method="POST">
            <input type="hidden" name="application_id" value="${j_id}">
            
            <div class="form-group">
                        <label>Start Date<span style="color: red;">*</span></label>
                        <input value="${s_date}" type="date" class="form-control shadow" required name="s_date" placeholder="University / Board" style="border: 1px solid #014073">
                    </div>
                    <div class="form-group">
                        <label>Last Date To Apply<span style="color: red;">*</span></label>
                        <input value="${l_date}" type="date" class="form-control shadow" required name="l_date" placeholder="University / Board" style="border: 1px solid #014073">
                    </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-danger shadow" onclick="closeRemarksPopup()">Close</button>
                <input type="submit" class="btn btn-success shadow" value="Update & Continue" name="update_status">
            </div>
        </form>
    `;

                // Style the pop-up container
                popupContainer.style.display = "flex";
            popupContainer.style.justifyContent = "center";
            popupContainer.style.alignItems = "center";
            popupContainer.style.position = "fixed";
            popupContainer.style.top = "0";
            popupContainer.style.left = "0";
            popupContainer.style.width = "100%";
            popupContainer.style.height = "100%";
            popupContainer.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
            popupContainer.style.zIndex = "1000";

            // Style the pop-up content
            popupContent.style.background = "#fff";
            popupContent.style.padding = "20px";
            popupContent.style.borderRadius = "5px";
            popupContent.style.boxShadow = "0px 0px 10px rgba(0, 0, 0, 0.5)";


    // Append the pop-up content to the container
    popupContainer.appendChild(popupContent);

    // Append the container to the body
    document.body.appendChild(popupContainer);
}

// Define a function to close the popup (you need to implement this)
function closeRemarksPopup() {
    // Implement the logic to close the popup here
    // For example, you can remove the popupContainer from the DOM
}


        function closeRemarksPopup() {
            // Remove the pop-up container
            var popupContainer = document.getElementById("popup-container");

            if (popupContainer) {
                document.body.removeChild(popupContainer);
            }
        }
    </script>

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

<?php include('admin_navbar.php'); ?>
<!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="row card pt-4 pl-4 mt-5">
                    <?php
                                $status = $_GET['status'];
                                $encryptionKey = "your_secret_key"; // This should be kept secure
                                $status = openssl_decrypt($status, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
                                // echo $status;
                    ?>
                        <div class="card-title text-success" ><b><h3 style="font-weight:bolder"><?php echo $status?> Jobs </h3></b></div>
                    </div>
                    <div class="row mt-5">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $updatejobs = "UPDATE jobs
                        SET `status` = 'Not Available'
                        WHERE `status` = '$status' AND `l_date` < CURDATE()";
                        $updateresult = $conn->query($updatejobs);
                        
                        $updatejob = "UPDATE jobs
                        SET `status` = 'Available'
                        WHERE `status` = '$status' AND `s_date` <= CURDATE() AND `l_date` >= CURDATE()";
                        $updatejobresult = $conn->query($updatejob);
                        
                        $update = "UPDATE jobs
                        SET `status` = 'UpComing'
                        WHERE `status` = '$status' AND `s_date` > CURDATE()";
                        $updatejobresult = $conn->query($updatejob);
    
                            $sql = "SELECT * FROM jobs
                                WHERE `status` = '$status';";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $getproject = "SELECT * FROM projects where `project_id` = ".$row['project_id']."";
                                        $projectResult = $conn->query($getproject);
                                        $projectCount = $projectResult->num_rows;
                                    if($projectCount > 0){
                                        while($row1 = $projectResult->fetch_assoc()){
                                        $projectName = $row1['pname'];
                                        echo "
                                        <div class='col-xl-3 col-md-6 mb-4'>
                                            <div class='card border-left-success shadow h-100 py-2'>
                                                <div class='card-body'>
                                                    <div class='row no-gutters align-items-center'>
                                                        <div class='col mr-2'>
                                                        <div class='h5 font-weight-bold text-success text-uppercase mb-1'>
                                                            " . $row['j_name'] . "
                                                        </div>
                                                        <div class='h6 mb-0 font-weight-bold text-gray-800'>
                                                            " . $row['scale'] . "
                                                        </div>
                                                        <div class='h6 mb-0 font-weight-bold text-gray-800'><p style='color:red'>Closed: 
                                                            " . $row['l_date'] . "</p>
                                                        </div>
                                                        <div class='h6 mb-0 font-weight-bold text-gray-800'><p>Project: 
                                                            " . $projectName . "</p>
                                                        </div>
                                                    </div>
                                                    <div class='col-12'>
                                                        <button class='btn btn-success text-xs mt-2' onclick='openRemarksPopup(" . $row['j_id'] . ",\"" . $row['s_date'] . "\",\"" . $row['l_date'] . "\")'>Update Status</button>                                                        
                                                        </div>
                                                    ";
                                                        
                                                        echo "
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                        }
                                    }
                                        
                                        
                                    }
                                } else {
                                    echo "<div class='row pt-4 pl-4 mt-5'>
    <div class='col-12 text-danger'> <!-- Added 'text-center' class here -->
        <b><h3 class='text-center' style='font-weight:bold;'>No Record Found</h3></b>
    </div>
</div>";

                                }

                                ?>

                        
                    </div>

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('admin_footer.php'); ?>

            <!-- End of Footer -->

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

</body>

</html>