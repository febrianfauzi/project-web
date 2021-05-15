<?php session_start();
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Chat list</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet"> -->
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/components.css">
  <link rel="stylesheet" href="chat.css" media="none" onload="if(media!='all')media='all'">
</head>

<body onload="inisiasi()">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>

        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="<?php echo $_SESSION['picture']; ?>" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?php echo $_SESSION['nama']; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="../../logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="../index.php">Sistem Skripsi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="../index.php">SS</a>
          </div>
          <ul class="sidebar-menu">
      <li><a class="nav-link" href="../index.php"><i class="fas fa-university"></i> <span>Beranda</span></a></li>
      <li><a class="nav-link" href="../mahasiswa.php"><i class="fas fa-graduation-cap"></i> <span>Mahasiswa</span></a></li>
      <li><a class="nav-link" href="../dosen.php"><i class="fas fa-chalkboard-teacher"></i> <span>Dosen</span></a></li>
      <li class="active"><a class="nav-link" href="chatAdmin.php"><i class="fas fa-comment-dots"></i> <span>Pesan</span></a></li>
    </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Chat list <?php echo $_SESSION['users'] ?></h1>
          </div>

          <div class="section-body">
            <!-- awal list chat -->
            <div class="messaging">
              <div class="inbox_msg">
                <div class="inbox_people">
                  <div class="headind_srch">
                    <div class="recent_heading">
                      <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                      <div class="stylish-input-group">
                        <input type="text" id="keyword" class="search-bar" onkeyup="cariTemanObrolan()" placeholder="Masukan NIDN / NIM">
                        <span class="input-group-addon">
                          <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="inbox_chat">
                    <?php
                    if ($role != 1) {
                    ?>
                      <div class="chat_list">
                        <div class="chat_people" style="cursor: pointer;" onclick="manage('admin')">
                          <div class="chat_img">
                            <img src="https://ptetutorials.com/images/user-profile.png" alt="">
                          </div>
                          <div class="chat_ib">
                            <h5>Admin<span class="chat_date"></span></h5>
                            <p></p>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div id="daftarObrolan">
                      <!-- buat list teman -->
                    </div>

                    <!-- <div class="chat_list active_chat">
                      <div class="chat_people">
                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="chat_ib">
                          <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                          <p>Test, which is a new approach to have all solutions
                            astrology under one roof.</p>
                        </div>
                      </div>
                    </div> -->

                  </div>
                </div>
                <div class="mesgs">
                  <div class="msg_history">

                    <div id="chating">
                      <!-- buat chat history -->
                    </div>

                    <!-- <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div> -->

                  </div>

                  <div class="type_msg">
                    <div class="input_msg_write">

                      <input type="text" class="write_msg" id="pesan" placeholder="Type a message" />
                      <button class="msg_send_btn" type="button" onclick="kirimPesan()"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- akhir list chat -->

          </div>
        </section>
      </div>


      <footer class="main-footer">
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../../assets/js/scripts.js"></script>
  <script src="../../assets/js/custom.js"></script>
  <script src="java.js"></script>
  <!-- Page Specific JS File -->
</body>

</html>