<?php
 include('reference.php');

if (isset($_POST['update_status'])) {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['status'];

    // Perform the SQL update operation
    $sql = "UPDATE projects SET pstatus = '$new_status' WHERE project_id = '$application_id'";
    if ($conn->query($sql) === TRUE) {
       echo "<script>history.back();</script>";
    } else {
        // Update failed
        // Handle the error as needed
    }
}

// Redirect back to the previous page after the update
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
