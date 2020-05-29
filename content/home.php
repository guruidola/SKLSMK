<?php 
session_start();
if(empty($_SESSION['nis']) and empty($_SESSION['no_ujian']))
{
  ?>
  <br><div align='center' class='alert alert-dismissable alert-danger'><h4>Maaf, anda harus login terlebih dulu!</h4></div><meta http-equiv='refresh' content='2; url=index.php'>
  <?php 
}
else{ 
  include "config.php";

  $nis = $_SESSION['nis'];
  
  $qs= mysqli_query($sambung,"SELECT * FROM siswa where no_ujian='$_SESSION[no_ujian]' ");
  $s=mysqli_fetch_array($qs); 
  
  $qj= mysqli_query($sambung,"SELECT * FROM pengumuman where kode_jurusan='$_SESSION[kode_jurusan]' ");
  $j=mysqli_fetch_array($qj);     
?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dasboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dasboard</li>
              
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
              <div class="card-header">
                <h3 class="card-title"><b>Detail Pengumuman</b></h3>

                
              </div>
              <div class="card-body">
              <h5><b>Data Diri</b></h5>
                <table width='400' class='table table-striped table-hover'>
                 <tr class='active'>
                    <td width='180'>Nama Siswa</td>
                    <td class="wibo" colspan='3'><strong><?php echo $s[nama]; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td class="wibo" colspan='3'><?php echo $s[tempat_lahir].", ".$s[tgl_lahir]; ?></td>
                  </tr>
                  <tr class='active'>
                    <td>Nama Orang Tua</td>
                    <td class="wibo"  colspan='3'><?php echo $s[ortu]; ?></td>
                  </tr>
                  <tr>
                    <td>NIS/Paket Keahlian</td>
                     <td class="wibo" colspan='3'><?php echo $s[nis]." / ".$s[kelas]; ?></td>
                  </tr>
                  <tr class='active'>
                    <td>Nomor Peserta</td>
                    <td class="wibo" colspan='3'><?php echo $s[no_ujian]; ?></td>
                  </tr>
              </table>
               <br>
              <h5><b>Keterangan</b></h5>
              <table width='400' class='table table-striped table-hover'>
               <tr class='active'>
                 
                  <?php if($_SESSION['perjanjian']=="1"){?>
                  <td colspan='3'><div class="wibo"><strong><font color="#0066FF" size="5" style="text-transform: uppercase;"><?php echo $s[ket]; ?></strong></div></td>
                  <?php }else{ ?>
                    <td colspan='3'><div class="wibo"><strong><font color="#0066FF" size="5" style="text-transform: uppercase;">Ditangguhkan</strong></div></td>
                  <?php } ?>
                </tr>
              </table> 
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <i>Share dan bagikan ke Instagram @smkn5bjm  </i>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
<?php
}
?>
<script>
  $(document).ready(function() {
    $(".wibo").lock();
  });
</script>