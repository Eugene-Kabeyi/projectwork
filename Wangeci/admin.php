<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if admin is not logged in
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve admin information from the database
$admin_id = $_SESSION['user_id'];
$sql = "SELECT * FROM admin_table WHERE admin_id = $admin_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $admin_data = $result->fetch_assoc();

    // Use admin_data to display admin information
    $_SESSION['admin_id'] = $admin_data["admin_id"];
    $_SESSION['user_email'] = $admin_data["email"];

    // Close the database connection
    $conn->close();
} else {
    echo "Admin data not found.";
}
?>
