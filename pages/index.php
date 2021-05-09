<?php 
error_reporting(0);
include ("../database/koneksi.php");
include ("data/data-hapus-jurusan.php");
include ("data/data-hapus-konsentrasi.php");
include ("../akses.php");
include ("../akses-dosen.php");
include ("../akses-mahasiswa.php");

$user = $_SESSION["nama"];

$data = $_POST['data'];
$fak = mysqli_num_rows(mysqli_query($conn,"select * from fakultas"));
$kon = mysqli_num_rows(mysqli_query($conn,"select * from konsentrasi"));

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
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
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
            <a href="index.php">Sistem Skripsi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">SS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="active"><a class="nav-link" href="index.php"><i class="fas fa-university"></i> <span>Beranda</span></a></li>
            <li><a class="nav-link" href="mahasiswa.php"><i class="fas fa-graduation-cap"></i> <span>Mahasiswa</span></a></li>
            <li><a class="nav-link" href="dosen.php"><i class="fas fa-chalkboard-teacher"></i> <span>Dosen</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Beranda</h1>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 col-lg-2 d-xl-none mb-2">
                      <button class="btn btn-primary tambah-jurusan btn-lg btn-block"><i class="fas fa-plus"></i> Jurusan</button>
                    </div>
                    <div class="col-md-5 col-lg-2 d-xl-none mb-2">
                      <button class="btn btn-primary tambah-konsentrasi btn-lg btn-block"><i class="fas fa-plus"></i> Konsentrasi</button>
                    </div>
                    <div class="d-none d-sm-block d-sm-none d-md-block d-md-none d-md-block d-lg-none d-xl-block mb-2 ml-2">
                      <button class="btn btn-primary tambah-jurusan btn-lg btn-block"><i class="fas fa-plus"></i> Jurusan</button>
                    </div>
                    <div class="d-none d-sm-block d-sm-none d-md-block d-md-none d-md-block d-lg-none d-xl-block mb-2 ml-2">
                      <button class="btn btn-primary tambah-konsentrasi btn-lg btn-block"><i class="fas fa-plus"></i> Konsentrasi</button>
                    </div> 
                    <div class="col-lg-9 d-flex justify-content-end align-items-center">
                      <?php
                      if (isset($data)) {
                       if (($data == $fak) || ($data == $kon)) {
                        echo "<span class='badge badge-danger info'>Data Gagal Ditambahkan!</span>";
                      }elseif (($data < $fak) || ($data < $kon)) {
                        echo "<span class='badge badge-success info'>Data Berhasil Ditambahkan!</span>";
                      }
                    }
                    if ((isset($_GET['h_fak'])) || (isset($_GET['h_kon']))) {
                     echo "<span class='badge badge-warning info'>Data Berhasil Dihapus!</span>";
                   } 
                   ?>
                 </div>
               </div>
               <hr>
               <div class="col-lg-12 mb-2">
                <div class="form-input"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tampil-fakultas"></div>
    </div>
  </section>
</div>

<?php include ("../template/footer.php"); ?>

<script type="text/javascript">

  $(".info").show().fadeOut(3000);

  $(".tambah-jurusan").click(function(){
    $('.form-input').load('tambah-jurusan.php').hide().fadeIn(500);
  });

  $(".tambah-konsentrasi").click(function(){
    $('.form-input').load('tambah-konsentrasi.php').hide().fadeIn(500);
  });

  $('.tampil-fakultas').load('tampil-fakultas.php').hide().fadeIn(500);

</script>

</body>
</html>
