<?php
session_start();
if(empty($_SESSION['nis']) and empty($_SESSION['no_ujian']) )
{
	?>
  <br><div align='center' class='alert alert-dismissable alert-danger'><h4>Maaf, anda anda tidak memiliki akses !</h4></div><meta http-equiv='refresh' content='2; url=../index.php'>
  <?php 
}
else{
			
		include "config.php";
	
		include "phpqrcode/qrlib.php"; 

		function url_encode($input){

return strtr(base64_encode($input), '=', '_');

}	

		$noujian = $_SESSION['no_ujian'];
		$urld = url_encode($noujian);

		
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
		//$tns=$ns[bind] + $ns[mtk] +	$ns[bing] +	$ns[kejuruan] +	$ns[sb] +	$ns[penjas] +	$ns[pkn] +	$ns[pai] +	$ns[paq] +	$ns[kwu] +	$ns[ips] +	$ns[fisika] +	$ns[kimia];
		


		$qnun= mysqli_query($sambung,"SELECT * FROM nilai_un where no_ujian='$s[no_ujian]' ");
		$nun=mysqli_fetch_array($qnun); 
		//$tnun=$nun[bind] + $nun[mtk] +	$nun[bing] +	$nun[kejuruan];
		//$rnun=$tnun/4;


		//$tna=(0.4 * $ns[bind]) + (0.6 * $nun[bind]) + (0.4*$ns[mtk])+(0.6*$nun[mtk]) +(0.4*$ns[bing])+(0.6*$nun[bing])+(0.4*$ns[kejuruan])+(0.6*$nun[kejuruan]) +	$ns[sb] +	$ns[penjas] +	$ns[pkn] +	$ns[pai] +	$ns[paq] +	$ns[kwu] +	$ns[ips] +	$ns[fisika] +$ns[kimia];
		

		
		//tkj kdd kimianya
		if($ju[kode_jurusan] =="2063"){
			$rna=$tna/12;
			$rns=$tns/12;
		}else{
			$rna=$tna/13;
			$rns=$tns/13;

		}



	
?>

<title>SKHUNS <?php echo $s[no_ujian]." ( ".$s[nama]." )"; ?></title>
<style type="text/css">
	* {
	margin:0;
	padding:0;
	
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}


body {
	background:#ddd;
}

.page {	
	position:relative;
	width:21cm;
	min-height:29.7cm;
	page-break-after: always;
	margin:0.5cm auto;
	background:#FFF;
	
	padding-top: 0.1cm;
	padding-bottom: 0.1cm;
	padding-right: 2cm;
	padding-left: 2cm;
	box-shadow:0 2px 10px rgba(0,0,0,0.3);
	-webkit-box-sizing: none;
	-moz-box-sizing: none;
	box-sizing: none;

	page-break-after: always;
}
.kecil{
	padding: 0.1cm;
}
.page-landscape {	
	position:relative;
	width:29.7cm;
	min-height:19cm;
	page-break-after: always;
	margin:1.5cm;
	background:#FFF;
	padding:1.5cm;
	box-shadow:0 2px 10px rgba(0,0,0,0.3);
	-webkit-box-sizing: none;
	-moz-box-sizing: none;
	box-sizing: none;

	page-break-after: always;
}
.footer {
	position:absolute;
	bottom:1.5cm;
	left:1.5cm;
	right:1.5cm;
	width:auto;
	height:30px;
}
.kanan {
	float:right;
}
.page *, .page-landscape * {
	font-family:arial;
	font-size:11px;
}
.it-grid {
	background:#FFF;
	border-collapse:collapse;
	border:1px solid #000;
}
.seri {
	font-family:'Lucida Handwriting';
}
.it-grid th {
	color:#000;
	border:1px solid #000;
	border-top:1px solid #000;
	background:#C4BC96;
}
.it-grid tr:nth-child(even) { background:#f8f8f8; }
.it-grid td, .it-grid th {
	padding:3px;
	border:1px solid #000;
}
.it-cetak td {
	padding:5px 5px;
}
h1, h2, h3, h4, h5, h6 {
	font-weight:normal;
}

table {
	border-collapse:collapse;
}

td{
	padding:1px;
}

.f14 {
	font-size:14pt;
}
.f12 {
	font-size:12pt;
}
}
.f10 {
	font-size:11pt;
}
.line-bottom{
	border-bottom:1px solid black;
}
.detail {
	margin-top:10px;
	margin-bottom:10px;
}
.detail td{
	padding:5px;
	font-size:12px;
}
.detail span{
	border-bottom:1px solid black;
	display:inline-block;
	font-size:12px;
}

.cetakan{
	font-size:14px;
	line-height:1.5em;
}
.cetakan *{
	font-size:14px;
	line-height:1.5em;
}
.cetakan span {
	border-bottom:1px solid black;
	display:inline-block;
}
.full {
	width:100%;
}
nip {
	display:inline-block;
	width:130px;
}
a {
	text-decoration:none;
	color:#006600;
}
ol {
	margin-left:30px;
}

ol > li {
	padding:10px;
}
table { page-break-inside:auto }
tr    { page-break-inside:avoid; page-break-after:auto }
thead { display:table-header-group }
tfoot { display:table-footer-group }


@media print {
	body {
		background:#ddd;
	}
	body, div, td, p {
		font-family:'Times New Roman',Times,serif;
		font-size:12pt;
	}
	.page {
		height:10cm;
		padding-top: 0.1cm;
		padding-right: 2cm;
		padding-left: 2cm;
		box-shadow:none;
		margin:0;
	}
	@page {
	    size: A4;
	    margin: 0;
	    -webkit-print-color-adjust: exact;
	}

	html, body {
    width: 210mm;
    height: 297mm;
  }
	
	.page-landscape {
		height:5cm;
		padding:0.5cm;
		box-shadow:none;
		margin:0;
	}




	.footer {
		bottom:0.2cm;
		left:0.2cm;
		right:0.2cm;
	}
	thead { 
		display: table-header-group;
	}



}
</style>
<div class="page">
			<table width="100%">
				<tbody><tr>
					<td width="100"><img src="./head.jpg" width="100%"></td>			
					
				</tr>
				<tr>
					
					<td>
						<center>
							
							<u><strong class="f14">
								SURAT KETERANGAN KELULUSAN
							</strong></u>
							<div class="f11">
								No.421.7/555-SMKN5/DISDIKBUD/2019
							</div>
						</center></td>
				</tr>
				
			</tbody></table>
			
			<table class="cetakan full">
				<tbody><tr height="80px">
					<td colspan="2">Yang bertanda tangan di bawah ini, Kepala SMK Negeri 5 Banjarmasin menerangkan bahwa :
					<br>
			<table class="cetakan full">
				<tbody><tr>
					<td width="180px">Nama</td>
					<td width="10px">:</td>
					<td><b><?php echo $s[nama]; ?></b></td>
				</tr>
				<tr>
					<td>Tempat dan tanggal lahir</td>
					<td>:</td>
					<td><?php echo $s[tempat_lahir].", ".$s[tgl_lahir]; ?></td>
				</tr>
				<tr>
					<td>Nama orang tua</td>
					<td>:</td>
					<td><?php echo $s[ortu]; ?></td>
				</tr>
				<tr>
					<td>No Ujian / NISN</td>
					<td>:</td>
					<td>4-19-15-<?php echo $s[no_ujian]." / ".$s[nis]; ?></td>
				</tr>
				<tr>
					<td>Paket Keahlian</td>
					<td>:</td>
					<td><?php echo $s[kelas]; ?></td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td>SMKN 5 Banjarmasin</td>
				</tr>
				<tr>
					<td>Tahun Pelajaran</td>
					<td>:</td>
					<td>2018/2019</td>
				</tr>
				
			</tbody></table>
			<table class="cetakan full">
				<tbody><tr height="80px">
					<td colspan="2">telah  mengikuti  dan <b> <?php echo $s[ket]; ?></b> ujian dengan hasil sebagai berikut : 
					
					<br>
					
		<table class="it-grid rekap-grid" width="100%">
			<tbody><tr>
				<th>No</th>
				<th width="300">Mata Pelajaran</th>
				<th width="110">Nilai Rata-rata Rapor</th>
				<th width="">Nilai USBN</th>
				<th width="">Nilai UN</th>
			
			</tr>
			
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
	
					</td>
				</tr>
			</tbody></table>
		
			<table class="cetakan">
				<tbody><tr>
					<td style="text-align:justify;">
					
						Surat keterangan ini dapat dipergunakan sesuai keperluan dan hanya berlaku hingga diterbitkannya SHUN tahun pelajaran 2018/2019.

						
					</td>
				</tr>
			</tbody></table>
			<table class="cetakan full">
			<tbody><tr>
				<td width="300px" align="left" valign="top">
					<?php
					
					$tempdir = "temp/";
					$isi_teks = "http://192.168.8.100/skl/cek/".$urld;
					$namafile = $s[nis].".png";
					$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
					$ukuran = 8; //batasan 1 paling kecil, 10 paling besar
					$padding = 0;
			 
					QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
					echo '<br><br><br><img src="'.$tempdir.$namafile.'" width="20%" >';
		


					?>
					
				</td>
				

			
				<td width="400px" align="left" valign="top">
					<img src="./lengkap.png" width="100%">
				</td>
			</tr>
			</tbody></table>
			
			</td></tr></tbody></table>
		</div>


<?php

if ($_GET['page']!="cetak_skl") { ?>
<script language="javascript">

function printWindow() {

bV = parseInt(navigator.appVersion);

if (bV >= 4) window.print();}

printWindow();

</script>
	
<?php }

}

?>