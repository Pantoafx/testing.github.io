<?php 
  include('../plugins/mpdf60/mpdf.php');
  $mpdf=new mPDF('win-1252','A4','','',15,10,16,10,10,10);//A4 page in portrait for landscape add -L.
  $mpdf->SetHeader('Laporan Proyek| | PT.Gading4.Net|');
  // $mpdf->Image('../dist/img/user2-160x160ii.png',10,10);
  $mpdf->setFooter('{PAGENO}');// Giving page number to your footer.
  $mpdf->useOnlyCoreFonts = true;    // false is default
  $mpdf->SetDisplayMode('fullpage');
  // Buffer the following html with PHP so we can store it to a variable later
  ob_start();
  ?>
  <?php
    include "report_format_project.php";  
    ?>
  <?php 
  $html = ob_get_contents();
  ob_end_clean();
  // send the captured HTML from the output buffer to the mPDF class for processing
  $mpdf->WriteHTML($html);
  //$mpdf->SetProtection(array(), 'user', 'password'); uncomment to protect your pdf page with password.
  $mpdf->Output();
  exit;
?>

