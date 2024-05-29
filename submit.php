<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "heerakarim"; // Replace with your database name

// Create connection
$conn = new mysqli('localhost','root','','heerakarim');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO register (name, gender, email, address) VALUES ('$name', '$gender', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: record.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
