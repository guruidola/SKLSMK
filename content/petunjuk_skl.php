<?php 
session_start();
if(empty($_SESSION['nis']) and empty($_SESSION['no_ujian']))
{
  ?>
  <br><div align='center' class='alert alert-dismissable alert-danger'><h4>Maaf, anda harus login terlebih dulu!</h4></div><meta http-equiv='refresh' content='2; url=index.php'>

  <?php 
}
else{ 
   
?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Petunjuk Cetak SKL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dasboard</a></li>
              <li class="breadcrumb-item">Petunjuk Cetak SKL</li>
              
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
                <h3 class="card-title">Cara Mencetak SKL</h3>

             
              <div class="card-tools">
                            
              </div>
            </div>
              <div class="card-body">
                <p>1. Gunakan chrome untuk mengakses halaman pada saat cetak</p>
                <p>2. Silahkan cetak Surat Keterangan Kelulusan dengan menggunakan kertas A4 80 gsm</p>
                <p>3. Tempelkan Foto 3x4 berlatar belakang merah</p>
                <p>4. Segera Stempel dan Verifikasi Surat Keterangan Kelulusan ke tata usaha</p>
                <p>5. Atur setting printer seperti pada gambar</p>
                <p><img src="./asset/printer.jpg"></p>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
               
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