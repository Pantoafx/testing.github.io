<?php
  ob_start();
  session_start();
  require( 'includes/config.php' );
  require( 'includes/functions.php' );
  
  if ( ! isset( $_SESSION['username'] ) ) {
    $_SESSION['alert'] = 'Anda harus login !';
    header( 'location: login.php' );
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sangkode SDLC | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="favicon.ico" href="dist/img/sangkalicon.png" sizes="32x32" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      /*== skin-black ==*/
      .skin-black .main-header > .logo{ 
        background-color: rgb(26, 26, 26); 
        color: #999; border:none; 
        transition:all ease .35s;
      }
      .skin-black .main-header > .logo:hover{ 
        background-color: rgb(26, 26, 26); 
        color: #cecece;
      }
      .skin-black .main-header > .navbar { 
        background-color: rgb(26, 26, 26); 
        color: #999;
      }
      
      .skin-black .main-header > .navbar > .sidebar-toggle{
        color: #999; 
        border:none;
      }
      .skin-black .main-header > .navbar > .sidebar-toggle:hover{ 
        background-color: rgb(26, 26, 26); 
        color: #cecece;
      }
      .skin-black .main-header > .navbar .navbar-custom-menu .navbar-nav > li > a, 
      .skin-black .main-header > .navbar .navbar-right > li > a{
        background-color: rgb(26, 26, 26); 
        color: #29ee39; 
        border: none;
      }
      .skin-black .main-header > .navbar .navbar-custom-menu .navbar-nav > li > a:hover, 
      .skin-black .main-header > .navbar .navbar-right > li > a:hover{
        color: #ee2939;
      }
      .skin-black .main-header li.user-header {
        background-color: rgb(26, 26, 26);
      }
      .skin-black .content-header{
        padding-top: 20px;
        margin-top: 0px; 
      }
      /*== skin-black ==*/

      /* == btn ==*/
      .btn {
        transform:scale(1.0,1.0); 
        transition:all ease .35s;
      }
      .btn:hover {
        transform:scale(0.9,0.9);
      }
      .btn .fa-power-off{
        transition:all ease .55s;
      }
      .btn:hover .fa-power-off{
        transform:rotate(180deg);
      }
      /* == btn ==*/
      .user-panel{
        padding-top: 10px;
        text-align: left;
        height: 70px;
      }
      /*== logo ==*/
      .large {
        border-radius:0px; 
        margin-left:-20px; 
        margin-top:0px;
        width:240px; 
      }
      .small {
        border-radius:0px; 
        margin-left:20px; 
        margin-top:5px;
        width:240px; 
      }
      /*== logo ==*/
      /*== text ==*/
      .form-control, .form-group, .cap{text-transform:capitalize;}
      /*== text ==*/
    </style>

    <link href="bootstrap/css/jquery-ui.css" rel="stylesheet" type="text/css" />
  
  </head>
  <body class="skin-black sidebar-mini layout-boxed">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo" style="height:px;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <!-- <b>A</b>G -->
            <img class="img-square" src="dist/img/sangkalicon.png"" style="margin:0; padding:0; width:40px;"  alt="User Image" />
          </span>

          <!-- logo for regular state and mobile devices -->
          <img class="large hidden-xs" src="dist/img/default-monochrome-white.svg" style="margin:0; padding:0; width:200px;"alt="User Image"/>
          <img class="small visible-xs" src="dist/img/default-monochrome-white.svg" style="margin:0; padding:0; width:200px;" alt="User Image"/>
          <!-- <span class="logo-lg visible-xs visible-sm text-left"><b>Admin</b> | Sangkala4U</span> -->

        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="logout.php" class="btn" onclick="return confirm('Sure you want to Sign Out ?');" alt="Sign Out" title="Sign Out">
                  <span class="fa fa-lg fa-power-off"></span> <!-- Sign out -->
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.png "img-square" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p style="margin-top:10px; margin-left: 5 px;">Sangkala was here ! </p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION MENU</li>
            <li class="treeview">
              <a href="index.php" alt="Dashboard" title="Dashboard">
                  <i  class="fa fa-dashboard"></i> <span> Dashboard</span>
              </a>
            </li>
            <li>
              <a href="?page=barang" alt="Barang" title="Barang">
                  <i  class="fa fa-cubes"></i> <span> Barang</span>
              </a>
            </li>
            <li>
              <a href="?page=customer" alt="Pelanggan" title="Pelanggan">
                  <i  class="fa fa-user"></i> <span> Pelanggan</span>
              </a>
            </li>
            <li>
              <a href="?page=project" alt="Proyek" title="Proyek">
                  <i  class="fa fa-th"></i> <span> Proyek</span>
              </a>
            </li>
            <li>
              <a href="?page=history" alt="History" title="History">
                  <i  class="fa fa-history"></i> <span> History Proyek</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php
          if ( empty( $_GET['page'] ) ) {
            $_GET['page'] = 'content.php';
          }
          
          $page = htmlentities( $_GET['page'] );
          $halaman = "pages/$page.php";
          
          if ( ! file_exists( $halaman ) || empty( $page ) ) {
            include( 'content.php' );
          } else {
            include( "$halaman" );
          }
        ?>
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4
        </div>
        <strong><a class="btn" href="http://Sangkala.id" style="color:#FF8C00;"><i class="fa fa-code fa-spin fa-1x fa-fw" aria-hidden="true"></i>
<span class="sr-only">Saving. Hang tight!</span></span> Sangkalakode </a></strong>
          &copy; 2024 All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- JavaScript Configuration -->
    <script>
      function toggleCheckBox(master,group){
        var cbarray = document.getElementsByName(group);
        for(var i = 0; i < cbarray.length; i++){
          cbarray[i].checked = master.checked;
        }
      }
    </script>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/jquery-ui.js"></script>
    <script src="bootstrap/js/randra.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    
  </body>
</html>
<?php ob_flush(); ?>
