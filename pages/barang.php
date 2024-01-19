<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Barang</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            <a href="?page=barang_add" class="btn btn-success" title="Tambah Data Barang" alt="Tambah Data Barang">
              <i class="fa fa-plus-square"></i>&nbsp; Add Barang
            </a>
          </h3>
          <form class="navbar-form navbar-right" role="search" method="get" action="">
            <div class="input-group pull-right">
              <input type="hidden" name="page" value="barang">
              <input type="text" class="form-control" value="<?php echo isset($_GET['qq']) ? $_GET['qq'] : ''; ?>" placeholder="Cari" name="qq">
              <div class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="5%">No.</th>
                <th>Nama Barang</th>
                <th>Stock</th>
                <th class="text-center" width="15%"><span class="glyphicon glyphicon-flash"></span></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query_search = '';

              if (isset($_GET['qq'])) {
                $query_search = " AND nama_barang LIKE '%" . $_GET['qq'] . "%'";
              }

              $mysqli = new mysqli("localhost", "root", "", "sisfobarang");

              // Check connection
              if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
              }

              $result = $mysqli->query("SELECT * FROM tb_barang WHERE 1 $query_search");

              if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td class="text-center">
                      <a href="?page=barang_edit&amp;idbarang=<?php echo $row['kd_barang']; ?>" class="btn btn-primary btn-sm" title="edit" alt="edit">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="?page=barang_act&amp;idbarang=<?php echo $row['kd_barang']; ?>&amp;act=delete" class="btn btn-danger btn-sm" title="delete" alt="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
              <?php
                  $i++;
                }
              }
              $mysqli->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End-Content Header (Page header) -->
