<?php
include('reference.php');

if (isset($_POST['update_status'])) {
    $application_id = $_POST['application_id'];
    $new_date = $_POST['ex_date'];
    $new_time = $_POST['ex_time'];

    // Perform the SQL update operation
    $sql = "UPDATE exams SET ex_date = '$new_date', ex_time = '$new_time' WHERE ex_id = '$application_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>history.back();</script>";
    } else {
        // Update failed
        // Handle the error as needed
        echo "Error: " . $conn->error;
    }
}

// Redirect back to the previous page after the update
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
