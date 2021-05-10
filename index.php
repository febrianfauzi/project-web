<?php
include "database/koneksi.php";
error_reporting(0);
if (isset($_POST['login'])) {
    // menangkap data yang dikirim dari form login
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];


    // menyeleksi data user dengan username dan password yang sesuai
  $login = mysqli_query($conn, "select * from user where user='$username' and password='$password'");
    // menghitung jumlah data yang ditemukan
  $cek = mysqli_num_rows($login);
    // cek apakah username dan password di temukan pada database
  if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

        // cek jika user login sebagai admin
    if ($data['user'] == $username && $data['password'] == $password) {
      session_start();
      if($data['role'] == 1){
        $_SESSION['users'] = "Admin";
        $_SESSION['id'] = $data['user'];
        $_SESSION['nama'] = $data['nama'];
        
            // alihkan ke halaman dashboard admin
        echo "<script>document.location.href='pages';alert('Login Berhasil Sebagai Admin');</script>";
      }elseif($data['role'] == 2){
        $_SESSION['users'] = "Dosen";
        $_SESSION['id'] = $data['user'];
        $_SESSION['nama'] = $data['nama'];
            // alihkan ke halaman dashboard admin
        echo "<script>alert('Login Berhasil Sebagai $data[nama]');document.location.href='pages/index-dosen.php';</script>";
      }elseif($data['role'] == 3){
        $_SESSION['users'] = "Mahasiswa";
        $_SESSION['id'] = $data['user'];
        $_SESSION['nama'] = $data['nama'];
            // alihkan ke halaman dashboard admin
        echo "<script>alert('Login Berhasil Sebagai $data[nama]');document.location.href='pages/index-mahasiswa.php';</script>";
      }
    } else {

            // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }
  } else {
    header("location:index.php?pesan=gagal");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SISTEM SKRIPSI</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <?php if(isset($_GET['pesan'])){if($_GET['pesan'] == "gagal"){ echo "<script>alert('Login Gagal');</script>";}} ?>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <span>Untuk Mahasiswa, silahkan login menggunakan <b>username(NIM)</b> dan <b>password(mahasiswa)</b>.</span><br><br>
                <span>Untuk Dosen, silahkan login menggunakan <b>username(NIDK)</b> dan <b>password(dosen)</b>.</span>
                <hr>
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">NIM/NIDK</label>
                    
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Username tidak boleh kosong
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Password tidak boleh kosong
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="login" value="login">Login</button>
                    <!-- <a href="pages" class="btn btn-primary btn-lg btn-block" tabindex="4">Login -->
                    </a>
                  </div>
                </form>
              </div>
              <div class="simple-footer">
                Copyright &copy; 2021
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
  </body>
  </html>
