<?php
session_start();

// Logout functionality
if (isset($_POST['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: login.html"); // Redirect to login page after logging out
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Prepare SQL query based on user type
    if ($user_type === "user") {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_type = '$user_type'";
    } else if ($user_type === "admin") {
        $sql = "SELECT * FROM admin_table WHERE email = '$email' AND pwd = '$password'";
    } else if ($user_type === "doctor") {
        $sql = "SELECT * FROM doctors WHERE email = '$email' AND password = '$password'";
    } else {
        echo "Invalid user type.";
        exit();
    }

    $result = $conn->query($sql);

    // If a matching record is found
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Set session variables based on user type
        if ($user_type === "user") {
            $_SESSION['user_id'] = $row["user_id"];
        } else if ($user_type === "admin") {
            $_SESSION['user_id'] = $row["admin_id"];
        } else if ($user_type === "doctor") {
            $_SESSION['user_id'] = $row["doctor_id"]; //  column named "doctor_id"
        }

        $_SESSION['user_email'] = $email;
        $_SESSION['user_type'] = $user_type;

        // Redirect to the appropriate dashboard page
        if ($user_type === "user") {
            header("Location: onceloggedin.html");
        } else if ($user_type === "admin") {
            header("Location: admin.html.php");
        } else if ($user_type === "doctor") {
            header("Location: doctorsdashboard.html"); 
        }
        exit();
    } else {
        echo "Invalid credentials. Please try again.";
    }
}

$conn->close();
?>
