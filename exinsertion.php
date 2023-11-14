<?php

 include('reference.php');

// Assuming the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $organization = $_POST['organization'];
    $jobTitle = $_POST['jtitle'];
    $fromDate = $_POST['fdate'];
    $toDate = $_POST['tdate'];
    $totalExperience = $_POST['ytotal'];
    $param1Value = $_GET['param1'];
    $j_idValue = $_GET['j_id'];
    $encryptionKey = "your_secret_key"; // This should be kept secure
    $param1Value = openssl_decrypt($param1Value, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
    $j_idValue = openssl_decrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);


    // Prepare and execute the SQL query
    $sql = "INSERT INTO experience_details (organization, job_title, from_date, to_date, total_experience,p_id,j_id)
            VALUES ('$organization', '$jobTitle', '$fromDate', '$toDate', '$totalExperience',$param1Value,'$j_idValue')";

if ($conn->query($sql) === TRUE) {
    $param1Value = openssl_encrypt($param1Value, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
    $j_idValue = openssl_encrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
    echo "<script>
        window.open('fee_slip.php', '_blank');
        window.location.href = 'fee_receipt.php?j_id=".urlencode($j_idValue)."&param1=".$param1Value."';
    </script>";
    exit();
}
 else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
