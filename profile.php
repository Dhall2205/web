 <?php 
	include"inc/config.php";
	
	if(empty($_SESSION['iam_user'])){
		redir("index.php");
	}
	$user = mysql_fetch_object(mysql_query("select * from user where id='$_SESSION[iam_user]'"));
	
	include"layout/header.php";
	
	$q = mysql_query("select * from pesanan where user_id='$_SESSION[iam_user]'");
			$j = mysql_num_rows($q);
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
			<div class="col-md-12 content-menu" style="margin-top:20px;">
			<h3>Profile : <?php echo $user->nama; ?></h3>
				<hr>
				<div class="col-md-6	 content-menu" style="margin-top:-20px;">
				 <table class="table table-striped">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $user->nama; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $user->email; ?></td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td>:</td>
						<td><?php echo $user->telephone; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $user->alamat; ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td>--- *** --</td>
					</tr>
					
				 </table>
				
				 
				</div>   
				
				<div class="col-md-12 content-menu" style="margin-top:20px;">
				<h3>Riwayat Pemesanan </h3>
					<table class="table table-striped table-hove"> 
			<thead> 
				<tr> 
					<th>No</th> 
					<th>Nama Pemesan</th> 
					<th>Tanggal Pesan</th> 
					<th>Tanggal Digunakan</th> 
					<th>Telephone</th> 
					<th>Alamat</th>  
				</tr> 
			</thead> 
			<tbody> 
		<?php while($data=mysql_fetch_object($q)){ ?> 
				<tr <?php if($data->read == 0 ){ echo 'style="background:#cce9f8 !important;"'; } ?> > 
					<th scope="row"><?php echo $no++; ?></th> 
					<?php
						$katpro = mysql_query("select * from user where id='$data->user_id'");
								$user = mysql_fetch_array($katpro);
					?>
					<td><?php echo $data->nama ?></td> 
					<td><?php echo substr($data->tanggal_pesan,0,10) ?></td> 
					<td><?php echo $data->tanggal_digunakan ?></td> 
					<td><?php echo $data->telephone ?></td> 
					<td><?php echo $data->alamat ?></td> 
					<!--td>  
						<a class="btn btn-sm btn-danger" href="pesanan.php?act=delete&&id=<?php echo $data->id ?>">Batalkan</a>
					</td--> 
				</tr>
		<?php } ?>
			</tbody> 
		</table> 
					
				</div>   
				 
					
				
			</div>
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>