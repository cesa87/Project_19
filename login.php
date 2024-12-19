<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli("your_host", "your_username", "your_password", "your_dbname");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password. <a href='index.html'>Try again</a>";
    }
} else {
    echo "Invalid username or password. <a href='index.html'>Try again</a>";
}

$stmt->close();
$conn->close();
?>