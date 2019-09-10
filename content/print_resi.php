<?php
    include "../library/config.php"; 
    $query = mysqli_query($con, "SELECT * FROM datakiriman WHERE no_resi='$_GET[id]'");
    $data = mysqli_fetch_array($query);
    $sql_ongkir = mysqli_query($con, "SELECT * FROM ongkir WHERE id_regencies = $data[id_regencies]");
    $ongkir = mysqli_fetch_array($sql_ongkir);
    
?>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="h-100">
    <div class="row">
        <form class="col-4">
        <h4 class="m-2">Detail Kiriman</h4>
        <hr class="m-1">
        <div class="form-group m-0">
                Tanggal input : <?= $data['tgl'] ?>
        </div>
        <div class="form-group m-0">
                <div class="inputresi">No Resi : <?= $data['no_resi'] ?></div>
        </div>

        <div id="kiri">    
        <div id="kiri">      
            <div class="form-group m-0">
                <h5>Tujuan</h5>
            </div>
            <div class="form-group m-0">
            
        <?php
                            $queryprov = mysqli_query($con, "SELECT * FROM provinces");
                            while($prov = mysqli_fetch_array($queryprov)){
                                if($prov['id'] == $data['id_provinces'])
                                echo "provinsi :" . $prov['name_province'];
                            }
                            ?>
            </div>
            <div class="form-group m-0">
                <div class="input">
                    
                    <?php
                            $querykota = mysqli_query($con, "SELECT * FROM regencies WHERE province_id='$data[id_provinces]'");
                            while($kota = mysqli_fetch_array($querykota)){
                                if($kota['id'] == $data['id_regencies'])
                                echo "kota :". $kota['name'] . "<br>";
                            }
                            ?>
                </div>
            </div>
            <div class="form-group">
                <div class="input">Berat : <?= $data['berat'] ?> kg</div>
                
                <div class="inputkecil">Koli : <?= $data['koli'] ?></div>
            </div>
            <div class="form-group">
                
                <div class="input">Ongkos Kirim/kg : <?= $ongkir['ongkir'] ?></div>
            </div>
            <div class="form-group">
                
                <div class="input">Total Ongkir : <?= $data['total'] ?></div>
            </div>
        </div>
        <div id="kanan">
            <div class="form-group">
                <h4>Penerima</h4>
            </div>
            <div class="form-group">
                <div class="input">Nama : <?= $data['nama_penerima'] ?></div>
            </div>
            <div class="form-group">
                <div class="input">Alamat : <?= $data['alamat_penerima'] ?></div>
            </div>
            <div class="form-group">
                <div class="input">No. Telp : <?= $data['telp_penerima'] ?></div>
            </div>
            <div class="form-group">
                <h4>Pengirim</h4>
            </div>
            <div class="form-group">
                <div class="input">Nama : <?= $data['nama_pengirim']?></div>
            </div>
            <div class="form-group">
                <div class="input">Alamat : <?= $data['alamat_pengirim'] ?></div>
            </div>
            <div class="form-group">
                <div class="input">No. Telp : <?= $data['telp_pengirim'] ?></div>
            </div>
        </div>
        <div id="kanan">
        </div>
        </div>
        </form>
        <script>
            window.print();
        </script>
    </div>
</body>