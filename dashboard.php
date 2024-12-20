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
    <title>CRYNK - Crypto Payment Gateway POC</title>
    <link rel="stylesheet" href="dashboard-styles.css">
</head>
<body>
    <div id="loginContainer">
        <button id="loginButton">Login</button>
    </div>
    <div id="walletSelection" style="display:none;">
        <button id="connectMetaMask">Connect MetaMask</button>
    </div>
    <div id="walletInfo" style="display:none;">
        <h2>Wallet Information</h2>
        <p id="walletAddress"></p>
        <p id="walletBalance"></p>
        <button id="demoTransaction">Demo Transaction</button>
    </div>
    <script src="app.js"></script>
</body>
</html>
