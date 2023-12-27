<?php
include "../koneksi.php";

// Mengambil nama game dari URL
$nama_game = $_GET["game"];

// Mengambil data sesuai dengan game di URL nya
$query = "SELECT * FROM game WHERE nama_game = '$nama_game'";
$cekData = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($cekData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nama_game ?></title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <header>
        <div class="nav">
            <a href="index.html" class="logo">
                Chatter<span>Box</span>
            </a>
            <div class="navbar">
                <li><a href="game.php#home" class="nav-link">Beranda</a></li>
                <li><a href="game.php#game" class="nav-link">Games</a></li>
                <li><a href="game.php#faqs" class="nav-link">FAQ</a></li>
                <li><a href="../logout.php" class="nav-link">LOGOUT</a></li>
            </div>
        </div>
    </header>
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="home-slide">
                    <img src="../assets/img/detail_game/<?= $data["gambar_detail"] ?>" alt="" class="slide-img">
                    <div class="home-overlay"></div>
                    <div class="home-text container">
                        <h1 class="slide-title"><?= $data["nama_game"] ?></h1>
                        <p class="slide-description"><?= $data["nama_perusahaan"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form-buy" id="form">
        <form action="transaksi.php" method="POST">
            <div class="payment-step-container">
                <div class="title-text">
                    <div class="step-circle">1</div>
                    <h2>Masukkan Email Chatterbox Anda</h2>
                </div>
                <div class="input-email">
                    <div class="input-email">
                        <div class="input-group-prepend">
                            <div class="icon">
                                <span class="icon-email"></span>
                            </div>
                        </div>
                        <input class="form-email" placeholder="ChatterBox Email" required name="email" type="email">
                    </div>
                    <small class="step-input-description">
                        Silakan isi alamat email ChatterBox Anda.
                    </small>
                </div>
            </div>
            <div class="payment-step-container">
                <div class="title-text">
                    <div class="step-circle">2</div>
                    <h2>Masukkan ID Game Pengguna Anda</h2>
                </div>
                <div class="input-email">
                    <div class="input-email">
                        <div class="input-group-prepend">
                            <div class="icon">
                                <span class="icon-email"></span>
                            </div>
                        </div>
                        <input class="form-email" placeholder="User ID Game" required name="user_game_id" type="number">
                    </div>
                    <small class="step-input-description">
                        Silahkan isi user ID game anda.
                    </small>
                </div>
            </div>
            <div class="payment-step-container">
                <div class="title-text">
                    <div class="step-circle">3</div>
                    <h2>Pilih Nominal yang Ingin Anda Beli</h2>
                </div>

                <div class="input-email">
                    <div class="input-email">
                        <div class="input-group-prepend">
                            <div class="icon">
                                <span class="icon-email"></span>
                            </div>
                        </div>
                        <select name="id_produk" class="form-email">
                            <?php
                            $id_game = $data["id_game"];

                            // Mengambil semua produk berdasarkan id game
                            $queryProduk = "SELECT * FROM produk WHERE id_game = $id_game AND jumlah_produk > 0";
                            $cekDataProduk = mysqli_query($koneksi, $queryProduk);
                            while ($dataProduk = mysqli_fetch_array($cekDataProduk)) {
                            ?>
                            <option value="<?= $dataProduk['id_produk'] ?>"><?= $dataProduk["nama_produk"] ?> -
                                Rp<?= number_format($dataProduk["harga_produk"], 0, ",", ".") ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <small class="step-input-description">
                        Silahkan pilih produk game yang ingin anda beli.
                    </small>
                </div>
            </div>
            <button class="Checkout-button" data-id="2342">
                konfirmasi
            </button>
        </form>
    </section>
    <section class="control" id="control">
        <div class="control-content container">
            <div class="control-text">
                <h2 class="control-title">Mengapa dengan ChatterBox??</h2>
                <div class="control-spec">
                    <div class="spec=box">
                        <i class='bx bxs-check-circle'></i>
                        <span>Top up dengan Chatterbox untuk transaksi secepat kilat.</span>
                    </div>
                    <div class="spec=box">
                        <i class='bx bxs-check-circle'></i>
                        <span>Tingkatkan pengalaman bermain game Anda dengan promosi eksklusif Chatterbox.</span>
                    </div>
                    <div class="spec=box">
                        <i class='bx bxs-check-circle'></i>
                        <span>Pilih Chatterbox untuk top up tanpa repot.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer container background">
        <div class="footer-box">ChatterBox</a>
            <div class="social">
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-facebook-square'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
            </div>
        </div>
        <div class="footer-box">
            <h2 class="footer-title">Sitemap</h2>
            <a href="index.html">Beranda</a>
            <a href="index.html">Games</a>
            <a href="index.html">Faq</a>
        </div>
    </div>

    <div class="copyright container">
        <p>&#169; ChatterBox 2023</p>
    </div>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap');

    * {
        margin: 0;
        padding: 0;
        scroll-behavior: smooth;
        scroll-padding-top: 2rem;
        box-sizing: border-box;
        font-family: var(--poppins-font-family);
    }

    :root {
        --poppins-font-family: 'Poppins', sans-serif;
        --body-color: #1e1e2a;
        --body-alter-color: ;
        --main-color: ;
        --hover-color: ;
        --container-color: ;
        --text-alter-color: ;
        --text-color: white;
    }

    ::selection {
        background: crimson;
        color: var(--text-color);
    }

    section {
        padding: 4rem 0 3 rem;
    }

    img {
        width: 100%;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    body {
        color: var(--text-color);
        background: var(--body-color);
    }

    .container {
        max-width: 1060px;
        width: 100%;
        margin: auto;
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: crimson;
        z-index: 200;
    }

    .nav {
        max-width: 1200px;
        margin: auto;
        width: 95%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0;
    }

    .logo {
        display: flex;
        align-items: center;
        color: var(--text-color);
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .logo span {
        color: var(--text-color);
    }

    .navbar {
        display: flex;
        align-items: center;
        column-gap: 1.2rem;
        margin-left: auto;
        /* Push the navbar to the right */
    }

    .nav-link {
        position: relative;
        font-size: 1rem;
        color: var(--text-color);
        font-weight: 500;
    }

    .nav-link::after {
        content: '';
        left: 0;
        bottom: -4px;
        width: 0%;
        height: 3px;
        background: var(--text-color);
        position: absolute;
    }

    .nav-link:hover::after {
        width: 100%;
        transition: 0.4s all linear;
    }

    .home-slide {
        min-height: 640px;
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .slide-img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: -1;
    }

    .home-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(74deg, rgba(30, 30, 42, 80%) 50%,
                rgba(30, 30, 42, 14%));
        z-index: 200;
    }

    .swiper-pagination-bullet {
        width: 6px !important;
        height: 6px !important;
        border-radius: 0.2rem !important;
        background: var(--text-color);
        opacity: 1;
    }

    .swiper-pagination-bull-active {
        width: 1.5rem;
        background: crimson;

    }

    .home-text {
        z-index: 200;
    }

    .slide-title {
        position: relative;
        font-size: 2.1rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .slide-title::after,
    .faq-title::after {
        content: '';
        position: absolute;
        top: -8px;
        left: 0;
        width: 44px;
        height: 3px;
        background: crimson;
    }

    .slide-title span {
        color: crimson;
    }

    .slide-description {
        max-width: 450px;
        font-size: 0.938rem;
        margin: 0.2rem 0 1rem;
    }

    .btn {
        display: inline-flex;
        background: crimson;
        padding: 10px 16px;
        color: white;
        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        border-radius: 35px;
    }

    .btn:hover {
        background: black;
        transform: 0.3s all linear;
    }

    .payment-step-container {
        border-radius: 32px;
        padding: 15px 15px 50px;
        margin-bottom: 2px;
        margin-top: 30px;
        background-color: #2d2e37;
        margin-left: 30rem;
        margin-right: 2rem;
    }

    .title-text {
        display: flex;
        align-items: center;
        font-size: 14px;
        margin-bottom: 18px;
        text-transform: uppercase;
        color: crimson;
        -webkit-box-align: center;
    }

    .step-circle {
        display: flex;
        /* Added to center text vertically */
        align-items: center;
        /* Center text vertically */
        justify-content: center;
        background-color: crimson;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        font-size: 20px;
        margin-right: 15px;
        color: white;
        -webkit-box-pack: center;
        text-align: center;
        /* Center text horizontally */
    }


    .input-group {
        max-width: 500px;
        margin-top: 1.5rem;
        display: flex;
        flex-flow: row wrap;
        align-items: center;
        box-sizing: border-box;
        margin-block-end: 1em;
        text-align: center;
        border-width: 1px;
        height: 40px;
        background-color: transparent;
        color: white;
        font-weight: 300;
        overflow: visible;
        margin: 0;
    }

    .input-email {
        width: 100%;
        flex-grow: 1;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        -webkit-box-flex: 1;
        -webkit-box-align: stretch;
        -webkit-box-direction: normal;
        border: 5px crimson;
    }

    .input-group-prepend {
        display: flex;
        margin-right: -1px;
        box-sizing: box;
        -webkit-box-direction: normal;
    }

    .icon {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        color: white;
        background-color: crimson;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.714em;
        padding: 0 7px;
    }

    .form-email {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        height: 40px;
        background-color: #2d2e37;
        /* color: crimson; */
        color: white;
        font-size: 300;
        position: relative;
        flex: 1 1 auto;
        min-width: none;
        margin-bottom: 0;
        display: inline-block;
        padding: 0.5em 0.75em;
        font-size: 1rem;
        line-height: 1.5;
        background-clip: padding-box;
        border-radius: 4px;
        overflow: visible;
        margin: 0;
        text-align: left;

    }

    .step-input-description {
        color: white;
        margin-top: 1rem;
        display: block;
        text-align: center;
        font-size: 80%;
        font-weight: 400;
    }

    .payment-denom-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
    }

    .payment-denom-button {
        background-color: #393a46;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        margin: 5px;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    .payment-denom-button:hover {
        background-color: crimson;
    }

    .Checkout-button {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #393a46;
        color: #fff;
        border: none;
        border-radius: 32px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
        margin-top: 30px;
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 20px;
        width: 30%;
        margin-right: 30px;
        margin-left: 50%;
    }

    .Checkout-button:hover {
        background-color: crimson;
    }

    .control {
        background: #2d2e37;
    }

    .control-content {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 2rem;
        background: #2d2e37;
        margin-top: 5rem;
        padding-top: 2rem;
        padding-bottom: 2rem;

    }

    .control-text {
        flex: 1 1 17rem;
    }

    .control-title {
        position: relative;
        font-size: 1.8rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .control-text p {
        font-size: 0.938rem;
        margin: 0.5rem 0 0.8rem;
    }

    .control-text .bx {
        color: crimson;
    }

    .spec-box {
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .spec-box span {
        font-size: 0.938rem;
    }

    .control-images {
        flex: 1 1 17rem;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 24px !important;
        font-weight: 600;
        color: var(--text-color);
    }

    .footer-container-background {
        background: crimson;
    }

    .footer {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-top: 4rem !important;
        padding-bottom: 20px;
    }

    .footer-box {
        display: flex;
        flex-direction: column;
    }

    .footer-title {
        font-size: 1.2rem;
        color: var(--text-color);
        text-transform: uppercase;
        font-weight: 500;
        margin-bottom: 0.4rem;
    }

    .footer-box a {
        color: var(--text-color);
        font-size: 0.9rem;
        font-weight: 400;
        letter-spacing: 1px;
        margin-top: 0.5rem;
    }

    .footer-box:hover {
        color: crimson;
        transition: 0.3s all linear;
    }

    .footer-box,
    .footer-logo {
        text-transform: uppercase;
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--text-color);
    }

    .social {
        margin-top: 1rem;
        display: flex;
        align-items: center;
        columns: 10px;
        gap: 1rem;
    }

    .social .bx {
        font-size: 24px;
    }

    .social .bx:hover {
        color: crimson;
        transition: 0.3 all linear;
    }

    .copyright {
        padding: 30px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid white;
    }

    .faq-img {
        flex: 1 1 17rem;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script src="main.js"></script>
</body>

</html>