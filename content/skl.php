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
            <h1>Cetak SKL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dasboard</a></li>
              <li class="breadcrumb-item">Cetak SKL</li>
              
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
                <h3 class="card-title">Petunjuk Cetak SKL</h3>

             
              <div class="card-tools">
                <a  class="btn btn-info" onClick="window.open('skhuns.php','mywindow','width=1000,location=no')"><i class="fa fa-print"></i> Cetak SKL</a>              
              </div>
            </div>
              <div class="card-body">
                <?php

                include "skhuns.php";

                ?>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a  class="btn btn-info" onClick="window.open('skhuns.php','mywindow','width=1000,location=no')"><i class="fa fa-print"></i> Cetak SKL</a>
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