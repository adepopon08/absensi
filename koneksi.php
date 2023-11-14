<?php
$konek = mysqli_connect('localhost', 'root', '', 'xirpl1db');

if ($konek) {
    echo "<script>alert('Koneksi Berhasil')</script>";
} else {
    echo "<script>alert('Koneksi Gagal!')</script>";
}
