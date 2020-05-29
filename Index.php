
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengumuman Kelulusan SMK Negeri 5 Banjarmasin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="asset/plugins/toastr/toastr.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php 
session_start();
if(empty($_SESSION['nis']) and empty($_SESSION['no_ujian']))
{
  
  include "login.php";
 
}
else{ 
  include "config.php";
  $qs= mysqli_query($sambung,"SELECT * FROM siswa where no_ujian='$_SESSION[no_ujian]' ");
  $s=mysqli_fetch_array($qs); 

?>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
      <h6><b>Pengumuman Kelulusan</b><br><small>SMKN 5 Banjarmasin</small></h6>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link elevation-4">
      <img src="asset/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PK-SMKN5BJM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $s[nama]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="./" class="nav-link <?php if($_GET['page']==""){echo"active";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasboard                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="edit_data" class="nav-link <?php if($_GET['page']=="edit_data"){echo"active";} ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Edit Data              
              </p>
            </a>
          </li>
           

          <li class="nav-item has-treeview <?php if($_GET['page']=="petunjuk_skl" or $_GET['page']=="cetak_skl" ){echo"menu-open";} ?>">
            <a href="#" class="nav-link <?php if($_GET['page']=="petunjuk_skl" or $_GET['page']=="cetak_skl" ){echo"active";} ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SKL
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="petunjuk_skl" class="nav-link <?php if($_GET['page']=="petunjuk_skl"){echo"active";} ?>">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Cara Mencetak SKL</p>
                </a>
              </li>

              <li class="nav-item <?php if($_SESSION['perjanjian']=="1"){ echo"swalDefaultSuccess"; }else{ echo"swalDefaultWarning"; }?> ">
            <a href="#" class="nav-link">
              <i class="nav-icon far fas fa-stamp "></i>
              <span class="right badge badge-danger">Cek</span>
              <p>
                Validasi SKL               
              </p>
            </a>
          </li>

              <li class="nav-item">
            <a href="<?php if($_SESSION['perjanjian']=="1"){ echo"cetak_skl "; }else{ echo"#"; }?>" class="nav-link <?php if($_GET['page']=="cetak_skl"){echo"active";} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cetak SKL                
              </p>
            </a>
          </li>

            </ul>
            

          
           

          </li>
           <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Keluar                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
   <?php

      require "config.php";
       error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
       $page=$_GET['page'];
       $filename="content/$page.php";
       if (!file_exists($filename))
        {
         include "content/home.php";
        }
            else
        {@include "content/$page.php";}
        ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.1
    </div>
    <strong>Copyright &copy; 2020 <a href="https://guruidola.id">ICT SMKN 5 Banjarmasin</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- SweetAlert2 -->
<script src="asset/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="asset/plugins/toastr/toastr.min.js"></script>
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Valid, Silakan cetak SKL dan scan QR Code dibagian bawah.'
      })
    });

    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'error',
        title: ' Tidak Valid, silakan hubungi admin sekolah.'
      })
    });

  });
</script>
</body>
</html>
<?php
 } 
 ?>