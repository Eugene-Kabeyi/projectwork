<?php
//To check if the Doctor is logged in 
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'doctor') {
    header("Location: login.html"); // Redirect to login page if doctor is not logged in
    exit();
}


// Check if session is not already active
if (!isset($_SESSION)) {
    session_start();
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your HTML form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the HTML form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $cert_idnumber = $_POST["cert_idnumber"];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Sync passwords
    if ($password !== $confirm_password) {
        echo "Passwords don't match";
    } else {
        // SQL query to insert data into the database
        $sql = "INSERT INTO doctors (first_name, last_name, cert_idnumber, phone_number, email, gender, date_of_birth, password) VALUES ('$first_name', '$last_name', '$cert_idnumber', '$phone_number', '$email', '$gender', '$date_of_birth', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Set session variables
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['email'] = $email;
            // Redirect to login page after successful signup
            header("location: login.html");
            exit(); // Ensure that script execution stops after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$id = $_SESSION['id'] ?? null; // Use null coalescing operator to handle undefined session variable
if ($id) {
    $sql = "SELECT * FROM doctors WHERE id = '$id'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Doctor's information found, fetch and assign to variables
    $row = $result->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $cert_idnumber = $row["cert_idnumber"];
    $phone_number = $row["phone_number"];
    $email = $row["email"];
    $gender = $row["gender"];
    $date_of_birth = $row["date_of_birth"];
    // Add other fields as needed
} else {
    echo "Doctor's information not found";
}
}