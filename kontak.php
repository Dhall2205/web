<?php 
	include"inc/config.php";
	include"layout/header.php";	
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
			<h3 style="color: #fff; font-weight: bold;">Kontak Kami</h3>
				<hr>
				<div class="col-md-8 content-menu" style="margin-top:-20px;">
				 
				 <form action="" method="post" enctype="multipart/form-data">
						<label>Nama</label><br>
						<input type="text" class="form-control" name="nama" required><br>
						<label>Email</label><br>
						<input type="email" class="form-control" name="email" required><br>
						<label>Subjek</label><br>
						<input type="text" class="form-control" name="subjek" required><br>
						<label>Pesan</label><br>
						<textarea class="form-control" name="pesan" required></textarea><br>
						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					</form>
				 
				</div>   
				 
					
				
			</div>
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>