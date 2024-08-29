<?php 
include 'functions.php';
session_start();
if(!$_SESSION['userType']){
    header("Location: login.php");
}
if($_SESSION['userType'] ==  'admin'){
    header("Location: rekap.php");
}
if (isset($_GET['logout'])) {
    logout();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION['UserID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $jasa = $_POST['jasa'];
    $durasi = $_POST['durasi'];
    $note = $_POST['note'];
    $price = $_POST['price'];
    
    if (createOrder($userID, $name, $email, $whatsapp, $jasa, $durasi, $price, $note)) {
        header("Location: index.php");
        exit();
    } else {
        $error;
    }
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
        <div class="order-form-container">
            <h1>Form Pemesanan Jasa HeartSync</h1>
            <h2>Silakan Masukkan Data Diri Anda</h2>
            <form method="post">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Ketik nama kamu..." required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Ketik e-mail kamu..." required>

                <label for="whatsapp">Whatsapp</label>
                <input type="text" id="whatsapp" name="whatsapp" placeholder="Ketik nomor whatsapp kamu..."
                    required></input>
                <label for="jasa">Jasa</label>
                <select type="text" id="jasa" name="jasa" required onchange="calculateTotalPayment()">
                    <option value="0">Pilih jasa yang ingin kamu sewa....</option>
                    <?php echo fetchServices();?>

                </select>
                <label for="durasi">Durasi</label>
                <select type="text" id="durasi" name="durasi" required onchange="calculateTotalPayment()">
                    <option value="0">Pilih lamanya durasi sewa....</option>
                    <option value="1">1 Jam</option>
                    <option value="2">2 jam</option>
                    <option value="3">3 jam</option>
                    <option value="4">4 jam</option>
                    <option value="5">5 jam</option>
                    <option value="6">6 jam</option>
                </select>
                <label for="note">Note</label>
                <textarea name="note" placeholder="Silakan masukkan note jika ada..."></textarea>
                <h2 id="total-payment">Total Pembayaran: Rp. 0.000</h2>
                <input type="hidden" id="total-price" name="price" value="0.000" />
                <button type="submit">Order</button>
            </form>
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
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const passedId = <?php echo $_GET['service']; ?>;
        const jasaDropdown = document.getElementById('jasa');
        jasaDropdown.value = passedId;
    });
    </script>
</body>

</html>