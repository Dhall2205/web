<!DOCTYPE html>
<html>
<head>
    
    
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="datepicker/css/datepicker.css">


</head>
<body>
<div class="container">
    <br>
    <h4>Pencarian Data Berdasarkan Tanggal</h4>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

        <div class="form-group">
            <label>Tanggal Awal</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_mulai" placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Akhir</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>">
            </div>
        </div>

        <script type="text/javascript">
            $(function(){
                $(".datepicker").datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: false,
                });
                $("#tgl_mulai").on('changeDate', function(selected) {
                    var startDate = new Date(selected.date.valueOf());
                    $("#tgl_akhir").datepicker('setStartDate', startDate);
                    if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
                        $("#tgl_akhir").val($("#tgl_mulai").val());
                    }
                });
            });
        </script>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Cari">
    </div>
    </form>
<div class='tengah'>
 <a target="_blank" href="../assets/cetak.php">Cetak Laporan</a>
        </div>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Tempo</th>
                <th>Tanggal Pesan</th>
                <th>Ongkir</th>
                <th>Status</th>
            </tr>
        </thead>
        <?php

        include"../inc/config.php";
include"inc/header.php";
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));


            $sql="select * from pesanan where tanggal_pesan between '".$tgl_awal."' and '".$tgl_akhir."' order by id asc";

        }else {
            $sql="select * from pesanan order by id asc";
        }

        $hasil=mysql_query($sql);
        $no=0;
        while ($data = mysql_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["tanggal_digunakan"];   ?></td>
                <td><?php echo date('d-m-Y', strtotime($data["tanggal_pesan"]));   ?></td>
                <td><?php echo $data["ongkir"];   ?></td>
               <td><?php echo $data["status"];   ?></td>
            </tr>
            </tbody>
            
            <?php 
        } 
            ?>
    </table>
</div>
</body>


</html>

<?php include"inc/footer.php"; ?>