<?php
  session_start();
  require( 'includes/config.php' );
  
  unset( $_SESSION['username'] );
  header( 'location:login.php' );
?>