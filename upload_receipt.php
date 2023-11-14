<?php
 include('reference.php');

 $j_idValue = $_GET['j_id'];
$param1Value = $_GET['param1']; // Assuming you have a form field with the name 'param1'

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Decrypt values (if they are encrypted)
    $encryptionKey = "your_secret_key"; // This should be kept secure
    $j_idValue = openssl_decrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
    $param1Value = openssl_decrypt($param1Value, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);

    // Generate a timestamp for the current date and time
    $timestamp = date("YmdHis");

    $targetDir = "receipts/";
    $imageFileType = strtolower(pathinfo($_FILES["address"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDir . $timestamp . "_" . basename($_FILES["address"]["name"]);
    $uploadOk = 1;

    
    $allowedTypes = array("jpg", "jpeg", "png", "pdf");
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
        $uploadOk = 0;
    }

    $ver = "pending";

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["address"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO receipts (receipt_address, j_id, p_id, verification) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("siis", $targetFile, $j_idValue, $param1Value, $ver);

            if ($stmt->execute()) {
                // Successfully inserted data
                header("Location: https://uts.com.pk/schedule/");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close the database connection
$conn->close();
?>
