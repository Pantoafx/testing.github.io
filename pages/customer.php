<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Pelanggan</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><a href="?page=customer_add" class="btn btn-success" title="Tambah Data Pelanggan" alt="Tambah Data Pelanggan"><i class="fa fa-user-plus"></i>&nbsp; Add Pelanggan</a></h3>
          <form class="navbar-form navbar-right" role="search" method="get" action="">
              <div class="input-group pull-right">
                <input type="hidden" name="page" value="customer">
                <input type="text" class="form-control" value="<?php echo isset($_GET['qq']) ? $_GET['qq'] : ''; ?>" placeholder="Cari" name="qq">
                <div class="input-group-btn">
                  <button class="btn btn-primaryme" type="submit">
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
                <th>Nama Pelanggan</th>
                <th class="text-center" width="15%"><span class="glyphicon glyphicon-flash"></span></th>
              </tr>
            </thead>
            <tbody>
            <?php
             $query_search = '';

              if (isset($_GET['qq'])) {
                $query_search = " AND nama_customer LIKE '%" .  $_GET['qq']. "%'";
              }
              $q = mysql_query( "SELECT * FROM tb_customer where kd_customer $query_search order by kd_customer desc" );
              $i = 1;
              while ( $r = mysql_fetch_assoc( $q ) ) {
            ?>
              <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td style="text-transform: capitalize;"><?php echo $r['nama_customer'];?></td>
                <td class="text-center">
                  <a href="?page=customer_edit&amp;idcustomer=<?php echo $r['kd_customer']; ?>" class="btn btn-primary btn-sm" title="edit" alt="edit">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="?page=customer_act&amp;idcustomer=<?php echo $r['kd_customer']; ?>&amp;act=delete" class="btn btn-danger btn-sm" title="delete" alt="delete" onclick="return confirm('Are you sure you want to delete customer ?');">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php
                $i++;
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->