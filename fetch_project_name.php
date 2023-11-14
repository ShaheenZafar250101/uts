<?php
 include('reference.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['projectID'])) {
    $projectID = $_POST['projectID'];
    
    // Query the projects table to fetch the project name based on the project ID
    $sql = "SELECT pname FROM projects WHERE project_id = $projectID";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['pname'];
    } else {
        echo "Project not found";
    }
}

$conn->close();
?>
