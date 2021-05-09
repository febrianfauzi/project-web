<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo '<script>alert("Login Terlebih Dahulu!");document.location="../index.php";</script>';
}
