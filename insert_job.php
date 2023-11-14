<?php
 include('reference.php');

// Check if the form is submitted
if (isset($_POST['search'])) {
    // Retrieve values from the form
    $jname = $_POST['jname'];
    $sdate = $_POST['sdate'];
    $ldate = $_POST['ldate'];
    $scale = "(".$_POST['scale'].")";
    $status = $_POST['status'];
    $project = $_POST['project']; // This will contain the project name

    // Retrieve the project_id based on the selected project name
    $sql1 = "SELECT project_id FROM projects WHERE pname = ?";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("s", $project);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $project_id = $row['project_id'];

        // Insert the record into the jobs table with project_id
        $sql2 = "INSERT INTO jobs (j_name, s_date, l_date, scale,status, project_id) VALUES (?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("sssssi", $jname, $sdate, $ldate, $scale,$status, $project_id);
        if ($stmt->execute()) {
            header("Location: admin_index.php");
                        exit();
        } else {
            // Handle the insertion error
            echo "Error: " . $stmt->error;
        }
    } else {
        // Project not found, handle this error
        echo "Project not found!";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
