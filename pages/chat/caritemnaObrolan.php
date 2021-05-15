<?php

session_start();
$role = $_SESSION['role'];
$keyword = $_POST['keyword'];

$output = array();
$var = array();

include "../../database/koneksi.php";

if ($role == 2) {
    $sql = "SELECT skripsi.`nama`, user.`gambar`, skripsi.`nim` 
                 FROM user INNER JOIN skripsi ON user.`user` = skripsi.`nim`
                 WHERE skripsi.`nim` LIKE '%$keyword%'";

    $query = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_array($query)) {
        $var['username'] = $id;
        $var['namaLengkap'] = $data['nama'];
        $var['temanObrolan'] = $data['nim'];
        $var['gambar'] = $data['gambar'];

        array_push($output, $var);
    }
} else if ($role == 3) {
    $sql = "SELECT skripsi.`dosen`, user.`gambar`, skripsi.`nidn` 
                 FROM user INNER JOIN skripsi ON user.`user` = skripsi.`nim` 
                WHERE skripsi.`nidn` LIKE '%$keyword%'";

    $query = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_array($query)) {
        $var['username'] = $id;
        $var['namaLengkap'] = $data['dosen'];
        $var['temanObrolan'] = $data['nidn'];
        $var['gambar'] = $data['gambar'];

        array_push($output, $var);
    }
} else if ($role == 1){
    $sql = "SELECT * FROM user WHERE user LIKE '%$keyword%'";
    $query = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_array($query)) {
        $var['username'] = $id;
        $var['namaLengkap'] = $data['nama'];
        $var['temanObrolan'] = $data['user'];
        $var['gambar'] = $data['gambar'];

        array_push($output, $var);
    }
}

echo json_encode($output);
