
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Validasi SKL | SMKN 5 Banjarmasin</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
session_start();
if(!isset($_GET['r']) || empty($_GET['r']))
{
  ?>
  <br><div align='center' class='alert alert-dismissable alert-danger'><h4>Maaf, anda anda tidak memiliki akses !</h4></div><meta http-equiv='refresh' content='2; url=../index.php'>
  <?php 
}
else{

  
    include "../config.php";
    include "../phpqrcode/qrlib.php";  

    
  function url_decode($input){

return base64_decode(strtr($input, '_', '='));

}
 


    $noujian = url_decode($_GET['r']);

    
    $qs= mysqli_query($sambung,"SELECT * FROM siswa where no_ujian= '$noujian' ");
    $s=mysqli_fetch_array($qs);

    //kenali jurusan
    $qju= mysqli_query($sambung,"SELECT * FROM akun where no_ujian='$noujian' ");
    $ju=mysqli_fetch_array($qju); 
    //echo $ju[kode_jurusan];

    $qnr= mysqli_query($sambung,"SELECT * FROM nilai_rapot where no_ujian='$noujian' ");
    $nr=mysqli_fetch_array($qnr);

    $qns= mysqli_query($sambung,"SELECT * FROM nilai_sekolah where no_ujian='$noujian' ");
    $ns=mysqli_fetch_array($qns); 
    //$tns=$ns[bind] + $ns[mtk] + $ns[bing] + $ns[kejuruan] + $ns[sb] + $ns[penjas] + $ns[pkn] +  $ns[pai] +  $ns[paq] +  $ns[kwu] +  $ns[ips] +  $ns[fisika] + $ns[kimia];
    


    $qnun= mysqli_query($sambung,"SELECT * FROM nilai_un where no_ujian='$s[no_ujian]' ");
    $nun=mysqli_fetch_array($qnun); 
    //$tnun=$nun[bind] + $nun[mtk] +  $nun[bing] +  $nun[kejuruan];
    //$rnun=$tnun/4;


    //$tna=(0.4 * $ns[bind]) + (0.6 * $nun[bind]) + (0.4*$ns[mtk])+(0.6*$nun[mtk]) +(0.4*$ns[bing])+(0.6*$nun[bing])+(0.4*$ns[kejuruan])+(0.6*$nun[kejuruan]) + $ns[sb] + $ns[penjas] + $ns[pkn] +  $ns[pai] +  $ns[paq] +  $ns[kwu] +  $ns[ips] +  $ns[fisika] +$ns[kimia];
    

    
    //tkj kdd kimianya
    if($ju[kode_jurusan] =="2063"){
      $rna=$tna/12;
      $rns=$tns/12;
    }else{
      $rna=$tna/13;
      $rns=$tns/13;

    }



  
?>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="../asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SKL CEK</span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cek Validasi SKL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Portal Kelulusan</a></li>
              <li class="breadcrumb-item active">Cek SKL</li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div ba
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $ju[nis]." - ".$ju[nama]; ?></b></h3>

                <div class="card-tools">
                 <?php  if(!empty($ju[nis])){echo'<button type="button" class="btn btn-block btn-success btn-xs">DATA VALID</button>';}else{echo '<button type="button" class="btn btn-block btn-danger btn-xs">DATA TIDAK DITEMUKAN</button>';}  ?>
                </div>
              </div>
              <div class="card-body">              

                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                  Jika berkas yang anda pindai berbeda dari data yang ditampilkan pada portal ini berarti berkas tersebut telah diedit atau palsu.
                </div>

                <h4>Data Pribadi</h4>
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                
                  <tbody>
                    <tr>
                      <td width="5">Nama Lengkap</td>
                      <td width="1">:</td>
                      <td><b><?php echo $ju[nama]; ?></b></td>
                    </tr>

                    <tr>
                      <td width="5">Tempat dan tanggal lahir</td>
                      <td width="1">:</td>
                      <td><?php echo $s[tempat_lahir].", ".$s[tgl_lahir]; ?></td>
                    </tr>

                    <tr>
                      <td width="5">Nama orang tua</td>
                      <td width="1">:</td>
                      <td><?php echo $s[ortu]; ?></td>
                    </tr>

                    <tr>
                      <td width="5">No Ujian</td>
                      <td width="1">:</td>
                      <td>4-19-15-<?php echo $s[no_ujian]; ?></td>
                    </tr>

                    <tr>
                      <td width="5">NISN</td>
                      <td width="1">:</td>
                      <td><?php echo $s[nis]; ?></td>
                    </tr>

                    <tr>
                      <td width="5">Paket Keahlian</td>
                      <td width="1">:</td>
                      <td><?php echo $s[kelas]; ?></td>
                    </tr>

                    <tr>
                      <td width="5">Tahun Pelajaran</td>
                      <td width="1">:</td>
                      <td>2019/2020</td>
                    </tr>

                    <tr>
                      <td width="5">Keterangan</td>
                      <td width="1">:</td>
                      <td><b><?php echo $s[ket]; ?></b></td>
                    </tr>
                    
                    
                  </tbody>
                </table>
              </div>
              <br>
              <h4>Daftar Nilai</h4>
              <div class="card-body table-responsive p-0" style="height: 300px">


          
    <table class="table table-head-fixed table-hover text-nowrap">
     <thead>
        <th><center>No</center></th>
        <th>Mata Pelajaran</th>
        <th><center>Nilai Rata-rata Rapor</center></th>
        <th><center>Nilai USBN</center></th>
        <th><center>Nilai UN</center></th>
      </thead>
       <tbody>
      
      <tr>
        <td align="center">1</td>
        <td>Bahasa Indonesia</td>
        <td><center><?php echo number_format($nr[bind],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[bind],0,",","."); ?></center></td>
        <td><center><?php echo number_format($nun[bind],2,",","."); ?></center></td>
        
      </tr>
      <tr>
        <td align="center">2</td>
        <td>Matematika</td>
        <td><center><?php echo number_format($nr[mtk],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[mtk],0,",","."); ?></center></td>
        <td><center><?php echo number_format($nun[mtk],2,",","."); ?></center></td>
        
      </tr>
      <tr>
        <td align="center">3</td>
        <td>Bahasa Inggris</td>
        <td><center><?php echo number_format($nr[bing],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[bing],0,",","."); ?></center></td>
        <td><center><?php echo number_format($nun[bing],2,",","."); ?></center></td>
      
      </tr>
      <tr>
        <td align="center">4</td>
        <td>Kompetensi Kejuruan</td>
        <td><center><?php echo number_format($nr[prog],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[prog],0,",","."); ?></center></td>
        <td><center><?php echo number_format($nun[kejuruan],2,",","."); ?></center></td>
        
      </tr>
      <tr>
        <td align="center">5</td>
        <td>Pendidikan Agama & Budi Pekerti</td>
        <td><center><?php echo number_format($nr[agama],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[agama],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>
      <tr>
        <td align="center">6</td>
        <td>Pendidikan Pancasila dan Kewarganegaraan</td>
        <td><center><?php echo number_format($nr[pkn],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[pkn],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">7</td>
        <td>Sejarah Indonesia</td>
        <td><center><?php echo number_format($nr[sejarah],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[sejarah],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">8</td>
        <td>Fisika</td>
        <td><center><?php echo number_format($nr[fisika],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[fisika],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>
      <tr>
        <td align="center">9</td>
        <td>Seni Budaya</td>
        <td><center><?php echo number_format($nr[sb],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[sb],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">10</td>
        <td>Pendidikan Jasmani Olah Raga dan Kesehatan</td>
        <td><center><?php echo number_format($nr[penjaskes],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[penjaskes],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">11</td>
        <td>Simulasi Digital</td>
        <td><center><?php echo number_format($nr[simdig],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[simdig],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">12</td>
        <td>Prakarya & Kewirausahaan</td>
        <td><center><?php echo number_format($nr[kwu],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[kwu],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">13</td>
      <?php 
      if($ju[kode_jurusan]=="1005"){  
        echo "<td>Pemrograman Dasar</td>";        
      }else{
        echo "<td>Kimia</td>";

      }

      ?>
        <td><center><?php echo number_format($nr[kimia],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[kimia],0,",","."); ?></center></td>
        <td><center>-</center></td>       
      </tr>

      <tr>
        <td align="center">14</td>
      <?php 
      if($ju[kode_jurusan]=="1005"){  
        echo "<td>Sistem Komputer</td>";        
      }else{
        echo "<td>Gambar Teknik</td>";

      }

      ?>
        <td><center><?php echo number_format($nr[gabtek],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[gabtek],0,",","."); ?></center></td>
        <td><center>-</center></td>       
      </tr>

      <tr>
        <td align="center">15</td>
        <td>Dasar Bidang Keahlian</td>
        <td><center><?php echo number_format($nr[db],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[db],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>

      <tr>
        <td align="center">16</td>
        <td>Mulok (BTA)</td>
        <td><center><?php echo number_format($nr[mulok],0,",","."); ?></center></td>
        <td><center><?php echo number_format($ns[mulok],0,",","."); ?></center></td>
        <td><center>-</center></td>
        
      </tr>


        
    
      
      <tr>
        <td></td>
        <td align="center"><b>Total</b></td>
        <td><center><b><?php echo number_format($nr[total],0,",","."); ?></b></center></td>
        <td><center><b><?php echo number_format($ns[total],0,",","."); ?></b></center></td>
        <td><center><b><?php echo number_format($nun[jumlah],2,",","."); ?></b></center></td>
        
      </tr>
      <tr>
        <td></td>
        <td align="center"><b>Rata-Rata</b></td>
        <td><center><b><?php echo number_format($nr[rata],0,",","."); ?></b></center></td>
        <td><center><b><?php echo number_format($ns[rata],0,",","."); ?></b></center></td>
        <td><center><b><?php echo number_format($nun[rata],2,",","."); ?></b></center></td>
        
      </tr>
    
      
    
    </tbody></table>

              </div>
              <br>
              <div class="callout callout-danger">
                 

                  <p><i><?php echo $ju[nis]." - ".$ju[nama]; ?> mengakses Portal Kelulusan sebanyak <?php echo $ju[hitung]." kali, dan aktifitas terakhir tercatat pada ".$ju[terakhir_login]; ?> </i></p>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <i>Informasi yang ditampilkan disini sesuai dengan database portal kelulusan</i>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">ICT SMKN 5 Banjarmasin</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
</body>
</html>
<?php
//echo $noujian;
}
?>