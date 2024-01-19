<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah customer
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
         <form method="post" action="?page=customer_act&amp;act=insert">
          <div class="box-body">
            <div class="form-group">
              <label for="nama_customer">Nama customer</label>
              <input type="text" class="form-control" id="nama_customer" name="nama_customer">
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