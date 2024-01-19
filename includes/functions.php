<?php
  date_default_timezone_set( 'Asia/Makassar' );
  
  function get_alert() {
    if ( isset( $_SESSION['alert'] ) ) {
      echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              " . $_SESSION['alert'] . "
            </div>";
      unset( $_SESSION['alert'] );
    }
  }
?>