<?php 
include ("../database/koneksi.php");
?>

<style type="text/css">
  .my-custom-scrollbar {
    position: relative;
    height: 420px;
    overflow: auto;
  }
  .table-wrapper-scroll-y {
    display: block;
  }
</style>
<div class="row">
  <div class="col-md-4">
    <div class="card card-hero">
      <div class="card-header">
        <h4>Fakultas</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <table class="table table-striped">
            <tr>
              <th scope="col">Kode Fakultas</th>
              <th scope="col">Fakultas</th>
            </tr>
            <tbody>
              <?php 
              $data = mysqli_query($conn,"select * from fakultas");
              while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $d['id_fak'] ?></td>
                  <td class="font-weight-600"><?php echo $d['fakultas'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-hero">
      <div class="card-header">
        <h4>Konsentrasi</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <table class="table table-striped mb-0">
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>