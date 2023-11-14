<?php
include("reference.php");
// include('/home/utscjnhd/connect.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user details from the result set
        $row = $result->fetch_assoc();
        $user_id = $row['user_id']; // Assuming 'user_id' is the column name in your database
        $username = $row['email']; // Assuming 'username' is the column name in your database

        $_SESSION['user_id'] = $user_id; // Store user ID in the session variable
        $_SESSION['username'] = $username; // Store username in the session variable

        // Redirect to the logged-in user's dashboard or another secure page
        header("Location: admin_index.php");
        exit();
    } else {
        // Display an error message for invalid credentials
        echo "<script>alert('Invalid username or password.');
        window.location.href='login.php'</script>";
    }
} else {
    // Authentication failed, show an error message
    header("Location: login.php?error=1");
}
?>
