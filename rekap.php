<?php 
include 'functions.php';
session_start();    
if($_SESSION['userType'] ==  'user'){
    header("Location: index.php");
}
if (isset($_GET['logout'])) {
    logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeartSync</title>
    <link rel="icon" type="image/x-icon" href="assets\img\navbar\logo1.png">
    <link rel="stylesheet" href="assets\style.css">
    <script src="script.js" defer></script>

</head>


<body>
    <div class="page-container">
        <header>
            <ul class="navbar">
                <li><a href="index.php"><img src="assets\img\navbar\logo1.png" class="logo"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about-us">About Us</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#contact-us">Contact Us</a></li>
                <li><a href="talents.php">Talents</a></li>
                <?php 
                if (isset($_SESSION['userType'])) {
                if ($_SESSION['userType'] === 'admin') {
                    echo "<li><a href=\"rekap.php\">Sales</a></li>";
                } elseif ($_SESSION['userType'] === 'user') {
                    echo "<li><a href=\"order.php\">Order</a></li>";
            }
        }?>
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
            </ul>
        </header>
        <div class="transaction-container">
            <h1>Rekapan Penjualan</h1>
            <?php fetchTransaction()?>
        </div>

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
</body>

</html>