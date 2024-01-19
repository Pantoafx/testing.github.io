<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah
    <small>Data Proyek</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Proyek Baru</h3>
        </div>
        <form method="post" name="formdata" action="?page=project_act&amp;act=insert">
          <div class="box-body">
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <select type = "text" class="form-control" id="customer" name="customer" required="">
                <?php
                  $q = mysql_query( "SELECT * FROM tb_customer ORDER BY kd_customer DESC;" );
                  while ( $r = mysql_fetch_assoc( $q ) ) {
                ?>
                <option value="<?php echo $r['nama_customer']; ?>">
                  <?php echo $r['nama_customer']; ?></option>
              <?php
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="form-group">
              <label for="no_telepon">Kontak</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon">
            </div>
            <div class="form-group">
              <label for="tgl_project">Tanggal Proyek</label>
              <input type="text" class="form-control" id="tgl_project" name="tgl_project">
            </div>
            <div class="form-group">
              <label for="tgl_bts">Tanggal Batas Proyek</label>
              <input type="text" class="form-control" id="tgl_bts" name="tgl_bts">
            </div>
          </div>
          <div class="box-header with-border">
            <h3 class="box-title">List Order Barang</h3>
          </div>
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="text-center" width="5%">
                    <input type="checkbox" id="checkAll" name="checkAll" onchange="toggleCheckBox(this,'check[]')">
                  </th>
                  <th class="text-center" width="5%">No.</th>
                  <th>Nama Barang</th>
                  <th class="text-center" width="20%">QTY</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $qb = mysql_query( "SELECT * FROM tb_barang WHERE stock > 0" );
                $ib = 1;
                while ( $rb = mysql_fetch_assoc( $qb ) ) {
              ?>
                <tr>
                  <td class="text-center">
                    <input type="checkbox" name="check[]" value="<?php echo $rb['kd_barang']; ?>">
                    <input type="hidden" name="kd_barang[]" value="<?php echo $rb['kd_barang']; ?>">
                  </td>
                  <td class="text-center"><?php echo $ib; ?></td>
                  <td><?php echo $rb['nama_barang']; ?></td>
                  <td class="text-center" width="20%">
                    <select name="stock[]">
                    <?php
                      $s = $rb['stock'];
                      for ( $i=1; $i<=$s; $i++ ) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                      }
                    ?>
                    </select>
                  </td>
                </tr>
              <?php
                  $ib++;
                }
              ?>
              </tbody>
            </table>
          </div>
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" name="btn-tambah" value="Simpan" onclick="return confirm('Are you sure you want to save this project ?');">
            <input type="button" class="btn btn-default" onClick="location.href='?page=project'" value="Batal">
          </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->

