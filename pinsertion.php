<?php
 include('reference.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $j_idValue = $_GET['j_id'];
    $encryptionKey = "your_secret_key"; // This should be kept secure
    $j_idValue = openssl_decrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);

    $timestamp = date("YmdHis");

    $targetDir = "uploads/";
    $targetFile = $targetDir .$timestamp. basename($_FILES["cimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["cimage"]["tmp_name"]);
    if ($check === false) {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    $cname = $_POST["cname"];
    $fname = $_POST["fname"];
    $cnic = $_POST["cnic"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $disability = $_POST["disability"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $domicile = $_POST["domicile"];
    $pno = $_POST["pno"];
    $mno = $_POST["mno"];
    $religion = $_POST["religion"];
    $service = $_POST["service"];
    $retired = $_POST["retired"];
    $tcenter = $_POST["tcenter"];

    if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO personal_details (cname, fname, cnic, gender, dob, email, disability, address, city, district, domicile, pno, mno, religion, service, retired, tcenter, imageadress, j_id)
                VALUES ('$cname', '$fname', '$cnic', '$gender', '$dob', '$email', '$disability', '$address', '$city', '$district', '$domicile', '$pno', '$mno', '$religion', '$service', '$retired', '$tcenter', '$targetFile', '$j_idValue')";
        
        // Check if CNIC is already registered
        $cnicCheckQuery = "SELECT COUNT(*) AS count FROM personal_details WHERE cnic = '$cnic'";
        $cnicResult = $conn->query($cnicCheckQuery);
        $cnicRow = $cnicResult->fetch_assoc();
        $cnicCount = $cnicRow['count'];

        if ($cnicCount > 0) {
            $j_idValue = openssl_encrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
            echo '<script>alert("This CNIC is already registered.");';
            echo "window.location.href='personal_details.php?j_id=$j_idValue';";
            echo '</script>';
        } else {
            if ($conn->query($sql) === TRUE) {
                $getid = "SELECT p_id FROM personal_details WHERE cnic = '$cnic'";
                $idResult = $conn->query($getid);
                $encryptionKey = "your_secret_key"; // This should be kept secure
                if ($idResult) {
                    $idRow = $idResult->fetch_assoc();
                    if ($idRow) {
                        $p_id = $idRow['p_id'];
                        $encryptedData = openssl_encrypt($p_id, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
                        $j_idValue = openssl_encrypt($j_idValue, 'AES-256-CBC', $encryptionKey, 0, $encryptionKey);
                        // Redirect with the correct parameter
                        header("Location: qualification_details.php?j_id=" . urlencode($j_idValue) . "&param1=" . urlencode($encryptedData));
                        exit();
                    } else {
                        echo "No matching row found in personal_details table.";
                    }
                } else {
                    echo "Error in retrieving p_id: " . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
