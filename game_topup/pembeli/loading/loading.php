<?php
$id_transaksi = $_GET["id_transaksi"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: monospace;
            background: black;
        }

        .center {
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .ring {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            animation: ring 6s linear forwards;
        }

        @keyframes ring {
            0% {
                transform: rotate(0deg);
                box-shadow: 1px 5px 2px #e65c00;
            }

            100% {
                transform: rotate(360deg);
                box-shadow: 1px 5px 2px #0456c8;
            }
        }

        ring::before {
            position: absolute;
            content: "";
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
        }

        span {
            color: #737373;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 200px;
            animation: text 3s ease-in-out infinite;
        }

        @keyframes text {
            50% {
                color: black;
            }
        }
    </style>
</head>

<body>
    <div class="center">
        <div class="ring" id="rotatingRing"></div>
        <span>Loading...</span>
    </div>
    <script>
        const rotatingRing = document.getElementById('rotatingRing');
        let id_transaksi = "<?= $id_transaksi ?>";

        rotatingRing.addEventListener('animationend', () => {
            // Ganti URL dengan halaman berikutnya
            window.location.href = 'header.php?id_transaksi=' + id_transaksi;
        });
    </script>
</body>

</html>