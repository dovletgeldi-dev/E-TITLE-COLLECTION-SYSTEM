<?php
$servername = "localhost";
$username = "Username";
$password = "Password";
$dbname = "etcs_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the values from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Insert the values into the database
$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
