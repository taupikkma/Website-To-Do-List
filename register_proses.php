<?php
session_start();
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Cek username sudah ada atau belum
    $check_username = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($check_username) > 0) {
        $_SESSION['error'] = "Username sudah digunakan!";
        header("Location: register.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user baru
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan! Silakan coba lagi.";
        header("Location: register.php");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?> 