<!DOCTYPE html>
<html>
<head>
	<title>Installer</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap4/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="padding-top: 20px">
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				<div class="jumbotron">
					<h3>Selamat Datang di SpIntaller</h3>
				<hr>
				installer aplikasi mudah untuk semuanya
				<hr>
				Silahkan Beli Produk resmi kami<br>
				<div style="text-align: right;font-size: 12px">@supangat_oy &copy; 2018</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Installer Aplikasi E-Voting SMK Ma'arif NU 1 Ajibarang 
					</div>
					<div class="card-body">
						<div class="alert alert-info">
							Pastikan data yang anda masukan sudah terisi dengan benar
						</div>
						<form method="post">
							<div class="form-group">
								<label>Nama Database :</label>
								<input type="text" name="db" required="required" class="form-control">
								<!-- <small>Buat terlebih dahulu database dengan nama yang akan digunakan</small> -->
							</div>
							<div class="form-group">
								<label>Alamat Host Server :</label>
								<input type="text" name="server" required="required" class="form-control" value="localhost">
							</div>
							<div class="form-group">
								<label>Nama User Database :</label>
								<input type="text" name="user" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Password Database :</label>
								<input type="text" name="pwd" class="form-control">
							</div>
							<div class="form-group">
								<label>Alamat Utama Aplikasi anda:</label>
								<input type="text" name="url" value="" required="required" class="form-control">
								<small>contoh : http://127.0.0.1/cbt </small>
							</div>

							<?php
							if (isset($_REQUEST['submit'])) {
								echo "<div class='alert alert-info'>";
								$tes=mysqli_connect($_REQUEST['server'],$_REQUEST['user'],$_REQUEST['pwd']);
								if (!$tes) {
									echo "Gagal Mengoneksi Silahkan periksa kembali dengan benar dan teliti";
								} else {
									echo "Koneksi sukses dibuat <hr/>";
									if (!mysqli_query($tes,'CREATE DATABASE IF NOT EXISTS  '.$_REQUEST['db'].'')) {
										echo "Gagal Membuat database";
									} else {
										echo "Database Sukses Dibuat<hr/>";
										// echo "string";
										
										$conn =new mysqli($_REQUEST['server'], $_REQUEST['user'], $_REQUEST['pwd'] , $_REQUEST['db']);
										$query = '';
										$sqlScript = file('default.sql');
										foreach ($sqlScript as $line) {
											$startWith = substr(trim($line), 0 ,2);
											$endWith = substr(trim($line), -1 ,1);
											if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') { continue; }
											$query = $query . $line;
											if ($endWith == ';'){
												if (mysqli_query($conn,$query)) {
												 	$result=1;
												 }  else {
												 	$result=0;
												 }
												$query= '';
											}
										}
											


										if ($result==0) {
											echo "Gagal import database";
										} else {
											echo "Sukses Import database <hr/>";

											$as='<?php @ini_set(\'output_buffering\',0);@ini_set(\'display_errors\', 0);$db_server="'.$_REQUEST['db'].'";$db_host="'.$_REQUEST['server'].'";$db_user="'.$_REQUEST['user'].'";$db_pass="'.$_REQUEST['pwd'].'";$url_utama="'.$_REQUEST['url'].'"; // jangan ubah sendiri silahkan gunakan installer dari aplikasi ini ?>';
											$myfile = fopen("../config/db_server.php", "w") or die("Unable to open file!");
											if (fwrite($myfile, $as)) {
												echo "Sukses Meyimpan Konfigurasi <hr/>";
												echo "</div><div class='alert alert-danger'>Silahkan Hapus Folder Installer Untuk Menjaga Keamanan</div><a class='btn btn-primary' href='".$_REQUEST['url']."'>Halaman Utama</a>";
											}
										}
									}
								}

								echo "</div>";
							}

							?>

							<div class="form-group">
								<button type="submit" name="submit" value="simpan" class="btn btn-success btn-block">Simpan / Lanjutkan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>