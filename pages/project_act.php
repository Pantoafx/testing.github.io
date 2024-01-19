<?php
  if ( isset( $_GET['act'] ) ) {
    $act = $_GET['act'];
  
    if ( $act == 'insert' ) {

      $nama      = $_POST['customer'];
      $alamat    = $_POST['alamat'];
      $kontak    = $_POST['no_telepon'];
      $tgl_project  = $_POST['tgl_project'];
      $tgl_bts  = $_POST['tgl_bts'];
      
      $q = mysql_query( "INSERT INTO tb_project SET customer = '$nama', 
                                                    alamat = '$alamat', 
                                                    no_telepon = '$kontak', 
                                                    tgl_project = '$tgl_project',
                                                    tgl_bts = '$tgl_bts', 
                                                    status = 'proses'" );
      
      $qt = mysql_query( "SELECT kd_project FROM tb_project ORDER BY kd_project DESC LIMIT 1" );
      $rt = mysql_fetch_assoc( $qt );
      
      $kd_kerja = $rt['kd_project'];
      $check = $_POST['check'];
      $jumlah = count( $check );
      $kd_barang = $_POST['kd_barang'];
      $stock = $_POST['stock'];
      
      if ( $check > 0 ) {
        for ( $i=0; $i<$jumlah; $i++ ) {
          foreach ($kd_barang as $keyb => $valb) {
            if ( $check[$i] == $valb ) {
              foreach ($stock as $keys => $vals) {
                if ( $keyb == $keys ) {
                  echo $keys . '<br>';
                  $qd = mysql_query( "INSERT INTO tb_detail SET kd_project = '$kd_kerja', 
                                                        kd_barang    = '$check[$i]', 
                                                        jml_barang   = '$vals'" );
                  $qb = mysql_query( "UPDATE tb_barang SET stock = stock-$vals WHERE kd_barang = $check[$i]" );
                }
              }
            }
          }
        }
      }
      header( 'location:index.php?page=project' );
    }
// == edit-code == 
    elseif ( $act == 'edit' ) {

      $kdproses = $_POST['kd_project'];
      $nama       = $_POST['customer'];
      $alamat     = $_POST['alamat'];
      $kontak     = $_POST['no_telepon'];
      $tgl_project  = $_POST['tgl_project'];
      $tgl_bts  = $_POST['tgl_bts'];
      
      $b = mysql_query( "UPDATE tb_project SET  customer = '$nama', 
                                                alamat = '$alamat', 
                                                no_telepon = '$kontak', 
                                                tgl_project = '$tgl_project',
                                                tgl_bts = '$tgl_bts'
                                          WHERE kd_project = '$kdproses'" );

      //=== barang-code ===
      // $qt = mysql_query( "SELECT * FROM tb_project 
      //                                 INNER JOIN tb_detail ON tb_project.kd_project = tb_detail.kd_project
      //                                 INNER JOIN tb_barang ON (tb_detail.kd_barang = tb_barang.kd_barang)
      //                                 WHERE tb_detail.kd_project ='$kdproses'" );
      // $rt = mysql_fetch_assoc( $qt );
      
      // $kd_kerja = $rt['kd_project'];
      // $check = $_POST['check'];
      // $jumlah = count( $check );
      // $kd_barang = $_POST['kd_barang'];
      // $stock = $_POST['stock'];
      
      // if ( $check > 0 ) {
      //   for ( $i=0; $i<$jumlah; $i++ ) {
      //     foreach ($kd_barang as $keyb => $valb) {
      //       if ( $check[$i] == $valb ) {
      //         foreach ($stock as $keys => $vals) {
      //           if ( $keyb == $keys ) {
      //             echo $keys . '<br>';
      //             $qd = mysql_query( "UPDATE tb_detail SET kd_barang    = '$check[$i]', 
      //                                                      jml_barang   = '$vals'
      //                                                WHERE kd_project = '$kd_kerja'" );

      //             $qb = mysql_query( "UPDATE tb_barang SET stock = stock-$vals WHERE kd_barang = $check[$i]" );
      //           }
      //         }
      //       }
      //     }
      //   }
      // }
      //=== barang-code ===
      header( 'location:index.php?page=project' );
    }
// == edit-code == 

    elseif ( $act == 'selesai' ) {
      $q = mysql_query( "SELECT * FROM tb_detail WHERE kd_project = '$_GET[idproses] '" );
      while ( $r = mysql_fetch_assoc( $q ) ) {
        $kdproses = $r['kd_project'];
        $kdbarang = $r['kd_barang'];
        $jml_barang = $r['jml_barang'];
      }
      
      $b = mysql_query( "UPDATE tb_project SET status = 'selesai' WHERE kd_project = '$_GET[idproses]'" );
      
      header( 'location:index.php?page=project' );

    }
    
    elseif ( $act == 'batal' ) {
      $q = mysql_query( "SELECT * FROM tb_detail WHERE kd_project = '$_GET[idproses] '" );
      while ( $r = mysql_fetch_assoc( $q ) ) {
        $kdproses = $r['kd_project'];
        $kdbarang = $r['kd_barang'];
        $jml_barang = $r['jml_barang'];
        $k = mysql_query( "UPDATE tb_barang SET stock = stock+$jml_barang WHERE kd_barang = '$kdbarang'" );
      }
        $b = mysql_query( "UPDATE tb_project SET status = 'batal' WHERE kd_project = '$_GET[idproses]'" );
      
      header( 'location:index.php?page=project' );
    }

    }
?>

<?php 

      // $q = mysql_query( "UPDATE tb_project SET customer = '$nama', 
      //                                          alamat = '$alamat', 
      //                                          no_telepon = '$kontak', 
      //                                          tgl_project = '$tgl_project',         
      //                                    WHERE kd_project = '$kdproses'" );


      // $kd_proses = $_GET['idproses'];

      // $qb = mysql_query( "SELECT * FROM tb_detail LEFT JOIN tb_barang 
      //                     ON (tb_detail.kd_barang = tb_barang.kd_barang)
      //                     WHERE tb_detail.kd_project = '$kd_proses'" );

      // $nama      = $_POST['customer'];
      // $alamat    = $_POST['alamat'];
      // $kontak    = $_POST['no_telepon'];
      // $tgl_project  = $_POST['tgl_project'];
      
      // $q = mysql_query( "UPDATE tb_project SET  customer = '$nama', 
      //                                           alamat = '$alamat', 
      //                                           no_telepon = '$kontak', 
      //                                           tgl_project = '$tgl_project',         
      //                                           WHERE tb_project.kd_project = '$kdproses'" );

     // $qt = mysql_query( "SELECT * FROM tb_detail 
     //                            LEFT JOIN tb_barang ON (tb_detail.kd_barang = tb_barang.kd_barang)
     //                            WHERE tb_detail.kd_project = '$kd_proses'"  );
     //  // $rt = mysql_fetch_assoc( $q );
      
      // $kd_kerja = $rt['kd_project'];
      // $check = $_POST['check'];
      // $jumlah = count( $check );
      // $kd_barang = $_POST['kd_barang'];
      // $stock = $_POST['stock'];
      
      // if ( $check > 0 ) {
      //   for ( $i=0; $i<$jumlah; $i++ ) {
      //     foreach ($kd_barang as $keyb => $valb) {
      //       if ( $check[$i] == $valb ) {
      //         foreach ($stock as $keys => $vals) {
      //           if ( $keyb == $keys ) {
      //             echo $keys . '<br>';
      //             $qd = mysql_query( "UPDATE tb_detail SET kd_project = '$kd_kerja', 
      //                                                   kd_barang    = '$check[$i]', 
      //                                                   jml_barang   = '$vals'" );
      //             $qb = mysql_query( "UPDATE tb_barang SET stock = stock-$vals WHERE kd_barang = $check[$i]" );
      //           }
      //         $k = mysql_query( "UPDATE tb_barang SET stock = stock+$jml_barang WHERE kd_barang = '$kdbarang'" );
      //         }
      //       }
      //     }
      //   }
      // }
 ?>