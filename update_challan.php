<?php
 include('reference.php');

if (isset($_POST['update_verification'])) {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['status'];

    // Perform the SQL update operation
    $sql = "UPDATE receipts SET verification = '$new_status' WHERE r_id = '$application_id'";
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
