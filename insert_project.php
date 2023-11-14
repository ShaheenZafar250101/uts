<?php
 include('reference.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pname = $_POST['pname'];
    $status = $_POST['status'];
    $start = $_POST['sdate'];
    $sector = $_POST['sector'];

    // Handle MOU file upload
    $targetDir = "Project_Documents/MOU/";
    $mouFileName = $pname."_".$_FILES["mou"]["name"];
    $mouFilePath = $targetDir . $mouFileName;
    $mouFileType = strtolower(pathinfo($mouFilePath, PATHINFO_EXTENSION));

    if ($mouFileType != "pdf" && $mouFileType != "doc" && $mouFileType != "docx") {
        echo "Sorry, only PDF, DOC, & DOCX files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["mou"]["tmp_name"], $mouFilePath)) {
            // Handle AD file upload
            $targetDir1 = "Project_Documents/Ads/";
            $adFileName = $pname."_".$_FILES["ad"]["name"];
            $adFilePath = $targetDir1 . $adFileName;
            $adFileType = strtolower(pathinfo($adFilePath, PATHINFO_EXTENSION));

            if ($adFileType != "pdf" && $adFileType != "doc" && $adFileType != "docx" && $adFileType != "png" && $adFileType != "jpg" && $adFileType != "jpeg") {
                echo "Sorry, only Png, JPG, JPEG, PDF, DOC, & DOCX files are allowed.";
            } else {
                if (move_uploaded_file($_FILES["ad"]["tmp_name"], $adFilePath)) {
                    $sql = "INSERT INTO projects (pname, startDate, mou, ad, sector, pstatus)
                            VALUES ('$pname', '$start', '$mouFilePath', '$adFilePath', '$sector', '$status')";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: admin_index.php");
                        exit();
                    } else {
                        echo "Error in retrieving p_id: " . $conn->error;
                    }
                } else {
                    echo "Error uploading AD file.";
                }
            }
        } else {
            echo "Error uploading MOU file.";
        }
    }
} else {
    echo "Files not in Processing: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
