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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>.login-page{background-image: url("https://bytes.co/wp-content/uploads/2017/03/shutterstock_485403367-1024x535.jpg") !important; background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;}.login-box-body{background: rgba(255,255,255, 0.9) !important}</style>
</head>
<body class="hold-transition login-page">


<div class="login-box">
  <div class="login-logo">
    <a href=""><b>PENGUMUMAN KELULUSAN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">SMK Negeri 5 Banjarmasin</p>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NISN" name="no_ujian" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <input type="hidden" name="cek" value="cek">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
          <input type="text" class="form-control" placeholder="IG wajib follow @smkn5bjm" name="ig" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fab fa-instagram-square"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        
        <p>
        </p>

        <?php

       error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if($_POST['cek']=="cek"){
      require "config.php";
                        
    $pass=mysqli_real_escape_string($sambung,$_POST['password']);
    $user=mysqli_real_escape_string($sambung,$_POST['no_ujian']);
    $ig=mysqli_real_escape_string($sambung,$_POST['ig']);
    $login=sprintf("SELECT * FROM akun WHERE no_ujian='$user' AND password='$pass'", mysqli_real_escape_string($sambung,$user), mysqli_real_escape_string($sambung,$pass));
      $cek_lagi=mysqli_query($sambung,$login);
      $ketemu=mysqli_num_rows($cek_lagi);
      $r=mysqli_fetch_array($cek_lagi);
        if ($ketemu > 0){                            
              //berhasil login cek apakah pengumuaman sudah di buka
       $totlogin = $r['hitung']+1;
             mysqli_query($sambung,"UPDATE akun SET hitung='$totlogin', ig ='$ig' WHERE no_ujian='$r[no_ujian]' ");
        
            $qp= mysqli_query($sambung,"SELECT * FROM pengumuman where kode_jurusan='$r[kode_jurusan]' ");
            $p=mysqli_fetch_array($qp); 
            
            if($p[pengumuman]=="1"){
              session_start();
              $_SESSION['nis'] = $r['nis'];
              $_SESSION['nama'] = $r['nama'];
              $_SESSION['no_ujian'] = $r['no_ujian'];
             
              $_SESSION['kelas'] = $r['kelas'];
              $_SESSION['perjanjian'] = $r['excp'];
              $_SESSION['kode_jurusan'] = $r[kode_jurusan];

                

              echo "<label>Login sukses, mohon tunggu ...</label><br>";
              echo "<meta http-equiv='refresh' content='0; url=index.php'>";

            }else{
              echo '<div class="alert alert-danger ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fas fa-ban"></i> Alert!</p>
                  Pengumuman masih belum terbuka untuk program keahlian anda
                </div>';

            }


              }else{
                echo '<div class="alert alert-danger ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p><i class="fas fa-ban"></i> Alert!</p>
                  Nomor ujian / password salah
                </div>';        
                }

  }
?>
                


      <div class="alert alert-warning ">
         <h5><i class="fas fa-bullhorn"></i> Info!</h5>
          <script language="JavaScript">
        TargetDate = "05/13/2020 06:00 AM";
        BackColor = "";
        ForeColor = "";
        CountActive = true;
        CountStepper = -1;
        LeadingZero = true;
        DisplayFormat = "Kelulusan akan diumumkan dalam <br>  %%D%% Hari, %%H%% Jam, %%M%% Menit, %%S%% Detik lagi";
        FinishMessage = "Pengumuman telah dibuka!";
        </script>
        <script language="JavaScript" src="asset/js/countdown.js"></script>
      </div>

            <p><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-book"></i> Panduan!</a>
      </button></p>
      </div>
      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-book"></i> Panduan </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>1. Masukan NISN anda (Nomor Induk Siswa Nasional)</p>
              <p>2. Masukan Password anda (tanyakan kepada wali kelas)</p>
              <p>3. Masukan Instagram anda (Instagram yang dimasukan wajib sudah memfollow @smkn5bjm)</p>
              <p>4. Klik "Sign In"</p>
              <p><i>"Jika mengalami kendala silahkan DM melalui Instagram @smkn5bjm"</i></p>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

</body>
</html>
