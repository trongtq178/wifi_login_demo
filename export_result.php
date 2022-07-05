<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();

include 'parameters.php';

/*
Checking DB to see if user exists or not.
*/

$host_ip = $_SERVER['HOST_IP'];
$db_user = $_SERVER['DB_USER'];
$db_pass = $_SERVER['DB_PASS'];
$db_name = $_SERVER['DB_NAME'];

$con = mysqli_connect($host_ip, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to SQL: " . mysqli_connect_error();
}

// Filter the excel data 
function filterData(&$str){ 
  $str = preg_replace("/\t/", "\\t", $str); 
  $str = preg_replace("/\r?\n/", "\\n", $str); 
  if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

// Excel file name for download 
$fileName = "users-data_" . date('Y-m-d') . ".xlsx";

// Column names 
$fields = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL', 'LAST UPDATED');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

$startDatetime = $_POST['start_datetime'];
$endDatetime = $_POST['end_datetime'];

// Fetch records from database
if ($startDatetime && $endDatetime) {
  $query = mysqli_query($con, "SELECT * FROM `$table_name` WHERE last_updated BETWEEN '$startDatetime' AND '$endDatetime' ORDER BY id ASC");
} else {
  $query = mysqli_query($con, "SELECT * FROM `$table_name` ORDER BY id ASC");
}

if($query && $query->num_rows > 0){ 
  // Output each row of the data 
  while($row = $query->fetch_assoc()){ 
      $lineData = array($row['id'], $row['firstname'], $row['lastname'], $row['email'], $row['last_updated']); 
      array_walk($lineData, 'filterData'); 
      $excelData .= implode("\t", array_values($lineData)) . "\n"; 
  } 
}

// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 

// Render excel data 
echo $excelData;

mysqli_close($con);
?>