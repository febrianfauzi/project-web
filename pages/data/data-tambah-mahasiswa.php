<?php 
	include '../../database/koneksi.php';
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$jurusan = $_POST['jurusan'];
	$konsentrasi = $_POST['konsentrasi'];
	$email = $_POST['email'];

	if ($nim != "") {
		$dup = mysqli_num_rows(mysqli_query($conn,"select * from mahasiswa where nim = '$nim'"));
		if ($dup == 0) {
			mysqli_query($conn,"insert into mahasiswa values('$nim','$nama','$jurusan','$konsentrasi','$email','Mahasiswa')");
			mysqli_query($conn,"insert into user values('3','$nim','mahasiswa')");
		}
	}
?>