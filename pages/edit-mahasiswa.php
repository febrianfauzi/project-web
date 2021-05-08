<?php 
include ("../database/koneksi.php");
$dup = mysqli_num_rows(mysqli_query($conn,"select * from mahasiswa"));

$nim = $_POST['nim'];
$maha = mysqli_query($conn,"select * from mahasiswa where nim = '$nim'");
$row=mysqli_fetch_array($maha);
if (isset($_POST['nim'])) {?>

	<form action="mahasiswa.php" method="post" class="form-user">
		<div class="form-row d-flex align-items-center justify-content-center" >
			<div class="row col-md-12">
				<div class="col-lg-2 mb-1">
					<input type="text" class="form-control" name="nim" placeholder="NIM" tabindex="1" value="<?php echo $row['nim'] ?>" readonly required>
				</div>
				<div class="col-lg-2 mb-1">
					<input type="text" class="form-control" name="nama" placeholder="Nama" tabindex="2" value="<?php echo $row['nama'] ?>" required>
				</div>
				<div class="col-lg-2 mb-1">
					<select class="form-control" name="jurusan" id="jurusan">
						<option value="<?php echo $row['jurusan'] ?>" selected><?php echo $row['jurusan'] ?></option>
						<?php 
						$a = $row['jurusan'];
						$data = mysqli_query($conn,"select * from fakultas where fakultas not like '$a'");
						while($d=mysqli_fetch_array($data)){
							?>
							<option value="<?php echo $d['fakultas'] ?>"><?php echo $d['fakultas'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-2 mb-1">
					<select class="form-control" name="konsentrasi" id="konsentrasi">
						<option value="<?php echo $row['konsentrasi'] ?>"><?php echo $row['konsentrasi'] ?></option>
						<?php 
						$a = $row['jurusan'];
						$data = mysqli_query($conn,"select * from konsentrasi where fakultas = '$a'");
						while($d=mysqli_fetch_array($data)){
							?>
							<option value="<?php echo $d['konsentrasi'] ?>"><?php echo $d['konsentrasi'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-2 mb-1">
					<input type="text" class="form-control" name="email" placeholder="Email" tabindex="5" value="<?php echo $row['email'] ?>" required>
					<input type="hidden" name="data" value="<?php echo($dup); ?>">
					<input type="hidden" name="info" value="edit">
				</div>
				<div class="col-md-1 mb-1">
					<button type="submit" class="btn-success btn-lg btn-block tombol-simpan"><i class="fas fa-check"></i></button>
				</div>
				<div class="col-md-1 mb-1">
					<button type="reset" class="btn-danger btn-lg btn-block tombol-close"><i class="fas fa-times"></i></button>
				</div>
			</div>
		</div>
	</form>
	
	<?php
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

	$("#jurusan").change(function(){
            // variabel dari nilai combo box kendaraan
            var jurusan = $("#jurusan").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
            	type: "POST",
            	dataType: "html",
            	url: "data/data-select-konsentrasi.php",
            	data: "jurusan="+jurusan,
            	success: function(data){
            		$("#konsentrasi").html(data);
            	}
            });
        });

	$(".tombol-close").click(function(){
		$('.form-user').fadeOut(500);
	});

	$(document).ready(function(){
		$(".tombol-simpan").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'post',
				url: "data/data-edit-mahasiswa.php",
				data: data,
				success: function() {

				}
			});
		});
	});
</script>
