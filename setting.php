<?php 
include 'functions.php';
session_start();


if (isset($_GET['logout'])) {
    logout();
}
$userData = fetchUser($_SESSION['UserID']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserID = $_SESSION['UserID'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phonenumber'];
        
        if (updateUser($UserID, $name, $email, $phoneNumber)) {
            echo "<script type='text/javascript'>alert('Update Success!');</script>"; 
            header("Location:account.php");
        }} elseif (isset($_POST['delete'])) {
        if (deleteUser($UserID)) {
            session_destroy();
            header("Location:index.php");
        }
    }
}

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
            <form method="post" class="user-detail-container">
                <label for="name">Nama</label>
                <input type="text" name="name" value="<?php echo $userData['Name']; ?>" />
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $userData['Username']; ?>" disabled />
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo $userData['Email']; ?>" />
                <label for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" value="<?php echo $userData['PhoneNumber']; ?>" />
                <div class="button-container">
                    <button type="submit" name="update">Ubah Data</button>
                    <button type="submit" name="delete">Hapus Akun</button>
                </div>
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