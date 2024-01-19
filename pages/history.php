<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    History
    <small>Data Proyek</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            <a href="pages/report_history.php" target="_blank" class="btn btn-warning" title="Cetak semua laporan proyek yang telah selesai" alt="Cetak semua laporan proyek yang telah selesai">
              <i class="fa fa-print"></i> Laporan History
            </a>
          </h3>
          <form class="navbar-form navbar-right" role="search" method="get" action="">
              <div class="input-group pull-right">
                <input type="hidden" name="page" value="history">
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
                <th>Nama Customer</th>
                <th class="hidden-xs">Alamat</th>
                <th class="hidden-xs">Kontak</th>
                <th>Tanggal Proyek</th>
                <th class="text-center" width="10%"><span class="glyphicon glyphicon-flash"></span></th>
              </tr>
            </thead>
            <tbody>
            <?php
              $query_search = '';

              if (isset($_GET['qq'])) {
                $query_search = " AND customer LIKE '%" .  $_GET['qq']. "%'";
              }
              
              $q = mysql_query( "SELECT * FROM tb_project WHERE status = 'selesai' $query_search order by kd_project desc" );
              $i = 1;
              while ( $r = mysql_fetch_assoc( $q ) ) {
            ?>
   
            <?php
              if ( isset( $_GET['act'] ) ) {
                $act = $_GET['act'];
                               
               if ( $act = 'delete' ) {
                  $q = mysql_query( "DELETE FROM tb_project WHERE kd_project = '$_GET[idproses]'" );
                  
                  header( 'location:index.php?page=history' );
                }
              }
            ?>

              <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td  style="text-transform: capitalize;"><?php echo $r['customer']; ?></td>
                <td class="hidden-xs" style="text-transform: capitalize;"><?php echo $r['alamat']; ?></td>
                <td class="hidden-xs"><?php echo $r['no_telepon']; ?></td>
                <td><?php echo date( 'd-m-Y', strtotime( $r['tgl_project'] ) ); ?></td>
                <td class="text-center">
                <a href="?page=project_detail&amp;idproses=<?php echo $r['kd_project']; ?>&amp;back=history" class="btn btn-primary btn-sm" title="Rincian laporan proyek" alt="Rincian laporan proyek">
                  <i class="glyphicon glyphicon-th-list"></i>
                </a>
                <a href="?page=history&amp;idproses=<?php echo $r['kd_project']; ?>&amp;act=delete" class="btn btn-danger btn-sm" title="Hapus laporan" alt="Hapus laporan" onclick="return confirm('Are you sure you want to delete this item?');" >
                  <span class="glyphicon glyphicon-trash" ></span>
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
