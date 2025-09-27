<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['simpan'])) {
    include('koneksi.php');

    $user_id = $_SESSION['user_id'];
    $task_id = mysqli_real_escape_string($koneksi, $_POST['task_id']);
    $task_title = mysqli_real_escape_string($koneksi, $_POST['task_title']);
    $task_description = isset($_POST['task_description']) ? mysqli_real_escape_string($koneksi, $_POST['task_description']) : NULL;
    $task_deadline = !empty($_POST['task_deadline']) ? mysqli_real_escape_string($koneksi, $_POST['task_deadline']) : NULL;
    $task_priority = mysqli_real_escape_string($koneksi, $_POST['task_priority']);

    // Cek kepemilikan tugas
    $check_ownership = mysqli_query($koneksi, "SELECT * FROM tasks WHERE task_id = '$task_id' AND user_id = $user_id");
    if (mysqli_num_rows($check_ownership) == 0) {
        header("Location: index.php");
        exit();
    }

    $query_update = "UPDATE tasks SET 
                    task_title = '$task_title',
                    task_description = " . ($task_description ? "'$task_description'" : "NULL") . ",
                    task_deadline = " . ($task_deadline ? "'$task_deadline'" : "NULL") . ",
                    task_priority = '$task_priority'
                    WHERE task_id = '$task_id' AND user_id = $user_id";

    mysqli_query($koneksi, $query_update);
}

header("Location: index.php");
exit();
?>