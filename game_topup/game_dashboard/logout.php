<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM pbl_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
?>

