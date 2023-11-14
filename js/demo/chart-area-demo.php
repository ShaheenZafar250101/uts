// Set new default font family and font color to mimic Bootstrap's default styling
<script>
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// PHP code for fetching data from the database
<?php
//  include('connection.php');
   include('/home/utscjnhd/connection.php');

 // Query to retrieve data from personal_details table
$sql = "SELECT DATE_FORMAT(created_at, '%b') AS month, COUNT(p_id) AS total_earnings
        FROM personal_details
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 YEAR)
        GROUP BY month
        ORDER BY created_at ASC";

$result = $conn->query($sql);

// Initialize arrays to store chart data
$labels = array();
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Push data into arrays
        $labels[] = $row['month'];
        $data[] = $row['total_earnings'];
    }
}

// Close the database connection
$conn->close();

// Prepare the data for JavaScript
$chartData = array(
    "labels" => $labels,
    "data" => $data,
);

// Convert the PHP array to JSON for JavaScript
$chartDataJSON = json_encode($chartData);
?>

// Use the $chartDataJSON variable to populate the chart data in JavaScript
var chartData = <?php echo $chartDataJSON; ?>;

// Create the chart using Chart.js
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartData.labels,
        datasets: [{
            label: "Earnings",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: chartData.data,
        }],
    },
    options: {
maintainAspectRatio: false,
layout: {
padding: {
left: 10,
right: 25,
top: 25,
bottom: 0
}
},
scales: {
xAxes: [{
time: {
  unit: 'date'
},
gridLines: {
  display: false,
  drawBorder: false
},
ticks: {
  maxTicksLimit: 7
}
}],
yAxes: [{
ticks: {
  maxTicksLimit: 5,
  padding: 10,
  // Include a dollar sign in the ticks
  callback: function(value, index, values) {
    return '$' + number_format(value);
  }
},
gridLines: {
  color: "rgb(234, 236, 244)",
  zeroLineColor: "rgb(234, 236, 244)",
  drawBorder: false,
  borderDash: [2],
  zeroLineBorderDash: [2]
}
}],
},
legend: {
display: false
},
tooltips: {
backgroundColor: "rgb(255,255,255)",
bodyFontColor: "#858796",
titleMarginBottom: 10,
titleFontColor: '#6e707e',
titleFontSize: 14,
borderColor: '#dddfeb',
borderWidth: 1,
xPadding: 15,
yPadding: 15,
displayColors: false,
intersect: false,
mode: 'index',
caretPadding: 10,
callbacks: {
label: function(tooltipItem, chart) {
  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
  return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
}
}
}
}
});

</script>