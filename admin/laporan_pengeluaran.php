<?php
	ob_start();
	include"../inc/config.php";
	validate_admin_not_login("login.php");
	if (@$_GET['act'] != "cetak") {
		include"inc/header.php";
	}
?>

<div class="container">
	
    <img src="ag.png" height="50" />
	<h4>Laporan Pengeluaran</h4>
	<?php
		if (@$_GET['act'] != "cetak") {
			?>
				<a href="?act=cetak" class="btn btn-primary">Cetak</a>
			<?php
		}
	?>
	<div class="col-md-12">
		<hr/>
	</div>

	<div class="row">
		<table class="table table-striped" border="1">
			<tr>
				<th>No</th>
				<th>Nama barang</th>
				<th>Tanggal Pengeluaran</th>
				<th>Harga</th>
                <th>Jumlah Barang</th>
                <th>Total</th>
			</tr>
			<tbody>
				<?php
          $totalall =0;

					$no = 0;
					$q = mysql_query("Select laporan.* from laporan order by id_pengeluaran desc") or die (mysql_error());
					while ($data = mysql_fetch_object($q)) {
						$no++;
              $totalall += $data->total;
							$tgl=explode("-",$data->Tanggal_pengeluaran);
							$tgl1=$tgl['2'].'-'. $tgl['1'].'-'. $tgl['0'];
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data->nama_barang; ?></td>
							<td><?php echo $tgl1; ?></td>
							<td><?php echo "Rp. " .number_format($data->harga, 2, ",", "."); ?></td>
              <td><?php echo $data->jumlah; ?></td>
							<td><?php echo "Rp. " .number_format($data->total, 2, ",", "."); ?></td>
						</tr>
						<?php
					}
				?>
				<tr>
					<td colspan="5" align="right">
						<font size="3">
							<b>TOTAL</b>
						</font>
					</td>
					<td>
						<font size="3"><?php echo number_format($totalall, 2, ",", "."); ?></font>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php
if (@$_GET['act'] == "cetak") {
	include("../assets/cetaklapin.php");
	
}
else {
	include"inc/footer.php";
}
?>