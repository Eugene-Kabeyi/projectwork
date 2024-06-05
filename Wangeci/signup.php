<?php
session_start();

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
    $cert_idnumber= $_POST["cert_idnumber"];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $medservice = $_POST['medservice'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //syncing passwords
    if($password !== $confirm_password) {
        echo "passwords don't match <br> $password !== $confirm_password ";
        
    }
    else{
        echo "$first_name <br>";
        echo "$last_name <br>";
    
        // SQL query to insert data into the database
        $sql = "INSERT INTO users (first_name, last_name,cert_idnumber, phone_number, email, gender, date_of_birth, medservice, password, confirm_password) VALUES ('$first_name', '$last_name', '$cert_idnumber', '$phone_number', '$email','$gender', '$date_of_birth', '$medservice', '$password','$confirm_password')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['form_msg'] = "Sign up successful!";
            header("location: login.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
}

// Close the connection
$conn->close();
?>