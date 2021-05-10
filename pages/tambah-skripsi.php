<?php 
include ("../database/koneksi.php");
$dup = mysqli_num_rows(mysqli_query($conn,"select * from list_skripsi"));
?>
<form action="data/data-tambah-kumpulan-skripsi.php" method="post" class="form-user" enctype="multipart/form-data">
	<div class="form-row d-flex align-items-center justify-content-center" >
		<div class="row col-md-12">
			<div class="col-lg-5 mb-1">
				<input type="text" class="form-control" name="judul" placeholder="Judul Skripsi" tabindex="1" required>
			</div>
			<div class="input-group mb-3 col">
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="nama_file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
					<label class="custom-file-label" for="inputGroupFile01">Pilih Skripsi(.pdf)</label>
				</div>
			</div>
			<input type="hidden" name="data" value="<?php echo($dup); ?>">
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

	document.querySelector('.custom-file-input').addEventListener('change',function(e){
          var fileName = document.getElementById("inputGroupFile01").files[0].name;
          var nextSibling = e.target.nextElementSibling
          nextSibling.innerText = fileName
        });

	$(".tombol-close").click(function(){
		$('.form-user').fadeOut(500);
	});

	$(document).ready(function(){
		$(".tombol-simpan").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'post',
				url: "data/data-tambah-kumpulan-skripsi.php",
				data: data,
				success: function() {
					
				}
			});
		});
	});
</script>
