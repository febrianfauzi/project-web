<?php
session_start();
if ($_SESSION['role'] == 1) {
	echo '<script language="javascript">alert("Anda berhasil Logout!"); document.location="admin/index.php";</script>';
}elseif ($_SESSION['role'] == 2) {
	echo '<script language="javascript">alert("Anda berhasil Logout!"); document.location="dosen/index.php";</script>';
}elseif ($_SESSION['role'] == 3) {
	echo '<script language="javascript">alert("Anda berhasil Logout!"); document.location="mahasiswa/index.php";</script>';
}

session_destroy();
?>