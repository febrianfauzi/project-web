<?php 
error_reporting(0);
include ("../../database/koneksi.php");
include ("../data/data-hapus-jurusan.php");
include ("../data/data-hapus-konsentrasi.php");
include ("../../akses.php");

$user = $_SESSION["nama"];
$nim = $_SESSION["id"];
$sta = mysqli_query($conn,"select * from mahasiswa where nim='$nim'");
$d=mysqli_fetch_array($sta);

$cek = mysqli_num_rows(mysqli_query($conn,"select * from skripsi where nama = '$user'"));

?>
<?php include ("../../template/header.php"); ?>

        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index-mahasiswa.php">Sistem Skripsi</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index-mahasiswa.php">SS</a>
            </div>
            <ul class="sidebar-menu">
              <li><a class="nav-link" href="profile-mahasiswa.php"><i class="fas fa-user"></i> <span>Profile</span></a></li>
              <li class="active"><a class="nav-link" href="index-mahasiswa.php"><i class="fas fa-university"></i> <span>Pemberitahuan</span></a></li>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span class="text-muted">Skripsi</span></a></li>';}else{ echo '<li><a class="nav-link" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span>Skripsi</span></a></li>';} ?>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="../chat/chatMahasiswa.php"><i class="fas fa-comment-dots"></i> <span class="text-muted">Pesan</span></a></li>';}else{echo '<li><a class="nav-link" href="../chat/chatMahasiswa.php"><i class="fas fa-comment-dots"></i> <span >Pesan</span></a></li>';} ?>
              <li><a class="nav-link" href="upload-skripsi.php"><i class="fas fa-folder-open"></i> <span>Upload Skripsi</span></a></li>
            </ul>
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <div class="col-lg-7">
              <h1>Pemberitahuan</h1>
              </div>
              <div class="d-flex d-flex align-items-end flex-column bd-highlight col-lg-5">
                <span><?php echo $d['jurusan']; echo "(".$d['konsentrasi'].")"; ?></span>
                <h5><?php echo $d['nama'];?></h5>
              </div>
            </div>
            <?php if ($d['status'] == "Mahasiswa"){ echo '
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-9 mt-5 pl-5">
                        <h3>Selamat Datang, '; echo $user; echo '. Mahasiswa Baru Ya.</h3>
                        <span>Saat ini sistem hanya bisa melakukan login!, sistem ini akan bisa digunakan jika admin telah menerima dan memvalidasimu jika kamu sudah mulai melakukan skripsi!, tetep semangat ya menjalani kehidupanmu di kampus !!!, jika kamu sudah memasuki semester akhir dan masih belum bisa mengakses ide skripsi. silahkan tanyakan ke fakultasnya masing-masing.
                        </span>  
                      </div>
                      <div class="col-lg-3">
                          <img alt="image" src="../../assets/img/jelaskan.jpg" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            '; }; ?>
            <?php if ($d['status'] == "Skripsi"){ 
              if ($cek >= 1){ echo '
            <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
            <div class="row">
            <div class="isi-skripsi"></div>
            </div>
            </div>
            </div>
            </div>
            </div>';}else{echo '
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-9 mt-5 pl-5">
                        <h3>Selamat Datang, '; echo $user; echo '. Sang Pejuang Skripsi.</h3>
                        <span>Selamat ya karena menempuh semester akhir dimana setiap mahasiswa S1 pasti akan mengalami namanya fase pengerjaan Skripsi. Saat ini menu Ide Skripsi dan Pesan sudah bisa diakses. Kamu bisa mengajukan ide skripsi dan dapat bertanya seputar skripsi pada menu pesan. Jadi, Semangat untuk skripsimu !!! 
                        </span>  
                      </div>
                      <div class="col-lg-3">
                          <img alt="image" src="../../assets/img/jelaskan.jpg" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            ';} }; ?>
          </div>
        </div>
      </section>
    </div>
    
    <?php include ("../../template/footer.php"); ?>

    <script type="text/javascript">

      $('.isi-skripsi').load('tampil-skripsi-mah.php');

    </script>
  </body>
  </html>
