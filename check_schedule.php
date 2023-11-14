<?php
 include('reference.php');

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $job_id = $_POST['job_select'];
    $cnic = $_POST['cnic'];

    $sql = "SELECT * FROM personal_details WHERE cnic='$cnic' AND j_id='$job_id'";
    $result = $conn->query($sql);

    if ($result) {
        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Output JavaScript to open a new window
        
        echo '<script>
        window.open("roll_no_slip.php?cnic=' . $cnic . '&job_id=' . $job_id . '", "_blank");
        </script>';

        // Redirect to schedule.php after a delay (for example, 2 seconds)
        echo '<meta http-equiv="refresh" content="0;url=schedule.php">';
        } else {
            // No record found, show an alert and redirect
            echo '<script>
            alert("No record found");
            window.location.href = "schedule.php";
            </script>';
            exit();
        }
    } else {
        // Handle query execution error
        echo "Query failed: " . $conn->error;
    }
} else {
    // Handle the case where POST data is not set
    echo "Values not set";
}

// Close the database connection
$conn->close();
?>
