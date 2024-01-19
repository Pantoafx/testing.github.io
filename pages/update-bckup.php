
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ubah
    <small>Data Proyek</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Data Proyek</h3>
        </div>
        <form method="POST" name="formdata" action="?page=project_act&amp;act=update">
          <?php
            $kdproses = $_GET['idproses'];
            
            $q = mysql_query( "SELECT * FROM tb_project WHERE kd_project = '$kdproses'" );
            $r = mysql_fetch_assoc( $q );  
          ?>
          <div class="box-body cap">
            <div class="form-group">
              <label>nama customer</label>
              <select type = "text" class="form-control cap" id="nama" name="nama">
                <option value="<?php echo $r['customer']; ?>">
                  <?php echo $r['customer']; ?>
                </option>
                  <?php
                    $qq = mysql_query( "SELECT * FROM tb_customer order by kd_customer desc" );
                      while ( $rr = mysql_fetch_assoc( $qq ) ) {
                  ?>
                <option value="<?php echo $rr['customer']; ?>">
                  <?php 
                        echo $rr['nama_customer']; 
                      } 
                  ?>
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">alamat</label>
              <input type="text" class="form-control" value="<?php echo $r['alamat']; ?>" id="alamat" name="alamat">
            </div>
            <div class="form-group">
              <label for="no_telepon">Kontak</label>
              <input type="text" class="form-control" value="<?php echo $r['no_telepon']; ?>" id="no_telepon" name="no_telepon">
            </div>
            <div class="form-group">
              <label for="tgl_project">Tanggal Project</label>
              <input type="text" class="form-control" value="<?php  echo date( 'd-m-Y', strtotime( $r['tgl_project'] ) ); ?>" id="tgl_project" name="tgl_project">
           </div>
          </div>
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="Simpan" onClick="location.href='?page=project_act&amp;act=update'">
            <!-- onclick="return confirm('Are you sure you want to save this project?'); -->
            <input type="button" class="btn btn-default" onClick="location.href='?page=project'" value="Batal">
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->



<!-- +++++++ husssss  ++++++ -->



<?php
  $kdproses = $_GET['idproses'];
  
  $q = mysql_query( "SELECT * FROM tb_project WHERE kd_project = '$kdproses'" );
  $r = mysql_fetch_assoc( $q );  
?>
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
          <h3 class="box-title">Form Data Proyek</h3>
        </div>
        <form method="post" name="formdata" action="?page=project_act&amp;act=edit">
          <div class="box-body cap">
            <div class="form-group">
              <input type="hidden" name="kd_project" id="kd_project" value="<?php echo $r['kd_project']; ?>">
              <label>Nama customer</label>
              <select type = "text" class="form-control cap" id="customer" name="customer">
                <option value="<?php echo $r['customer']; ?>">
                  <?php echo $r['customer']; ?>
                </option>
                <?php
                  $qq = mysql_query( "SELECT * FROM tb_customer order by kd_customer desc" );
                  while ( $rr = mysql_fetch_assoc( $qq ) ) {
                ?>
                <option value="<?php echo $rr['nama_customer']; ?>">
                  <?php 
                    echo $rr['nama_customer']; 
                   } 
                  ?>
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" value="<?php echo $r['alamat']; ?>" id="alamat" name="alamat">
            </div>
            <div class="form-group">
              <label for="no_telepon">Kontak</label>
              <input type="text" class="form-control" value="<?php echo $r['no_telepon']; ?>" id="no_telepon" name="no_telepon">
            </div>
            <div class="form-group">
              <label for="tgl_project">Tanggal Project</label>
              <input type="text" class="form-control" value="<?php echo $r['tgl_project']; ?>" id="tgl_project" name="tgl_project">
           </div>
          </div>
          <!-- == barang == -->
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
                  $qb = mysql_query( "SELECT * FROM tb_detail 
                                      LEFT JOIN tb_barang ON (tb_detail.kd_barang = tb_barang.kd_barang)
                                      WHERE tb_detail.kd_project = '$kdproses'" );
                  $i=1;
                 while ($rb = mysql_fetch_assoc($qb))  {
                ?>
<!--                   <tr>
                    <td class="text-center">
                      <input type="checkbox" name="check[]" value="<?php //echo $rb['kd_barang']; ?>">
                      <input type="hidden" name="kd_barang[]" value="<?php //echo $rb['kd_barang']; ?>">
                    </td>
                    <td class="text-center"><?php //echo $i; ?></td>
                    <td  style="text-transform: capitalize;"><?php //echo $rb['nama_barang'];?></td>
                    <td class="text-center"><?php //echo $rb['jml_barang'];?></td>
                  </tr> -->
                <?php 
                   $i++;    
                  }
                ?>
                  <?php 
                    $qbb = mysql_query( "SELECT * FROM tb_barang WHERE stock > 0" );
                    $ib = 1;
                    while ( $rbb = mysql_fetch_assoc( $qbb ) ) {
                   ?>
                    <?php 
                      $qb = mysql_query( "SELECT * FROM tb_detail 
                                LEFT JOIN tb_barang ON (tb_detail.kd_barang = tb_barang.kd_barang)
                                WHERE tb_detail.kd_project = '$kdproses'" );
                      $rb = mysql_fetch_assoc($qb);
                      $check = $_POST['check'];
                  ?>
                  <tr>
                    <td class="text-center">
                      <input <?php if ( $rb['kd_barang'] == $check[$i]){ echo"checked"; } ?> type="checkbox" name="check[]" value="<?php echo $rb['kd_barang']; ?>">
                      <!-- <input type="checkbox" name="check[]" value="<?php echo $rb['kd_barang']; ?>"> -->
                      <input type="hidden" name="kd_barang[]" value="<?php echo $rb['kd_barang']; ?>">
                    </td>
                    <td class="text-center"><?php echo $ib; ?></td>
                    <td  style="text-transform: capitalize;"><?php echo $rbb['nama_barang'];?></td>
                    <td class="text-center">
                      <select>
                        <!-- <option value="<?php //echo $rb['jml_barang']; ?>"><?php //echo $rb['jml_barang']; ?></option>'; -->
                        <?php
                          $ss = $rb['jml_barang'];
                          for ( $iss=1; $iss<=$ss; $iss++ ) {
                        ?>
                          <option value="<?php echo $iss; ?>"><?php echo $iss; ?></option>';
                        <?php 
                          }
                        ?>
                        <!-- ===================== -->
                        <?php
                          $s = $rbb['stock'];
                          for ( $is=1; $is<=$s; $is++ ) {
                        ?>
                          <option value="<?php echo $is; ?>"><?php echo $is; ?></option>';
                        <?php 
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
          <!-- == barang == -->
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" name="btn-edit" value="Simpan">
            <!-- <input type="submit" class="btn btn-primary" name="btn-tambah" value="Simpan" onclick="return confirm('Are you sure want to edit this project ?');"> -->
            <input type="button" class="btn btn-default" onClick="location.href='?page=project'" value="Batal">
          </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->

