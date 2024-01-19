<?php
  if ( isset( $_GET['act'] ) ) {
    $act = $_GET['act'];
    
    if ( $act == 'insert' ) {
      $nmcustomer = $_POST['nama_customer'];
      
      $q = mysql_query( "INSERT INTO tb_customer SET nama_customer = '$nmcustomer'" );
      
      header( 'location:index.php?page=customer' );
    }
    
    elseif ( $act == 'edit' ) {
      $idcustomer = $_POST['idcustomer'];
      $nmcustomer = $_POST['nama_customer'];
      
      $q = mysql_query( "UPDATE tb_customer SET nama_customer = '$nmcustomer' 
                                          WHERE kd_customer = '$idcustomer'" );
      
      header( 'location:index.php?page=customer' );
    }
    
    elseif ( $act = 'delete' ) {
      $q = mysql_query( "DELETE FROM tb_customer WHERE kd_customer = '$_GET[idcustomer]'" );
      
      header( 'location:index.php?page=customer' );
    }
  }
?>