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


<?php	if(!empty($_GET['id'])){ ?>
		<?php
			extract($_GET); 
			$k = mysql_query("SELECT * FROM produk where id='$id'"); 
			$data = mysql_fetch_array($k);
		?>
		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			<h3 style="color: #fff; font-weight: bold;">Detail : <?php echo $data['nama'] ?></h3>
				<br/>
				<div class="col-md-12 content-menu" style="margin-top:-20px;">
				<?php $kat = mysql_fetch_array(mysql_query("SELECT * FROM kategori_produk where id='$data[kategori_produk_id]'"));  ?>
					<small>Kategori :<a href="<?php echo $url; ?>menu.php?kategori=<?php echo $kat['id'] ?>"><?php echo $kat['nama'] ?></a></small>
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%"> 
					</a>
					<br><br>
					<p><?php echo $data['deskripsi'] ?></p>
					<p style="font-size:18px">Harga :<?php echo number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info" href="#" role="button">Pesan</a>
					</p>
				</div>   
				 
					
				
			</div>
			</div> 
		</div>
		
<?php }elseif(!empty($_GET['kategori'])){ ?>	

		<?php
			extract($_GET); 
			$kat = mysql_fetch_array(mysql_query("SELECT * FROM kategori_produk where id='$kategori'")); 
		?>
		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			<hr>
			<h3>Kategori : <?php echo $kat['nama'] ?></h3>
				<?php 
					$k = mysql_query("SELECT * FROM produk where kategori_produk_id='$kategori'");
					while($data = mysql_fetch_array($k)){
				?>
				<div class="col-md-4 content-menu">
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%">
						<h4><?php echo $data['nama'] ?></h4>
					</a>
					<p style="font-size:18px">Harga :<?php echo number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Lihat Detail</a>
						<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Pesan</a>
					</p>
				</div>  
				<?php } ?>
				
			</div>
			</div>
		</div>

<?php }else{ ?>	
			
			<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">

			<h3 style="color: #fff; font-weight: bold;">Daftar Semua Menu</h3>
				<?php 
					$k = mysql_query("SELECT * FROM produk");
					while($data = mysql_fetch_array($k)){
				?>
				<div class="col-md-4 content-menu">
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%">
						<h4><?php echo $data['nama'] ?></h4>
					</a>
					<p style="font-size:18px">Harga :<?php echo "Rp. " . number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Lihat Detail</a>
						<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Pesan</a>
					</p>
				</div>  
				<?php } ?>
				
			</div>
			</div>
		</div>

<?php } ?>	
