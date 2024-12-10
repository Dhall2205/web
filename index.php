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

<h3 style="color: #fff; font-weight: bold;">Home</h3>

		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
				</div>
			<div class="col-md-12">
			<div style="background:#ffffff; width:100%; height:auto; padding-top:3px;padding-bottom:3px; padding-left:10px;">
			<h4>Favorite Menu</h4>
			</div>
				
				<?php 
					$k = mysql_query("SELECT * FROM produk ORDER BY id ASC limit 3"); 
					while($data = mysqli_fetch_array($k)){
				?>
				<div class="col-md-4 content-menu">
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%">
						<h4><?php echo $data['nama'] ?></h4>
					</a>
					<p><?php echo $data['deskripsi'] ?></p>
					<p style="font-size:18px">Harga :<?php echo "Rp. " . number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Lihat Detail</a>
						<a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Pesan</a>
					</p>
				</div>  
				<?php } ?>
				 
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<br/>
			<div style="background:#ffffff; width:100%; height:auto; padding-top:3px;padding-bottom:3px; padding-left:10px;">
			<h4>Menu Terbaru</h4>
			</div>
				<?php 
					$k = mysql_query("SELECT * FROM produk ORDER BY id DESC limit 3"); 
					while($data = mysqli_fetch_array($k)){
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
		
