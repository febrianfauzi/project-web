<?php 
error_reporting(0);
include ("../database/koneksi.php");
include ("../akses.php");
include ("../akses-mahasiswa.php");

$user = $_SESSION["nama"];
$nidn = $_SESSION["id"];

$sta = mysqli_query($conn,"select * from dosen where nidn='$nidn'");
$d=mysqli_fetch_array($sta);
$konsen = $d['konsentrasi'];

$cek = mysqli_num_rows(mysqli_query($conn,"select * from skripsi where konsentrasi='$konsen' and dosen='$user' and status='Tunggu'"));

?>
<?php include ("../template/header.php"); ?>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?php echo $user; ?></div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="../logout.php" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index-dosen.php">Sistem Skripsi</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index-dosen.php">SS</a>
            </div>
            <ul class="sidebar-menu">
              <li><a class="nav-link" href="index-dosen.php"><i class="fas fa-university"></i> <span>Pemberitahuan</span></a></li>
              <li class="active"><a class="nav-link " href="dosen-ideskripsi.php"><i class="fas fa-file-alt"></i> <span>Skripsi</span></a></li>
              <li><a class="nav-link " href="list-skripsi.php"><i class="fas fa-folder-open"></i> <span>List Skripsi</span></a></li>
            </ul>
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <div class="col-lg-7">
              <h1>Ide Skripsi</h1>
              </div>
              <div class="d-flex d-flex align-items-end flex-column bd-highlight col-lg-5">
                <span><?php echo $d['jurusan']; echo "(".$d['konsentrasi'].")"; ?></span>
                <h5><?php echo $d['nama'];?></h5>
              </div>
            </div>
            <?php if ($cek == 0){ echo '
            <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
            <div class="row">
            <div class="col-lg-9 mt-5 pl-5">
            <h3>Belum Ada Ide Skripsi Yang Tersedia</h3>
            <span>Ide skripsi belum di isi oleh para mahasiswa. Silahkan tunggu sampai para mahasiswa melakukan pengisian untuk ide skripsinya.
            </span>  
            </div>
            <div class="col-lg-3">
            <img alt="image" src="../assets/img/jelaskan.jpg" class="img-fluid" alt="Responsive image">
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            '; }; ?>

            <?php if ($cek >= 1){ echo '
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
            </div>'; }; ?>
          </div>
        </div>
      </section>
    </div>
    
    <?php include ("../template/footer.php"); ?>

    <script type="text/javascript">

      $('.isi-skripsi').load('dosen-acc-skripsi.php');

    </script>

   
  </body>
  </html>
