<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small> Data Proyek</small>
  </h1>
</section>

<!-- Main content -->
                         
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            <a href="?page=project_add" class="btn btn-success" title="Tambah proyek baru" alt="Tambah proyek baru">
              <i class="fa fa-plus-square"></i>&nbsp; Add Proyek
            </a>&nbsp;&nbsp;
            <a href="pages/report_allproject.php" target="_blank" class="btn btn-warning" title="Cetak semua data proyek yang belum selesai" alt="Cetak semua data proyek yang belum selesai">
              <i class="fa fa-print"></i>&nbsp; Laporan Proyek
            </a>
          </h3>
          <!-- <div class="pull-right"> -->
            <form class="navbar-form navbar-right" role="search" method="get" action="">
              <div class="input-group pull-right">
                <input type="hidden" name="page" value="project">
                <input type="text" class="form-control" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>" placeholder="Cari" name="q">
                <div class="input-group-btn">
                  <button class="btn btn-primaryme" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          <!-- </div> -->
        </div>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center" width="5%">No.</th>
                <th>Nama Pelanggan</th>
                <th class="hidden-xs">Alamat</th>
                <th class="hidden-xs">Kontak</th>
                <th>Tanggal proyek</th>
                <th>Batas proyek</th>
                <th class="text-center" width="23%">
                  <i class="glyphicon glyphicon-flash"></i>
                </th>
              </tr>
            </thead>
            <tbody>
           <?php
              $query_search = '';

              if (isset($_GET['q'])) {
                $query_search = " AND customer LIKE '%" .  $_GET['q']. "%'";
              }
              
              $q = mysql_query( "SELECT * FROM tb_project WHERE status = 'proses' $query_search  order by kd_project desc" );
              $i = 1;
              while ( $r = mysql_fetch_assoc( $q ) ) {
            ?>
              <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td style="text-transform: capitalize;"><?php echo $r['customer'];?></td>
                <td class="hidden-xs" style="text-transform: capitalize;"><?php echo $r['alamat']; ?></td>
                <td class="hidden-xs"><?php echo $r['no_telepon']; ?></td>
                <td><?php echo date( 'd-m-Y', strtotime( $r['tgl_project'] ) ); ?></td>
                <td><?php echo date( 'd-m-Y', strtotime( $r['tgl_bts'] ) ); ?></td>
                <td class="text-center">
                  <a href="?page=project_edit&amp;idproses=<?php echo $r['kd_project']; ?>" class="btn btn-primaryme btn-sm" title="Edit Proyek">
                    <i class="glyphicon glyphicon-pencil"></i>
                     <!-- onclick="return confirm('Are you sure to edit this project ?');" -->
                  </a>
                  <a href="?page=project_detail&amp;idproses=<?php echo $r['kd_project']; ?>" class="btn btn-primary btn-sm" title="Detail Proyek Berjalan">
                    <i class="glyphicon glyphicon-th-list"></i>
                  </a>
                  <a href="pages/report_project.php?idproses=<?=$r['kd_project'];?>" target="_blank" class="btn btn-warning btn-sm" title="Cetak Detail Proyek">
                    <i class="fa fa-print"></i>
                  </a>
                  <a href="?page=project_act&amp;act=batal&amp;idproses=<?php echo $r['kd_project']; ?>" class="btn btn-danger btn-sm" title="Batalkan proyek" onclick="return confirm('Are you sure to cancel this project ?');" >
                    <i class="fa fa-times"></i>
                  </a>
                  <a href="?page=project_act&amp;act=selesai&amp;idproses=<?php echo $r['kd_project']; ?>" class="btn btn-success btn-sm" title="Proyek selesai" onclick="return confirm('Are you sure this project already success ?');" >
                    <i class="glyphicon glyphicon-ok"></i>
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
