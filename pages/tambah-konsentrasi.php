<?php 
	include("../database/koneksi.php");
 ?>
<form action="index.php" method="POST" class="form-user">
	<div class="form-row" >
		<div class="row col-md-12">
			<div class="col-lg-3 mb-1">
				<input type="text" class="form-control" name="id_kon" placeholder="Kode Konsentrasi" tabindex="1" required>
			</div>
			<div class="col-lg-3 mb-1">
				<input type="text" class="form-control" name="konsentrasi" placeholder="Konsentrasi" tabindex="2" required>
			</div>
			<div class="col-lg-4 mb-1">
				<select class="form-control" id="exampleFormControlSelect1">
					<option selected disabled>Pilih Jurusan</option>
					<?php 
					$data = mysqli_query($conn,"select * from fakultas");
					while($d=mysqli_fetch_array($data)){
						?>
						<option value="<?php echo $d['fakultas'] ?>"><?php echo $d['fakultas'] ?></option>
					<?php } ?>
				</select>
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

	$(".tombol-close").click(function(){
		$('.form-user').fadeOut(500);
	});

	$(document).ready(function(){
		$(".tombol-simpan").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'POST',
				url: "data/data-tambah-jurusan.php",
				data: data,
				success: function() {

				}
			});
		});
	});
</script>
