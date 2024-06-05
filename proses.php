<?php
include "koneksi.php";
include "function.php";
session_start();

// if (isset($_POST['answer'])) {
//     $id_gejala = $_POST['id_gejala'];
//     $answer = $_POST['answer'];

//     if ($answer == 'Ya') {
//         $_SESSION['terjawab'][$id_gejala] = true;
//     } else {
//         $_SESSION['terjawab'][$id_gejala] = false;
//     }
//     $_SESSION['current_gejala']++;

//     header("location: index.php");
//     exit();
// } else {
//     header("location: index.php");
//     exit();
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $id_gejala = isset($_POST['id_gejala']) ? $_POST['id_gejala'] : null;
//     $answer = isset($_POST['answer']) ? $_POST['answer'] : null;

//     if ($id_gejala !== null && $answer !== null) {
//         $_SESSION['terjawab'][$id_gejala] = $answer == 'Ya';

//         header("Location: index.php");
//         exit();
//     }
// }

if (isset($_POST['gejala']) && count($_POST['gejala']) > 0) {
    foreach ($_POST['gejala'] as $id_gejala) {
        $_SESSION['terjawab'][$id_gejala] = true;
    }

    $_SESSION['diagnosa_selesai'] = true;
    header("location: index.php");
    exit();
} else {
    $_SESSION['error'] = "Silakan pilih setidaknya satu gejala.";
    header("Location: index.php");
    exit();
}

mysqli_close($db);
