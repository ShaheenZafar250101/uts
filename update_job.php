<?php
 include('reference.php');

if (isset($_POST['update_status'])) {
    $application_id = $_POST['application_id'];
    // $new_status = $_POST['status'];
    $new_date = $_POST['s_date'];
    $last_date = $_POST['l_date'];

    // Perform the SQL update operation
    $sql = "UPDATE jobs SET s_date = '$new_date',l_date = '$last_date' WHERE j_id = '$application_id'";
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
