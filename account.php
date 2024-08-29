<?php 
include 'functions.php';
session_start();
if (isset($_GET['logout'])) {
    logout();
}
$userData = fetchUser($_SESSION['UserID']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeartSync: Login</title>
    <link rel="icon" type="image/x-icon" href="assets\img\navbar\logo1.png">
    <link rel="stylesheet" href="assets\style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <div class="page-container">
        <header>
            <ul class="navbar">
                <li><a href="index.php"><img src="assets\img\navbar\logo1.png" class="logo"></a></li>
                <ul class="dropdown">
                    <?php if (isset($_SESSION['userType'])) : ?>
                    <li><a href="#" onclick="toggleDropdown()"><img src=" assets\img\navbar\user-solid.svg"
                                class="user-icon" /></a></li>
                    <?php else : ?>
                    <li><a href="login.php"><img src=" assets\img\navbar\user-solid.svg" class="user-icon" /></a></li>
                    <?php endif; ?>
                    <div class="hidden" id="dropdowncontent">
                        <li><a href="account.php">Account</a></li>
                        <li><a href="?logout">Logout</a></li>
                    </div>
                </ul>
            </ul>
        </header>
        <main class="account-container">
            <h1><?php echo ucfirst($_SESSION['username']); ?>'s Account</h1>
            <div class="user-detail-container">
                <h2>Nama</h2>
                <p><?php echo $userData["Name"]?></p>
                <h2>Username</h2>
                <p disabled><?php echo $userData["Username"]?></p>
                <h2>Email</h2>
                <p><?php echo $userData["Email"]?></p>
                <h2>Phone Number</h2>
                <p><?php echo $userData["PhoneNumber"]?></p>
                <a href="setting.php">Ubah Data</a>
            </div>
        </main>
        <footer class="other-page-footer footer-container"><img src="assets\img\navbar\logo1.png" />
            <div class="links-container">
                <div class="first containers">
                    <ul>
                        <li>HeartSync</li>
                        <li><a href="#about-us">About Us</a></li>
                        <li><a href="#contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="second containers">
                    <ul>
                        <li>Support</li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Call Center</a></li>
                    </ul>
                </div>
                <div class="third containers">
                    <ul>
                        <li>Social Media</li>
                        <div class="icons-container">
                            <li><a href="https://www.facebook.com"><img src="assets\img\footer\facebook.png" /></a></li>
                            <li><a href="https://www.instagram.com"><img src="assets\img\footer\instagram.png" /></a>
                            </li>
                            <li><a href="https://www.twitter.com"><img src="assets\img\footer\twitter.png" /></a></li>
                            <li><a href="https://www.whatsapp.com"><img src="assets\img\footer\whatsapp.png" /></a></li>
                        </div>
                    </ul>
                </div>
            </div>
        </footer>
    </div>