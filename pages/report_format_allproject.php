<?php include( '../includes/config.php' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Daftar Proyek</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="favicon.ico" href="..dist/img/gmain-logo.png" sizes="32x32" />
  </head>
  <body>
    <div class="container">
      <section class="row">
        <article class="col-md-12">
          <section class="content-header">
            <img src="../dist/img/logo-gading4.net.jpg" style="width: 40%; margin-top: 20px; margin-bottom: 30px;" class="img-square" alt="User Image">
          </section>
          <div class="box-body text-center">
            <h2 style="border-bottom: 1px dotted #1a1a1a; padding-bottom: 15px; width: 50%; margin: 0 auto;">
              Laporan <small>Proyek</small>
            </h2><br><br>
          </div>
          <?php

          $qa = mysql_query( "SELECT * FROM tb_project 
                     LEFT JOIN tb_customer on (tb_project.kd_project= tb_customer.kd_customer) 
                     WHERE status='proses' group by tb_project.kd_project");
          $iii= 1;
          while ($ra = mysql_fetch_assoc( $qa ) ){
          $kdproses = $ra['kd_project'];
          ?>
          <div class="box-body text-center">
            <b>Proyek <?php echo $iii; ?></b><br>
          </div>
          <div class="box-body"  style="text-transform: capitalize;">
            <b>Nama   </b>: <?php echo $ra['customer']; ?><br>
            <b>Alamat </b>: <?php echo $ra['alamat']; ?><br>
            <b>Kontak </b>: <?php echo $ra['no_telepon']; ?><br>
            <b>Tanggal Proyek </b>: <?php  echo date( 'd-m-Y', strtotime( $ra['tgl_project'] ) ); ?><br><br>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center" style="background-color: #2b2b2b; color: #ececec; padding: 4px;" width="5%">No.</th>
              <th class="text-left" style="background-color: #2b2b2b; color: #ececec; padding: 4px;">Nama Barang</th>
              <th class="text-center" style="background-color: #2b2b2b; color: #ececec; padding: 4px;" width="10%">QTY</th>
              <th class="text-center" style="background-color: #2b2b2b; color: #ececec; padding: 4px;" width="10%">Check</th>
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
              <td class="text-center"  style="padding: 4px;"><?php echo $i; ?></td>
              <td class="text-left"  style="padding: 4px; text-transform: capitalize;"><?php echo $rb['nama_barang'];?></td>
              <td class="text-center"  style="padding: 4px;"><?php echo $rb['jml_barang'];?></td>
              <td></td>
            </tr>
          <?php 
             $i++;    
              }
          ?>
          </tbody>
        </table>
        <hr>
        <?php $iii++; } ?>
        </article>
      </section>
    </div>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

