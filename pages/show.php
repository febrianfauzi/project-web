<?php 
if (isset($_GET['e_mah'])) { ?>
	<script type="text/javascript">
		var nim = "<?php echo $_GET['e_mah']; ?>";
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "edit-mahasiswa.php",
			data: "nim="+nim,
			success: function(data){
				window.location.href = 'mahasiswa.php';
			}
		});
	</script>
	<?php
}
?>
