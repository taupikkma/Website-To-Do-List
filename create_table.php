<?php
include('koneksi.php');

$sql = file_get_contents('create_table.sql');

if (mysqli_multi_query($koneksi, $sql)) {
    echo "Tabel tasks berhasil dibuat!";
} else {
    echo "Error membuat tabel: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>