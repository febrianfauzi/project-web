<?php 
include ("../../database/koneksi.php");
$dup = mysqli_num_rows(mysqli_query($conn,"select * from mahasiswa"));
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="mahasiswa.php" method="post" class="form-user">
	<div class="form-row d-flex align-items-center justify-content-center" >
		<div class="row col-md-12">
			<div class="col-lg-2 mb-1">
				<input type="number" class="form-control" name="nim" placeholder="NIM" tabindex="1" required>
			</div>
			<div class="col-lg-2 mb-1">
				<input type="text" class="form-control" name="nama" placeholder="Nama" tabindex="2" required>
			</div>
			<div class="col-lg-2 mb-1">
				<select class="form-control" name="jurusan" id="jurusan">
					<option selected disabled>Pilih Jurusan</option>
					<?php 
					$data = mysqli_query($conn,"select * from fakultas");
					while($d=mysqli_fetch_array($data)){
						?>
						<option id="jurusans" value="<?php echo $d['fakultas'] ?>"><button class="btn btn-success apa"><?php echo $d['fakultas'] ?></button></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-lg-2 mb-1">
				<select class="form-control" name="konsentrasi" id="konsentrasi">
					<option selected disabled>Pilih Konsentrasi</option>
				</select>
			</div>
			<div class="col-lg-2 mb-1">
				<input type="text" class="form-control" name="email" placeholder="Email" tabindex="5" required>
				<input type="hidden" name="data" value="<?php echo($dup); ?>">
			</div>
			<div class="col-md-1 mb-1">
				<button type="submit" class="btn-primary btn-lg btn-block tombol-simpan"><i class="fas fa-plus"></i></button>
			</div>
			<div class="col-md-1 mb-1">
				<button type="reset" class="btn-danger btn-lg btn-block tombol-close"><i class="fas fa-times"></i></button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">

	$("#jurusan").change(function(){
            // variabel dari nilai combo box kendaraan
            var jurusan = $("#jurusan").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
            	type: "POST",
            	dataType: "html",
            	url: "../data/data-select-konsentrasi.php",
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
				url: "../data/data-tambah-mahasiswa.php",
				data: data,
				success: function() {

				}
			});
		});
	});
</script>
