<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli('localhost','root','','register');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$gender = $data['gender'];
$email = $data['email'];
$address = $data['address'];

$sql = "INSERT INTO register (name, gender, email, address) VALUES ('$name', '$gender', '$email', '$address')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
