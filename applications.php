<?php
 include('reference.php');

// Check if 'status' is set and not empty
if (!isset($_GET['status']) || empty($_GET['status'])) {
    echo "<script>alert('Redirecting back...');
    history.back();</script>";
    exit;
}

$status = $_GET['status'];

// Replace with your actual encryption key
$encryptionKey = "your_secret_key";

try {
    // Decrypt the 'status' if it's encrypted
    $status = openssl_decrypt($status, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
} catch (Exception $e) {
    // Handle decryption errors here, e.g., log the error or redirect to an error page
    echo "Decryption error: " . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UTS - Applications</title>
    <!-- Head content here (meta tags, styles, etc.) -->
    <!-- Inside the <head> section of your HTML -->

    <script>
        function openRemarksPopup(r_id) {
            // Create the pop-up container
            var popupContainer = document.createElement("div");
            popupContainer.id = "popup-container";
            popupContainer.classList.add("popup-container");

            // Create the pop-up content
            var popupContent = document.createElement("div");
            popupContent.classList.add("popup-content");

            // Add HTML content for the select box and submit button
            popupContent.innerHTML = `
            <form action="update_challan.php" method="POST">
                <input type="hidden" name="application_id" value="${r_id}">
                <div class="form-group">
                    <label for="remarksSelect">Status<span style="color: red;">*</span></label>
                    <select class="form-control shadow" required name="status" id="remarksSelect" style="border: 1px solid #014073">
                        <option value="pending">Pending</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Accepted">Accepted</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="button" class="btn btn-danger shadow" onclick="closeRemarksPopup()">Close</button>
                    <input type="submit" class="btn btn-success shadow" value="Update & Continue" name="update_verification">
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

        function closeRemarksPopup() {
            // Remove the pop-up container
            var popupContainer = document.getElementById("popup-container");

            if (popupContainer) {
                document.body.removeChild(popupContainer);
            }
        }
    </script>
</head>
<body id="page-top">
    <?php include('admin_navbar.php'); ?>
    <div id="wrapper">
        <div class="container-fluid">
            <!-- Page content here -->

            <div class="row card pt-4 pl-4 mt-5">
                <div class="card-title text-success">
                    <b><h3 style="font-weight: bolder"><?php echo $status ?> Applications</h3></b>
                </div>
            </div>

            <div class="row mt-5">
                <!-- Display application data here -->

                <?php
                $sql = "SELECT receipts.*, jobs.*, personal_details.*
                        FROM receipts
                        JOIN personal_details ON receipts.p_id = personal_details.p_id AND receipts.j_id = personal_details.j_id
                        JOIN jobs ON personal_details.j_id = jobs.j_id
                        WHERE receipts.verification = '$status';";

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Display application details
                        echo "
                        <div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-success shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <div class='h5 font-weight-bold text-success text-uppercase mb-1'>
                                                " . $row['cname'] . "
                                            </div>
                                            <div class='h6 mb-0 font-weight-bold text-gray-800'>
                                                " . $row['j_name'] . "
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <img class='rounded-circle' src='" . $row['imageadress'] . "' alt='Image here' width='70px' height='70px'>
                                        </div>";
                                        if(!empty($row['receipt_address'])){
                                            echo "<div class='col-auto'><button class='btn btn-primary text-xs mt-2' onclick=\"window.open('/uts/" . $row['receipt_address'] . "', '_blank')\">View Fee Challan</button></div>";
                                        }else{
                                           echo "<div class='col-auto mt-2'><h3 style='color:red; font-size:20px'>Challan not submitted</h3></div>";
                                        }
                                        echo "<div class='col-12'>
                                            <button class='btn btn-success text-xs mt-2' onclick='openRemarksPopup(" . $row['r_id'] . ")'>Update Remarks</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    // No records found
                    echo "<div class='row pt-4 pl-4 mt-5'>
                            <div class='col-12 text-danger'>
                                <b><h3 class='text-center' style='font-weight:bold;'>No Record Found</h3></b>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php include('admin_footer.php'); ?>

    <!-- Other scripts and HTML elements here -->
</body>
</html>
