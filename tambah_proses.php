<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['tambah'])) {
    include('koneksi.php');

    $user_id = $_SESSION['user_id'];
    $task_title = mysqli_real_escape_string($koneksi, $_POST['task_title']);
    $task_description = isset($_POST['task_description']) ? mysqli_real_escape_string($koneksi, $_POST['task_description']) : NULL;
    $task_deadline = !empty($_POST['task_deadline']) ? mysqli_real_escape_string($koneksi, $_POST['task_deadline']) : NULL;
    $task_priority = mysqli_real_escape_string($koneksi, $_POST['task_priority']);

    $query_insert = "INSERT INTO tasks (user_id, task_title, task_description, task_deadline, task_priority) 
                     VALUES ($user_id, '$task_title', ";
    $query_insert .= $task_description ? "'$task_description'" : "NULL";
    $query_insert .= ", ";
    $query_insert .= $task_deadline ? "'$task_deadline'" : "NULL";
    $query_insert .= ", '$task_priority')";

    mysqli_query($koneksi, $query_insert);
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>