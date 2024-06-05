<?php
include "koneksi.php";
$id_gejala = $_GET['id_gejala'];
$result2 = mysqli_query($db, "DELETE FROM gejala WHERE id_gejala = $id_gejala");
$result = mysqli_query($db, "DELETE FROM relasi WHERE id_gejala = $id_gejala");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Gejala</title>
</head>

<body>
</body>

</html>