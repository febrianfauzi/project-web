<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo '<script>alert("Login Terlebih Dahulu!");document.location="../index.php";</script>';
}
if ($_SESSION['users'] == 'Dosen') {
	echo '<script>alert("Akses Ditolak!");document.location="index-dosen.php";</script>';
}