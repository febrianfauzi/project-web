<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo '<script>alert("Login Terlebih Dahulu!");document.location="../index.php";</script>';
}

if ($_SESSION['users'] == 'Mahasiswa') {
	echo '<script>alert("Akses Ditolak!");document.location="index-mahasiswa.php";</script>';
}
