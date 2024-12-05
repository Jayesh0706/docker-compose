<?php
// Database connection details
$servername = "db";
$username = "root";
$password = "pass1234";
$database = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "<h1>Registration Successful</h1>";
        echo "<p>Thank you, $name! Your registration is complete.</p>";
    } else {
        echo "<h1>Registration Failed</h1>";
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

