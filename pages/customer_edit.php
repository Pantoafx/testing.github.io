<?php
  $idcustomer = $_GET['idcustomer'];
  
  $q = mysql_query( "SELECT * FROM tb_customer WHERE kd_customer = '$idcustomer'" );
  $r = mysql_fetch_assoc( $q );
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit customer
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data customer</h3>
        </div>
        <form method="post" action="?page=customer_act&amp;act=edit">
          <input type="hidden" name="idcustomer" value="<?php echo $r['kd_customer']; ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="nama_customer">Nama customer</label>
              <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?php echo $r['nama_customer']; ?>">
            </div>
          </div>
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
            <input type="button" class="btn btn-default" onClick="location.href='?page=customer'" value="Batal">
          </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->