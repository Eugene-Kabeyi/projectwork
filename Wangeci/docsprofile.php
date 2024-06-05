<?php
session_start();

// Check if email and password are submitted via POST
if(isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database credentials
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "hospital";

    // Create a connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement using prepared statement to prevent SQL injection
    $sql = "SELECT * FROM doctors WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Doctor is authenticated, store email in session and regenerate session ID
        $_SESSION['email'] = $email;
        session_regenerate_id();

        // Retrieve data and store it in variables
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $cert_idnumber = $row['cert_idnumber'];
        $phone_number = $row['phone_number'];
        $email = $row['email'];
        $gender = $row['gender'];
        $date_of_birth = $row['date_of_birth'];

        // Redirect to profile page or display profile information here
        // Example: header("Location: profile.php");
    } else {
        // Authentication failed
        echo "Invalid email or password";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If email or password are not submitted via POST
    echo "Email or password not provided";
}
?>
