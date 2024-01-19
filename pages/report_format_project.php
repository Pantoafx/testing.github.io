<?php include( '../includes/config.php' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Proyek</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../dist/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="favicon.ico" href="..dist/img/gmain-logo.png" sizes="32x32" />
  </head>
  <body>
    <div class="container">
      <section class="row">
        <article class="col-md-12">
          <section class="content-header">
            <img src="../dist/img/logo-gading4.net.jpg" style="width: 40%; margin-top: 20px; margin-bottom: 20px; float: left;" class="img-square" alt="User Image">
            <?php
            $kdproses = $_GET['idproses'];
            $qa = mysql_query( "SELECT * FROM tb_project 
                       LEFT JOIN tb_customer on (tb_project.kd_project=tb_customer.kd_customer) 
                       WHERE tb_project.kd_project = '$kdproses'");
            $iii= 1;
            while ($ra = mysql_fetch_assoc( $qa ) ){
            ?>
          <div style="margin: 0 0 0 200px; padding-top:18px; clear: both;">
            <b>Kode Proyek </b>: <?php echo $ra['kd_project']; ?><br>
            <b>Tanggal Proyek</b> : <?php  echo date( 'd-m-Y', strtotime( $ra['tgl_project'] ) ); ?><br>
          </div>
          </section>
          <div class="box-body text-center">
            <h2 style="border-bottom: 1px dotted #1a1a1a; padding-bottom: 15px;  width: 50%; margin: 0 auto;">
              Laporan <small>Pelaksanaan Proyek</small>
            </h2>
          </div>
          <div class="box-body" style="text-transform: capitalize; margin-top: 20px;">
            <b>Nama</b>    : <?php echo $ra['customer']; ?><br>
            <b>Alamat</b>  : <?php echo $ra['alamat']; ?><br>
            <b>Kontak</b>  : <?php echo $ra['no_telepon']; ?><br><br>
          </div>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="5%" style="background-color: #2b2b2b; color: #ececec; padding: 4px;">No.</th>
                <th style="text-transform: capitalize;" style="background-color: #2b2b2b; color: #ececec; padding: 4px;">Nama Barang</th>
                <th class="text-center" width="10%" style="background-color: #2b2b2b; color: #ececec; padding: 4px;">QTY</th>
                <th class="text-center" width="10%" style="background-color: #2b2b2b; color: #ececec; padding: 4px;">Check</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $qb = mysql_query( "SELECT * FROM tb_project 
                                  inner join tb_detail on tb_project.kd_project = tb_detail.kd_project
                                  inner JOIN tb_barang ON (tb_detail.kd_barang = tb_barang.kd_barang)
                                  WHERE tb_detail.kd_project ='$kdproses'" );
              $i=1;
             while ($rb = mysql_fetch_assoc($qb))  {
            ?>
            <tr>
              <td class="text-center" style="padding: 4px;"><?php echo $i; ?></td>
              <td class="text-left" style="padding: 4px;"><?php echo $rb['nama_barang'];?></td>
              <td class="text-center" style="padding: 4px;"><?php echo $rb['jml_barang'];?></td>
              <td></td>
            </tr>
            <?php 
               $i++;    
                }
            ?>
            </tbody>
          </table>
          <?php $iii++; } ?>
          <hr>
          <div class="text-center" style="margin-top: 60px; margin-bottom: 40px;">
            <b>Mengetahui,</b>
          </div>
          <table class="text-center" width="100%">
            <thead>
            <tr>
              <td style="padding-bottom: 80px;" width="50%"><b>PT.Gading4.Net</b></td>
              <td style="padding-bottom: 80px;" width="50%"><b>Pelanggan</b></td>
            </tr>
            <tr>
            <?php
            $kdproses = $_GET['idproses'];
            $qa = mysql_query( "SELECT * FROM tb_project 
                       LEFT JOIN tb_customer on (tb_project.kd_project= tb_customer.kd_customer) 
                       WHERE tb_project.kd_project = '$kdproses'");
            while ($ra = mysql_fetch_assoc( $qa ) ){
            ?>
              <td style="" width="50%"><b>( Mahasuri Jamesie )</b></td>
              <td style="" width="50%"><b>(  <?php echo $ra['customer']; ?> )</b></td>
            <?php } ?>
            </tr>
            </thead>
          </table>
        </article>
      </section>
    </div>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

