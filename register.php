<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    if (registerUser($name,$username, $password, $email, $phoneNumber)) {
        session_start();
        $_SESSION['Username'] = $username;
        $_SESSION['UserType'] = $usertype;
        header("Location: index.php");
        exit();
    } else {
        header("Location: register.php?error=Registration failed");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeartSync: Registration</title>
    <link rel="icon" type="image/x-icon" href="assets\img\navbar\logo1.png">
    <link rel="stylesheet" href="assets\style.css">
</head>
<div class="page-container">
    <header>
        <ul class="navbar">
            <li><a href="index.php"><img src="assets\img\navbar\logo1.png" class="logo"></a></li>
            <li><a href="login.php"><img src="assets\img\navbar\user-solid.svg" class="user-icon" /></a></li>
        </ul>
    </header>
    <main class="register-container">
        <h1>Pendaftaran Akun Baru</h1>
        <form method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phoneNumber">Phone Number</label>
            <input type="text" id="phoneNumber" name="phoneNumber">

            <button type="submit">Register</button>
        </form>
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
                        <li><a href="www.facebook.com"><img src="assets\img\footer\facebook.png" /></a></li>
                        <li><a href="www.instagram.com"><img src="assets\img\footer\instagram.png" /></a></li>
                        <li><a href="www.twitter.com"><img src="assets\img\footer\twitter.png" /></a></li>
                        <li><a href="www.whatsapp.com"><img src="assets\img\footer\whatsapp.png" /></a></li>
                    </div>
                </ul>
            </div>
        </div>
    </footer>
</div>