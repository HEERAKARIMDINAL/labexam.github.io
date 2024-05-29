<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yourname_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE register SET name='$name', gender='$gender', email='$email', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    header("Location: record.html");
} else {
    $sql = "SELECT * FROM register WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        echo "Record not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link
    href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
    rel="stylesheet"
  />
  <title>Edit Student Record</title>
</head>
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
  <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1 mt-8">
    <div class="p-6 sm:p-12">
      <div class="w-full">
        <h1 class="text-2xl xl:text-3xl font-extrabold">Edit Student Record</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="mt-8">
          <input
            name="name"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="text"
            placeholder="Name"
            value="<?php echo htmlspecialchars($record['name']); ?>"
            required
          />
          <input
            name="gender"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
            type="text"
            placeholder="Gender"
            value="<?php echo htmlspecialchars($record['gender']); ?>"
            required
          />
          <input
            name="email"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
            type="email"
            placeholder="Email"
            value="<?php echo htmlspecialchars($record['email']); ?>"
            required
          />
          <input
            name="address"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
            type="text"
            placeholder="Address"
            value="<?php echo htmlspecialchars($record['address']); ?>"
            required
          />
          <button
            class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
            type="submit"
          >
            <svg
              class="w-6 h-6 -ml-2"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
              <circle cx="8.5" cy="7" r="4" />
              <path d="M20 8v6M23 11h-6" />
            </svg>
            <span class="ml-3">Update</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
