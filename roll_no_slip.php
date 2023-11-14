<?php

require __DIR__.'/vendor/autoload.php';
 include('reference.php');

// Check if 'status' is set and not empty
if (!isset($_GET['cnic']) || empty($_GET['cnic'])) {
    echo "<script>alert('Redirecting back...');
    history.back();</script>";
    exit;
}

// Values to bind
$cnic = $_GET['cnic'];
$j_id = $_GET['job_id']; // Assuming j_id is an integer, remove quotes if it's a number
$post_name = '';
$project_id = '';
$scale = '';

$stmt = $conn->prepare("SELECT * FROM personal_details WHERE cnic = ? AND j_id = ?");
$stmt->bind_param("si", $cnic, $j_id);
$stmt->execute();
$result = $stmt->get_result();
$p_id = '';
$name = '';
$fname = '';
$path = '';
$department = '';
$pno = '';
$center = '';
$ex_date = '';
$ex_time = '';

if ($result) {
    // Check if the query was successful
    if ($result->num_rows > 0) {

        $sql = "SELECT * FROM jobs where j_id = $j_id";
        $result2 = $conn->query($sql);
    
        if ($result2->num_rows > 0) {
            while ($row3 = $result2->fetch_assoc()) {
                $post_name = $row3['j_name'];
                $scale = $row3['scale'];
                $project_id = $row3['project_id'];
            }
    }

        $row = $result->fetch_assoc();
        $p_id = $row['p_id'];
        $name = $row['cname'];
        $fname = $row['fname'];
        $path = $row['imageadress'];
        $pno = $row['pno'];
        $center = $row['tcenter'];

        $stmt1 = $conn->prepare("SELECT * FROM projects WHERE project_id = ?");
        $stmt1->bind_param("i", $project_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        if ($result1) {
            // Check if the query was successful
            if ($result1->num_rows > 0) {
                $row1 = $result1->fetch_assoc(); // Corrected variable name from $result to $result1
                $department = $row1['pname']; // Assuming 'pname' is the correct column name
            } else {
                echo 'Project Not Found';
            }
        } else {
            echo 'Error executing the query: ' . $stmt1->error; // Provide error message for unsuccessful query execution
        }

        $stmt1->close(); // Close the prepared statement after use

        $centervise = "%" . $center . "%";
        $sql1 = "SELECT * FROM exams WHERE project_id = '$project_id' AND j_name = '$post_name' AND job_scale = '$scale' AND center LIKE '$centervise'";
        $result4 = $conn->query($sql1);

        if ($result4->num_rows > 0) {
            while ($row4 = $result4->fetch_assoc()) { // Changed $result2 to $result4
                $ex_date = $row4['ex_date']; // Changed $row4['ex_date'] from $row4['ex_date']
                $ex_time = $row4['ex_time']; // Changed $row3['ex_time'] to $row4['ex_time']
            }
        }


    } else {
                echo "no record found";
        }
            $stmt->close();
        }

use Mpdf\Mpdf;

// HTML content
$html = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwym/pieZLeiQ5z7xsa8o8FLQ8to8x+Kg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="result_style.css">
<style>
    .heading{
        font-size:16px;
        font-weight:bold;
        text-align:center;
        margin-top:5px;
    }
    .border-column {
        border: 1px solid black; /* You can customize border style, color, and width */
        text-align:center;
        font-size:12px;
    }

    .bordered-column {
        text-align:center;
        font-size:16px;
        font-weight:bold;
    }

    .bordered-para {
        text-align:center;
        font-size:12px;
        font-weight:normal;
    }

    .department {
        text-align:center;
        font-size:12px;
        font-weight:bold;
    }

    .details {
        text-align:left;
        font-size:14px;
    }
    .head{
        font-weight:bold;
    }

    img{
        height:50px;
        width:200px;
        margin-right:50px;
    }
    
    .container {
        display: flex;
    }
    
    .content {
        flex: 1; /* Take remaining space */
        padding: 10px; /* Add some padding for spacing */
    }
    
    .image {
        flex: 0; 
        height: 120px;
        width: 120px;
        float:right;
        margin-left:250px;
        margin-right:-40px;
    }

    .padding_new{
    padding_right:100px;
    }

    .signature{
        text-align:right;
        font-size:12px;
    }
    .sign{
        height:90px;
        width:90px;
    }
    .instructions{
        font-size:12px;
    }
    </style>
    <title>Roll No Slip</title>
</head>

<body>
    <div>
    <header>
    <table>
           
            <tbody>
                <tr>
                    
                    <td ><img src="images/uts_logo.png" colspan=2></td>
                    <td></td>
                    <td class="bordered-column" colspan=4><strong>Universal Testing Services</strong><br><p class="bordered-para">Phone: 051-111-258-369   Email: info@uts.com.pk<br>Website: <a href="https://uts.com.pk/">www.uts.com.pk</a></p></td>
                <td></td>

                <td></td>
                <td></td>
                </tr>
            </tbody>
        </table>
    </header>

    <hr>

        <div class="">
            <h1 class="heading">Roll No Slip</h1>
            <p class="department">'.$department.'</p>
        </div>
        
        <table class="">
           
            <tbody>
                <tr class="">
                    
                    <td class="padding_new"><p class="details"><span class="head">CNIC No:</span> '.$cnic.'</p>
                    <p class="details"><span class="head">Name:</span>'.$name.'</p>
                    <p class="details"><span class="head">Father/Guardian Name:</span> '.$fname.'</p></td>
                    <td></td>
                    <td  colspan=5><img class="image" src="'.$path.'" alt="Profile Picture"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
        </table>
       
        <table class="border-column mt-4">
            <thead>
                <tr>
                   
                    <th class="border-column">Roll No</th>
                    <th class="border-column">Post Name</th>
                    <th class="border-column">Reporting Date & Time</th>
                    <th class="border-column">Test Start Time</th>
                    <th class="border-column" colspan=3>Test Center</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-column">
                    
                    <td class="border-column">'.$p_id.'</td>
                    <td class="border-column">'.$post_name.$scale.'</td>
                    <td class="border-column">'.$ex_date.', '.$ex_time.'</td>
                    <td class="border-column">'.$ex_time.'</td>
                    <td class="">'.$center.'</td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
        </table>
        <div class="instructions">
        <h1 class="heading">Instructions</h1>
            <ol>
                <li>You are required to bring this Roll No Slip along with your original Identity Card for identification. No other identification documents like Passport, Driving License, and Original Degrees are acceptable for identification, only original CNIC is acceptable with Roll No Slip.</li>
                <li>Candidates who applied more than one for the same post (regular & contract) will have a single paper (Except Statistical Assistant SR.(01,19,28)).</li>
                <li>APPLICANT WILL NOT BE ALLOWED TO ENTER THE TEST CENTER PREMISES AFTER THE TEST STARTING TIME.</li>
                <li>You are also required to bring a Clipboard and ball pen/Marker (Black or Blue) with you. Clipboard should be clean without any writing. No paper for rough work is allowed.</li>
                <li>Mobile Phone/Calculator or any other electronic device and wearable is not allowed. Please leave it outside the test center.</li>
                <li>Center Management is not responsible for keeping student’s belongings/valuables. No ladies handbags are allowed in the center.</li>
                <li>Any kind of weapon is strictly prohibited in the Examination Hall.</li>
                <li>This is a provisional test subject to verification of your original documents, any discrepancy found later at any stage you will be disqualified.</li>
                <li>Applicant should Reach the Test Center Half an Hour Before Reporting time.</li>
                <li>Candidates cannot leave the Examination Hall before Completion of Half Time of the Test.</li>
                <li>Candidate who is found Either copying or receiving Assistance from others will be Disqualified.</li>
                <li>Keep visiting UTS website <a href="http://www.uts.com.pk">www.uts.com.pk</a> for further information and test result.</li>
                </ol>
        </div>
        
    </div>
    <div class="signature">
    <img src="images/signature.PNG" class="sign" >
    <p>Manager Operation</p>
    </div>
    <div class="instructions">
    <p>
    <span class="head">To,</span><br>
<span class="head">Name:</span> '.$name.'<br><span class="head">Guardian/Father Name:</span> '.$fname.'<br>
<span class="head">CNIC No:</span> '.$cnic.'<br><span class="head">Mobile :</span> '.$pno.'

    </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-KdAjZf+m+6WXJ6m8Wp0j0WN0lkGnJz7Lb5cbz8NPB9+0x1jXn0iFowXnjk9l5Pnp" crossorigin="anonymous"></script>
</body>

</html>

';

// Create an instance of mPDF
$mpdf = new Mpdf();

// Load HTML content into mPDF
$mpdf->WriteHTML($html);

// Output the PDF
$mpdf->Output();
