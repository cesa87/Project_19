<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYNK Dashboard</title>
    <style>
        .card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 200px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to CRYNK Dashboard</h1>
    <div class="dashboard">
        <div class="card">Connect Wallet</div>
        <div class="card">Transaction History</div>
        <div class="card">Settings</div>
    </div>
</body>
</html>
