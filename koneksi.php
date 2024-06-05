<?php
$db = mysqli_connect('localhost', 'root', 'Ahmadridho123', 'sp');

if ($db->connect_error) {
    echo "Koneksi Gagal";
    die("error!");
}
