<?php
 include('reference.php');

// Get form data
$encryptionKey = "your_secret_key"; // This should be kept secure
$param1Value = $_GET['param1'];
$param1Value = openssl_decrypt($param1Value, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
$j_idValue = $_GET['j_id'];
$j_idValue = openssl_decrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
$dname = $_POST['dname'];
$dtitle = $_POST['dtitle'];
$passyear = $_POST['passyear'];
$major = $_POST['major'];
$gpa = $_POST['gpa'];
$total = $_POST['total'];
$board = $_POST['board'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO qualification_details (current_education, degree_title, passing_year, major_subject, obtained_marks, total_marks, university_board, p_id,j_id) VALUES (?, ?, ?, ?, ?, ?, ?,?, ?)");
$stmt->bind_param("ssssddsii", $dname, $dtitle, $passyear, $major, $gpa, $total, $board, $param1Value,$j_idValue);

// Execute the statement
if ($stmt->execute()) {
    $encryptedData = openssl_encrypt($param1Value, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
    $j_idValue = openssl_encrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
    header("Location: experience_details.php?j_id=".urlencode($j_idValue)."&param1=" . urlencode($encryptedData));
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
