<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Detail Proyek
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Proyek</h3>
        </div>
        <div class="box-body" style="text-transform: capitalize;">
          <?php
          $kd_proses = isset($_GET['idproses']) ? $_GET['idproses'] : '';

          // Gunakan koneksi database yang sudah Anda miliki
          $host = "localhost";
          $username = "root";
          $password = "";
          $database = "sisfobarang";

          $conn = new mysqli($host, $username, $password, $database);

          // Periksa koneksi
          if ($conn->connect_error) {
              die("Koneksi database gagal: " . $conn->connect_error);
          }

          $query = "SELECT * FROM tb_project 
                      LEFT JOIN tb_customer ON (tb_project.kd_project = tb_customer.kd_customer) 
                      WHERE tb_project.kd_project = '$kd_proses'";
          $result = $conn->query($query);

          while ($r = $result->fetch_assoc()) {
          ?>
            <b>Kode Proyek</b>: <?php echo $r['kd_project']; ?><br>
            <b>Tanggal proyek</b>: <?php echo date('d-m-Y', strtotime($r['tgl_project'])); ?><br>
            <b>Tanggal batas proyek</b>: <?php echo date('d-m-Y', strtotime($r['tgl_bts'])); ?><br>
            <b>Status</b>: <?php echo $r['status']; ?><br>
            <i>-----------------------------------------------------</i><br>
            <b>Nama</b>: <?php echo $r['customer']; ?><br>
            <b>Alamat</b>: <?php echo $r['alamat']; ?><br>
            <b>Kontak</b>: <?php echo $r['no_telepon']; ?><br>
          <?php
          }

          // Tutup koneksi
          $conn->close();
          ?>

          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="5%">No.</th>
                <th>Nama Barang</th>
                <th class="text-center" width="10%">QTY</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $qb = $conn->query("SELECT * FROM tb_detail 
                                LEFT JOIN tb_barang ON (tb_detail.kd_barang = tb_barang.kd_barang)
                                WHERE tb_detail.kd_project = '$kd_proses'");
              $i = 1;
              while ($rb = $qb->fetch_assoc()) {
              ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $rb['nama_barang']; ?></td>
                  <td class="text-center"><?php echo $rb['jml_barang']; ?></td>
                </tr>
              <?php
                $i++;
              }
              ?>
            </tbody>
          </table>
          <?php
          if (isset($_GET['back']) && $_GET['back'] == 'history') {
            $page = 'history';
          } else {
            $page = 'project';
          }
          ?>
          <a href="index.php?page=<?php echo $page; ?>" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
