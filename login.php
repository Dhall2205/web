<?php 
	include"inc/config.php";
	if(!empty($_SESSION['iam_user'])){
		redir("index.php");
	}
	include"layout/header.php";
	 
	 
	
	if(!empty($_POST)){
		extract($_POST);
		$password =($password);
		$q = mysql_query("SELECT * FROM `user` WHERE email='$email' AND password='$password' AND status='user'")or die(mysql_error());
		if($q){
			$r = mysql_fetch_object($q);
			$_SESSION['iam_user'] = $r->id;
			redir("index.php");
		}else{
			alert("Maaf email dan password anda salah");
		}
	}
?> 
	
<style>
    body {
        background-image: url('assets/img/bege.jpg'); /* Ganti dengan path gambar Anda */
        background-size: cover; /* Membuat gambar memenuhi seluruh layar */
        background-position: center; /* Memusatkan gambar */
        background-attachment: fixed; /* Membuat gambar tetap */
        background-repeat: no-repeat; /* Mencegah pengulangan gambar */
    }
    .content-menu {
        background-color: rgba(255, 255, 255, 0.8); /* Transparansi latar belakang untuk konten */
        padding: 10px;
        border-radius: 5px;
    }
</style>


		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			
			<?php 
				if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysql_query("insert into kontak Values(NULL,'$nama','$email','$subjek','$pesan')");
				if($q){  
			?>

			<div class="alert alert-success">Terimakasih atas masukannya</div>
				<?php }else{ ?>
			<div class="alert alert-danger">Terjadi kesalahan dalam pengisian form. Data belum terkirim.</div>
				<?php } } ?>
			<h3 style="color: #fff; font-weight: bold;">Login User</h3>
				<hr>
				<div class="col-md-6 content-menu" style="margin-top:-20px;">
				 
				 <form action="" method="post" enctype="multipart/form-data">
						<label>Email</label><br>
      <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" /><br>
	  <label>Password</label><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      <br>
						<input type="submit" name="form-input" value="Login" class="btn btn-success">
					</form>
				<br/>Belum Punya Akun ? <a href="register.php">Buat Akun Sekarang !</a> 
				</div>   

			</div>
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>