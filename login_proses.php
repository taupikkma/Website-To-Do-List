<?php
session_start();
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?> 