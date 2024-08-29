<?php 
include 'functions.php';
session_start();
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
    <div class="index-container page-container">
        <header>
            <ul class="navbar">
                <li><a href="#"><img src="assets\img\navbar\logo1.png" class="logo"></a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
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
                        <li><a href="index.php?logout">Logout</a></li>
                    </div>
                </ul>

            </ul>
        </header>
        <div class="card-block-container" id="about-us">
            <div class="cta-container">
                <h1>HeartSync: Temukan Koneksi yang Membuat Setiap Detik Berarti!<br /><br />

                    Jadikan setiap momen berharga dan temukan koneksi baru yang bermakna bersama HeartSync!</h1>
                <a class="cta-button" href="#contact-us">Contact Us</a>
            </div>
            <img src="https://dummyimage.com/400x300/c9c9c9/000000&text=Placeholder" class="cta-image">
        </div>
        <div class="why-us">
            <h1>Kenapa HeartSync?</h1>
            <div class="card-container">
                <div class="card">
                    <h2>Privacy</h2>
                    <img src="assets\img\cards\privacy.png" class="secure" />
                    <p>HeartSync menjamin seluruh keamanan data dari seluruh pelanggan kami!</p>
                </div>
                <div class="card">
                    <h2>Flexible</h2>
                    <img src="assets\img\cards\flexibility.png" class="flexible" />
                    <p>Kami memiliki fleksibilitas waktu di mana kami menyesuaikan dengan waktu sewa anda.</p>
                </div>
                <div class="card">
                    <h2>Professional</h2>
                    <img src="assets\img\cards\professional.png" class="professional" />
                    <p>Kami menjamin profesionalitas dari talent kami untuk menjalin hubungan yang
                        profesional antar client dengan talent</p>
                </div>
                <div class="card">
                    <h2>Proactive</h2>
                    <img src="assets\img\cards\proactive.png" class="proactive" />
                    <p>Talent telah kami latih untuk menjadi lebih proaktif dalam berkomunikasi! Tentu saja hal ini
                        dapat disesuaikan dengan request client</p>
                </div>

            </div>
        </div>
        <div class="services" id="services">
            <h1>LAYANAN KHUSUS DARI KAMI</h1>
            <div class="service-card-container">
                <div class="service-card">
                    <h1>Sleep Call</h1>
                    <div class="service-description">
                        <h2>Kamu susah tidur?<br /> Yuk gunakan talent HeartSync untuk menemani kamu di malam hari
                            sampai
                            kamu
                            terlelap.</h2>
                    </div>
                    <button class="order-now" id="sleepcall" onclick="orderRedirect()">Order
                        Now!</button>
                    <p>Mulai dari Rp. 10.000/jam</p>
                </div>
                <div class="service-card">
                    <h1>Virtual Partner</h1>
                    <div class="service-description">
                        <h2>Kamu merindukan adanya seseorang yang peduli denganmu?<br /><br />
                            Kamu rindu hangatnya percakapan? Kamu rindu dengan ada seseorang yang memperhatikanmu tapi
                            belum
                            ingin untuk memulai hubungan baru?<br /><br />
                            Kami lah solusi yang tepat untukmu!</h2>
                    </div>
                    <button class="order-now" id="vp" onclick="orderRedirect()">Order Now!</button>
                    <p>Mulai dari Rp. 25.000/jam</p>
                </div>
                <div class=" service-card">
                    <h1>Curhat/Call</h1>
                    <div class="service-description">
                        <h2>Ada perasaan yang ingin kamu ungkapkan tapi ga tau mau cerita ke siapa?
                            Yuk gunakan jasa curhat kami!</h2>
                    </div>
                    <button class="order-now" id="curhat" onclick="orderRedirect()">Order Now!</button>
                    <p>Mulai dari Rp. 10.000/jam</p>
                </div>
                <div class="service-card">
                    <h1>Date</h1>
                    <div class="service-description">
                        <h2>Pingin jalan-jalan ke tempat baru, atau kamu ingin jalan-jalan ke tempat date rekomendasi
                            tiktok
                            tapi gatau mau pergi sama siapa?<br />
                            Yuk gunakan jasa Date dari HeartSync!</h2>
                    </div>
                    <button class="order-now" id="date" onclick="orderRedirect()">Order Now!</button>
                    <p>Mulai dari Rp. 70.000/jam</p>
                </div>
                <div class="service-card">
                    <h1>Daily Reminder</h1>
                    <div class="service-description">
                        <h2>Kamu orang yang pelupa?<br />
                            Atau kamu ingin ada orang yang perhatian sama kamu?<br />
                            Yuk pesan jasa Daily Reminder untuk dapetin pengingat untuk setiap kegiatan yang kamu
                            lakukan!
                    </div>
                    </h2>
                    <button class="order-now" id="reminder" onclick="orderRedirect()">Order Now!</button>
                    <p>Mulai dari Rp. 3.000/jam</p>
                </div>
            </div>
        </div>
        <div class="contact-us" id="contact-us">
            <h1>Tertarik Dengan Jasa Kami?</h1>
            <form class="form">
                <label for="name">Nama </label><input type="text" class="name" placeholder="Ketik nama kamu...."
                    required />
                <label for="e-mail">E-mail </label><input type="text" class="e-mail" placeholder="Ketik e-mail kamu...."
                    required />
                <label for="whatsapp">Whatsapp </label><input type="text" class="whatsapp"
                    placeholder="Ketik nomor whatsapp kamu...." required />
                <button onclick="submitContact(event)">Contact Us</button>
            </form>
        </div>
        <footer class="footer-container"><img src="assets\img\navbar\logo1.png" />
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
</body>

</html>