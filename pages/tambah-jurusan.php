<form action="index.php" method="POST" class="form-user">
	<div class="form-row" >
		<div class="row col-md-12">
			<div class="col-lg-2 mb-1">
				<input type="text" class="form-control" name="id_fak" placeholder="Kode Jurusan" tabindex="1" required>
				<div class="invalid-feedback">
					Kode Jurusan harap diisi
				</div>
			</div>
			<div class="col-lg-5 mb-1">
				<input type="text" class="form-control" name="fakultas" placeholder="Jurusan" tabindex="2" required>
				<div class="invalid-feedback">
					Jurusan harap diisi
				</div>
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
