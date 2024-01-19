<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Barang
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
        <form method="post" action="?page=barang_act&amp;act=insert">
          <div class="box-body">
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang">
            </div>
            <div class="form-group">
              <label for="stock_barang">Stock Barang</label>
              <input type="text" class="form-control" id="stock_barang" name="stock_barang">
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