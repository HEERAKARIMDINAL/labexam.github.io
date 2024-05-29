<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli('localhost','root','','register');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, gender, email, address FROM register";
$result = $conn->query($sql);

$records = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $records[] = $row;
  }
} else {
  echo "0 results";
}

echo json_encode($records);

$conn->close();
?>
