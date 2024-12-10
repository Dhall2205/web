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

<h3 style="color: #fff; font-weight: bold;">Info Pembayaran</h3>

<div class="col-md-9">
	<div class="row">
		<?php
			$q = mysql_query("Select * from info_pembayaran limit 1") or die (mysql_error());
			$data = mysql_fetch_object($q);
		?>
		<pre><?php echo $data->info; ?></pre>
	</div>
</div>


<a href="https://api.whatsapp.com/send?phone=6282276429672"style="color: #FFD700; font-weight: bold;"> >> SILAHKAN KONFIRMASI VIA WHATSAPP YAA !! << </a>


<?php
	include "layout/footer.php";
?>