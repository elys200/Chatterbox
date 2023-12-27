<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <header>
        <div class="nav">
            <a href="#home" class="logo">
                Chatter<span>Box</span>
            </a>
            <div class="navbar">
            </div>
        </div>
    </header>
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="home-slide">
                    <div class="home-overlay"></div>
                    <div class="home-text container">
                        <p class="slide-title">ChatterBox</p>
                        <p class="slide-description">
                            Selamat datang di ChatterBox!!
                        </p>
                        <p class="home-">
                            Chatterbox merupakan aplikasi game top-up berbasis website. Chatterbox menyediakan berbagai
                            macam
                            game top-up, mulai dari game PC hingga game mobile. Mulai dari Rp. 10.000, Anda dapat
                            melakukan top up
                            game untuk menjadikannya lebih premium dan meningkatkan pengalaman bermain game Anda.
                        </p>

                        <p class="bla-bla">Buka Kegembiraan! Selami Dunia yang Menyenangkan di Situs Web Kami!</p>
                        <a href="../pembeli/game.php" class="btn">Klik disini untuk masuk</a>
                        <a href="logout.php" class="btn">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq container" id="faq">
        <div class="faq-text">
        </div>
        <div class="faq-img">
            <img src="../assets/img/dashboard/agent.png" alt="">
        </div>
    </section>


    <sctyle>
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
                margin-top: 2rem;
            }

            .btn:hover {
                background: black;
                transform: 0.3s all linear;
            }

            .heading {
                text-align: center;
                font-size: 1.8rem;
                font-weight: 500;
                margin-top: 5rem;
            }

            .heading::after {
                content: '';
                position: relative;
                display: flex;
                left: 50%;
                transform: translate(-50%);
                bottom: -4px;
                width: 44px;
                height: 3px;
                background: var(--body-color);
            }

            .bla-bla {
                margin-top: 2rem;
            }

            .faq {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 2rem;
                margin-top: 5rem;
            }

            .faq-text {
                flex: 1 1 17rem;
            }

            .faq-img {
                flex: 1 1 17rem;
                position: absolute;
                margin-left: 30rem;
            }
        </style>
</body>

</html>