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
            <h1>Edit Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dasboard</a></li>
              <li class="breadcrumb-item">Edit Data</li>
              
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
                <h3 class="card-title"><b>Edit Data Diri</b></h3>

                
              </div>
              <div class="card-body">
                <form action="index.php?page=edit_data" method="POST">
                <table width='400' class='table table-striped table-hover'>
                 <tr class='active'>
                    <td width='180'>Nama Siswa</td>
                    <td class="wibo" colspan='3'><input type="text" class="form-control" name="nama" value="<?php echo $s[nama]; ?>" size="25" disabled ></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td class="wibo" colspan='3'><input type="text" class="form-control" name="ttl1" value="<?php echo $s[tempat_lahir]; ?>" size="25"></td>
                    
                  </tr>

                  <tr>
                    <td>Tanggal Lahir</td>
                    <td class="wibo" colspan='3'><input type="text" class="form-control" name="ttl2" value="<?php echo $s[tgl_lahir]; ?>" size="25"></td>
                    
                  </tr>
                  <tr class='active'>
                    <td>Nama Orang Tua</td>
                    <td class="wibo" colspan='3'><input type="text" class="form-control" name="ortu" value="<?php echo $s[ortu]; ?>" size="25"></td>
                    
                  </tr>
                  

                </table>
                <p>
                <input type="submit" class="btn btn-info  value="Update" name="simpan"></div></p>
                </form>
               
            <?php
                if(!empty($_POST['ttl1'])){

                  $no_ujian = $_SESSION[no_ujian];
                  //$nama = $_POST['nama'];
                  $ttl1 = $_POST['ttl1'];
                  $ttl2 = $_POST['ttl2'];
                  $ortu = $_POST['ortu'];

                 // $sql = "UPDATE siswa SET nama='$nama', tempat_lahir ='$ttl1',tgl_lahir ='$ttl2 ', ortu='$ortu' WHERE no_ujian='$no_ujian'";
                  $sql = "UPDATE siswa SET tempat_lahir ='$ttl1',tgl_lahir ='$ttl2 ', ortu='$ortu' WHERE no_ujian='$no_ujian'";

                  if ($sambung->query($sql) === TRUE) {
                      echo '<meta http-equiv="refresh" content="0; url=./index.php?page=edit_data">';
                  } else {
                      echo "Error updating record: " . $sambung->error;
                  }

                }


            ?>
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