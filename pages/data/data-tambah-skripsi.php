<?php 
include '../../database/koneksi.php';
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$nama = $_POST['nama'];
$konsentrasi = $_POST['konsentrasi'];
$dosen = $_POST['pembimbing'];

if ($judul != "") {
	 
	$tipe_file = $_FILES['nama_file']['type']; //mendapatkan mime type
if ($tipe_file == "application/pdf"){ //mengecek apakah file tersebu pdf atau bukan
 $nama_file = trim($_FILES['nama_file']['name']);

mysqli_query($conn,"insert into skripsi values(null,'$judul','$deskripsi','$nama','$dosen','Tunggu','$konsentrasi','','')");

 //dapatkan id terkahir
 $query = mysqli_query($conn,"SELECT id_skripsi FROM skripsi ORDER BY id_skripsi DESC LIMIT 1");
 $data  = mysqli_fetch_array($query);

 //mengganti nama pdf
 $nama_baru = $judul."_".$data['id_skripsi'].".pdf"; //hasil contoh: file_1.pdf
 $file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
 $folder    = "../../file/proposal"; //folder tujuan

 move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
 //update nama file di database
 mysqli_query($conn,"UPDATE skripsi SET file='$nama_baru' WHERE id_skripsi='$data[id_skripsi]'");
 header('location:../ide-skripsi.php');

}

}
?>
