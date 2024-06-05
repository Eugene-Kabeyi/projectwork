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

// Retrieve all appointments
$sql = "SELECT * FROM appointments"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output table with centered content and a title
    echo "<h1 style='text-align: center;'>PATIENT APPOINTMENTS</h1>";
    echo "<table border='1' align='center'>";
    echo "<tr><th>Name</th><th>Date</th><th>Time</th><th>Reason for Visit</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["reason"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<h1 style='text-align: center;'>PATIENT APPOINTMENTS</h1>";
    echo "No appointments found.";
}

// Close connection
$conn->close();
?>
