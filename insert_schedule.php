<?php
 include('reference.php');

if (isset($_POST['schedule'])) {
    // Retrieve form data
    $jobName = $_POST['jname'];
    $examDate = $_POST['sdate'];
    $project = $_POST['project'];
    $examTime = $_POST['extime'];
    $scale = '';
    $pid = '';

    // Use prepared statements to prevent SQL injection
    $sql1 = "SELECT * FROM projects WHERE pname = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $project);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    // Check for errors in the query
    if (!$result1) {
        die("Error in SQL query: " . $conn->error);
    }

    // Fetch project ID
    if ($row = $result1->fetch_assoc()) {
        $pid = $row['project_id'];
        // echo $pid;
    }

    // Close the first statement
    $stmt1->close();

    // Use prepared statements for the second query as well
    $sql2 = "SELECT * FROM jobs WHERE j_name = ? AND project_id = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("si", $jobName, $pid);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    // Check for errors in the query
    if (!$result2) {
        die("Error in SQL query: " . $conn->error);
    }

    // Fetch the scale
    if ($row1 = $result2->fetch_assoc()) {
        $scale = $row1['scale'];
        // echo $scale;
    }

    // Close the second statement
    $stmt2->close();

    // Retrieve and sanitize the test centers
    $testCenters = isset($_POST['center']) ? implode(', ', $_POST['center']) : '';
    $parts = explode(", ", $testCenters);

    $check = true;

    foreach ($parts as $desiredCenter) {
        // Use prepared statements and placeholders to prevent SQL injection
        $sql = "SELECT * FROM exams WHERE center LIKE ? AND j_name = ? AND ex_date = ?";
        $stmt = $conn->prepare($sql);
        $desiredCenterParam = "%" . $desiredCenter . "%";
        $stmt->bind_param("sss", $desiredCenterParam,$jobName,$examDate);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check for errors in the query
        if (!$result) {
            die("Error in SQL query: " . $conn->error);
        }

        // If a record is found, set $check to false and break the loop
        if ($result->num_rows > 0) {
            $check = false;
            echo "<script>alert('".$desiredCenter." is already listed for this Date');
            window.location.href='schedule_exam.php'</script>";
            break;
        }

        // Close the statement
        $stmt->close();
    }
// echo $jobName;
    // Insert data into the exams table if $check is true
    if ($check) {
        // Use prepared statements to insert data safely
        // Modify your SQL query to include 7 placeholders
        $status = "Active";
$sql = "INSERT INTO exams (j_name, ex_date, project, center, status, job_scale, project_id,ex_time) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

// Bind all 7 parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssis", $jobName, $examDate, $project, $testCenters, $status, $scale, $pid,$examTime);

// Execute the statement and handle errors as before
if ($stmt->execute()) {
    echo "<script>alert('Exam Scheduled Successfully');
    window.location.href='admin_index.php'</script>";
} else {
    echo "<script>alert('Error While Listing');
    window.location.href='schedule_exam.php'</script>";
}

// Close the statement
$stmt->close();

    }

    // Close the database connection
    $conn->close();
}
?>
