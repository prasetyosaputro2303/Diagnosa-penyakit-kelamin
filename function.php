<?php

function get_gejala($db, $id_gejala)
{
    $result = mysqli_query($db, "SELECT * FROM gejala WHERE id_gejala = $id_gejala");
    return mysqli_fetch_assoc($result);
}

function get_penyakit_by_gejala($db, $id_gejala)
{
    $result = mysqli_query($db, "SELECT id_penyakit FROM relasi WHERE id_gejala = $id_gejala");
    $penyakit = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $penyakit[] = $row['id_penyakit'];
    }
    return $penyakit;
}

function get_penyakit_name($db, $id_penyakit)
{
    if (empty($id_penyakit)) {
        return "penyakit tidak ditemukan";
    }
    $result = mysqli_query($db, "SELECT penyakit, deskripsi FROM penyakit WHERE id_penyakit = $id_penyakit");
    if (!$result) {
        die('Query error: ' . mysqli_error($db));
    }
    return mysqli_fetch_assoc($result);
}



function hitung_persentase($db, $terjawab, $id_penyakit)
{
    $jumlah = 0;
    foreach ($terjawab as $id_gejala => $jawaban) {
        if ($jawaban) {
            $result = mysqli_query($db, "SELECT id_gejala FROM relasi WHERE id_penyakit = $id_penyakit AND id_gejala = $id_gejala");
            if (mysqli_num_rows($result) > 0) {
                $jumlah++;
            }
        }
    }

    $jumlah2 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM relasi WHERE id_penyakit = $id_penyakit"));

    if ($jumlah2 == 0) {
        return 0;
    }

    $hitung = ($jumlah / $jumlah2) * 100;
    $persen = number_format($hitung, 2);

    return $persen;
}


// function get_next_gejala($db, $current_gejala, $answered_gejala)
// {
//     $answered_list = implode(",", $answered_gejala);
//     $query = "SELECT id_gejala FROM gejala WHERE id_gejala > $current_gejala";
//     if (!empty($answered_list)) {
//         $query .= " AND id_gejala NOT IN ($answered_list)";
//     }
//     $query .= " ORDER BY id_gejala ASC LIMIT 1";

//     $result = mysqli_query($db, $query);
//     if ($result && mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         return $row['id_gejala'];
//     } else {
//         return null;
//     }
// }

function get_all_gejala($db)
{
    $result = mysqli_query($db, "SELECT id_gejala, gejala FROM gejala");
    $gejala = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $gejala[] = $row;
    }
    return $gejala;
}
