<?php
include('koneksi.php');

$sql = file_get_contents('create_users_table.sql');

if (mysqli_multi_query($koneksi, $sql)) {
    echo "Tabel users berhasil dibuat ulang!";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?> 