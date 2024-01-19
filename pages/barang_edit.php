<?php
  $idbarang = $_GET['idbarang'];
  
  $q = mysql_query( "SELECT * FROM tb_barang WHERE kd_barang = '$idbarang'" );
  $r = mysql_fetch_assoc( $q );
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Barang
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Barang</h3>
        </div>
        <form method="post" action="?page=barang_act&amp;act=edit">
          <input type="hidden" name="idbarang" value="<?php echo $r['kd_barang']; ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $r['nama_barang']; ?>">
            </div>
            <div class="form-group">
              <label for="stock_barang">Stock Barang</label>
              <input type="number" class="form-control" id="stock_barang" name="stock_barang" value="<?php echo $r['stock']; ?>">
            </div>
          </div>
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
            <input type="button" class="btn btn-default" onClick="location.href='?page=barang'" value="Batal">
          </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->