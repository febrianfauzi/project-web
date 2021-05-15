<?php 
error_reporting(0);
include ("../../database/koneksi.php");
include ("../../akses.php");

$user = $_SESSION["nama"];
$nim = $_SESSION["id"];
$sta = mysqli_query($conn,"select * from mahasiswa where nim='$nim'");
$d=mysqli_fetch_array($sta);

$cek = mysqli_num_rows(mysqli_query($conn,"select * from skripsi where nama = '$user'"));

if(ISSET($_REQUEST['file'])){
 $file = $_REQUEST['file'];
 
  //header("Cache-Control: public");
  //header("Content-Description: File Transfer");
 header("Content-Disposition: attachment; filename=".basename($file));
 header("Content-Type: application/octet-stream;");
  //header("Content-Transfer-Encoding: binary");
 readfile("../../file/skripsi/".$file);
}

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
              <li><a class="nav-link" href="index-mahasiswa.php"><i class="fas fa-university"></i> <span>Pemberitahuan</span></a></li>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span class="text-muted">Skripsi</span></a></li>';}else{ echo '<li><a class="nav-link" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span>Skripsi</span></a></li>';} ?>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="../chat/chatMahasiswa.php"><i class="fas fa-comment-dots"></i> <span class="text-muted">Pesan</span></a></li>';}else{echo '<li><a class="nav-link" href="../chat/chatMahasiswa.php"><i class="fas fa-comment-dots"></i> <span >Pesan</span></a></li>';} ?>
              <li class="active"><a class="nav-link" href="upload-skripsi.php"><i class="fas fa-folder-open"></i> <span>Upload Skripsi</span></a></li>
            </ul>
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <div class="col-lg-7">
                <h1>Upload Skripsi</h1>
              </div>
              <div class="d-flex d-flex align-items-end flex-column bd-highlight col-lg-5">
                <span><?php echo $d['jurusan']; echo "(".$d['konsentrasi'].")"; ?></span>
                <h5><?php echo $d['nama'];?></h5>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <?php if ($d['status'] == "Skripsi"){ echo '
                    <div class="row">
                      <div class="col-md-5 col-lg-2 d-xl-none mb-2">
                        <button class="btn btn-primary upload-skripsi btn-lg btn-block"><i class="fas fa-plus"></i> Upload Skripsi</button>
                      </div>
                      <div class="d-none d-sm-block d-sm-none d-md-block d-md-none d-md-block d-lg-none d-xl-block mb-2 ml-2">
                        <button class="btn btn-primary upload-skripsi btn-lg btn-block"><i class="fas fa-plus"></i> Upload Skripsi</button>
                      </div>
                      <div class="col-lg-10 d-flex justify-content-end align-items-center">
                      </div>
                    </div>
                  ';}?>
                    <hr>
                    <div class="col-lg-12 mb-2">
                      <div class="form-input"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="isi-skripsi"></div>
          </div>
        </section>
      </div>

      <?php include ("../../template/footer.php"); ?>

      <script type="text/javascript">

        $(".upload-skripsi").click(function(){
          $('.form-input').load('tambah-skripsi.php').hide().fadeIn(500);
        });

        $('.isi-skripsi').load('tampil-kumpulan-skripsi.php');

      </script>
    </body>
    </html>
