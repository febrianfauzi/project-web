<?php 
	include '../../database/koneksi.php';
	$nidn = $_POST['nidn'];
	$nama = $_POST['nama'];
	$jurusan = $_POST['jurusan'];
	$konsentrasi = $_POST['konsentrasi'];
	$email = $_POST['email'];

	if ($nidn != "") {
		$dup = mysqli_num_rows(mysqli_query($conn,"select * from dosen where nidn = '$nidn'"));
		if ($dup == 0) {
			mysqli_query($conn,"insert into dosen values('$nidn','$nama','$jurusan','$konsentrasi','$email')");
			mysqli_query($conn,"insert into user values('2','$nama','$nidn','dosen','../assets/img/avatar/avatar-2.png')");
		}
	}
?>