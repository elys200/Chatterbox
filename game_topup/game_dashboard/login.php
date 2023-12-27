<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $query = mysqli_prepare($conn, "SELECT * FROM pengguna WHERE username = ?");
    mysqli_stmt_bind_param($query, "s", $username);
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            session_start();
            if ($row["role"] == "penjual") {
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["role"];
                header("location: ../penjual/index.php");
            } elseif ($row["role"] == "pembeli") {
                $_SESSION["username"] = $row["username"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["role"] = $row["role"];
                header("location: dashboard_user.php");
            } else {
                echo "<script> alert('Role tidak ditemukan'); </script>";
            }
        } else {
            echo "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo "<script> alert('User Not Registered'); </script>";
    }

    mysqli_stmt_close($query);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

    <?php
    $pesan = isset($_GET["pesan"]);
    if ($pesan == "berhasil") {
        echo "<script> alert('Registration Successfull'); </script>";
    }
    ?>

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>CHATTERBOX</h3>
            <input type="username" name="username" required placeholder="masukkan username">
            <input type="password" name="password" required placeholder="masukkan password">
            <input type="submit" name="submit" value="masuk sekarang" class="form-btn">
            <p>tidak punya akun? <a href="registration.php">daftar sekarang</a></p>
        </form>


        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

            * {
                font-family: 'Poppins', sans-serif;
                margin: 0;
                padding: 20;
                box-sizing: border-box;
                outline: none;
                border: none;
                text-decoration: none;

            }

            .container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                padding-bottom: 60px;
            }

            .container .content {
                text-align: center;
            }

            .container .content h3 {
                font-size: 30px;
                color: #333;
            }

            .container .content h3 span {
                background: crimson;
                color: #fff;
                border-radius: 5px;
                padding: 0 15px;
            }

            .container .content h1 {
                font-size: 50px;
                color: #333;
            }

            .container .content h1 span {
                color: crimson;
            }

            .container .content p {
                font-size: 25px;
                margin-bottom: 20px;
            }

            .container .content .btn {
                display: inline-block;
                padding: 10px 30px;
                font-size: 20px;
                background: #333;
                color: #fff;
                margin: 0 5px;
                text-transform: capitalize;
            }

            .container .content .btn:hover {
                background: crimson;
            }

            .form-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                padding-bottom: 60px;
                background: url("../assets/img/dashboard/omen.jpeg") no-repeat;
                background-size: cover;
                background-position: top;
            }

            .form-container form {
                background: transparent;
                backdrop-filter: blur(50px);
                border: 0px;
                border-bottom: 0px;
                border-radius: 10px 10px 0px 0px;
                padding: 20px;
                box-shadow: 0 0 30px rgba(0, 0, 0, 5);
                border-bottom: none;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                width: 500px;
            }

            .form-container form h3 {
                font-size: 30px;
                text-transform: uppercase;
                margin-bottom: 10px;
                color: crimson;
            }

            .form-container form input,
            .form-container form select {
                background: transparent;
                backdrop-filter: blur(50px);
                width: 100%;
                padding: 10 px 15px;
                font-size: 17px;
                margin: 8px 0;
                border-radius: 5px;
                margin: 10px 0px 10px 0px;
                color: #BD3944;
            }

            .form-container form select option {
                background-color: #fff;
            }

            .form-container form .form-btn {
                padding: 10px;
                font-size: 15px;
                color: white;
                background: #BD3944;
                border: none;
                outline: none;
                cursor: pointer;
            }

            .form-container form .form-btn:hover {
                background: crimson;
                color: #fff;
            }

            .form-container form p {
                margin-top: 10px;
                font-size: 15px;
                color: white;
            }

            .form-container form p a {
                color: crimson;
            }

            .form-container form .error-msg {
                margin: 10px 0;
                display: block;
                background: crimson;
                color: #fff;
                border-radius: 5px;
                font-size: 20px;
                padding: 10px;
            }
        </style>
</body>

</html>