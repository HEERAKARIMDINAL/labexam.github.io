<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "heerakarim"; // Replace with your database name

// Create connection
$conn = new mysqli('localhost','root','','heerakarim');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, gender, email, address FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='px-6 py-2'>" . $row['name'] . "</td>";
        echo "<td class='px-6 py-2'>" . $row['gender'] . "</td>";
        echo "<td class='px-6 py-2'>" . $row['email'] . "</td>";
        echo "<td class='px-6 py-2'>" . $row['address'] . "</td>";
        echo "<td class='px-6 py-2'>";
        echo "<button class='px-4 py-2 bg-indigo-500 text-white rounded-lg' onclick='editRecord(" . $row['id'] . ")'>Edit</button>";
        echo "<button class='px-4 py-2 bg-red-500 text-white rounded-lg ml-2' onclick='deleteRecord(" . $row['id'] . ")'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
}

$conn->close();
?>
