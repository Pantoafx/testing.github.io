<?php
  if ( isset( $_GET['act'] ) ) {
    $act = $_GET['act'];
    
    if ( $act == 'insert' ) {
      $nmbarang = $_POST['nama_barang'];
      $stock    = $_POST['stock_barang'];
      
      $q = mysql_query( "INSERT INTO tb_barang SET nama_barang = '$nmbarang', 
                                                   stock       = '$stock'" );
      
      header( 'location:index.php?page=barang' );
    }
    
    elseif ( $act == 'edit' ) {
      $idbarang = $_POST['idbarang'];
      $nmbarang = $_POST['nama_barang'];
      $stock    = $_POST['stock_barang'];
      
      $q = mysql_query( "UPDATE tb_barang SET nama_barang = '$nmbarang', 
                                              stock       = '$stock' 
                                          WHERE kd_barang = '$idbarang'" );
      
      header( 'location:index.php?page=barang' );
    }
    
    elseif ( $act = 'delete' ) {
      $q = mysql_query( "DELETE FROM tb_barang WHERE kd_barang = '$_GET[idbarang]'" );
      
      header( 'location:index.php?page=barang' );
    }
  }
?>