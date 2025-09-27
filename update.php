<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('koneksi.php');

if (isset($_POST['task_id'])) {
    $user_id = $_SESSION['user_id'];
    $task_id = mysqli_real_escape_string($koneksi, $_POST['task_id']);
    $is_completed = isset($_POST['is_completed']) ? 1 : 0;
    
    // Cek kepemilikan tugas
    $check_ownership = mysqli_query($koneksi, "SELECT * FROM tasks WHERE task_id = '$task_id' AND user_id = $user_id");
    if (mysqli_num_rows($check_ownership) > 0) {
        mysqli_query($koneksi, "UPDATE tasks SET is_completed = $is_completed WHERE task_id = '$task_id' AND user_id = $user_id");
    }
}

header("Location: index.php");
exit();
?>