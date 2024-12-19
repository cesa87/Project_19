<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli("localhost", "crynk", "Blazer4053", "crynk");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashed_password);

if ($stmt->execute()) {
    echo "Account created successfully. <a href='index.html'>Login</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
