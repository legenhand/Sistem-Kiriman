<?php
    if(!defined('INDEX')) die("");
    $query = mysqli_query($con, "SELECT * FROM datakiriman WHERE no_resi='$_GET[id]'");
    $data = mysqli_fetch_array($query);
    $sql_ongkir = mysqli_query($con, "SELECT * FROM ongkir WHERE id_regencies = $data[id_regencies]");
    $ongkir = mysqli_fetch_array($sql_ongkir);
?>
<head>

</head>
<h2 class="judul">Detail Kiriman</h2>
<form>
<div class="form-group">
        <label for="resi" id="resi">No Resi</label>
        <div class="inputresi">
            <input type="text" name="resi" id="resi" value="<?= $data['no_resi'] ?>" disabled>
        </div>
</div>
<div id="kiri">    
    
    <div class="form-group">
        <h4>Tujuan</h4>
    </div>
    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <div class="input">
<?php
            $sql_provinsi = mysqli_query($con, 'select * from provinces');
?>
            <select name="provinsi" id="provinsi" disabled>
                <option value="">Pilih Provinsi</option>
<?php
                    $queryprov = mysqli_query($con, "SELECT * FROM provinces");
                    while($prov = mysqli_fetch_array($queryprov)){
                        echo "<option value='$prov[id]'";
                        if($prov['id'] == $data['id_provinces']) echo "selected";
                        echo ">$prov[name_province]</option>";
                    }
?>
            </select>
        </div>
    </div>

    <div class="form-group">
    <label for="kota">Kota</label>
        <div class="input">
            <select name="kota" id="kota" disabled>
            <?php
                    $querykota = mysqli_query($con, "SELECT * FROM regencies WHERE province_id='$data[id_provinces]'");
                    while($kota = mysqli_fetch_array($querykota)){
                        echo "<option value='$kota[id]'";
                        if($kota['id'] == $data['id_regencies']) echo "selected";
                        echo ">$kota[name]</option>";
                    }
?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="berat">Berat</label>
        <div class="inputkecil"><input type="text" name="berat" id="berat" onkeyup="hitung2();" value="<?= $data['berat'] ?>" disabled></div>
        <label for="koli" id="koli">Koli</label>
        <div class="inputkecil"><input type="text" name="koli" class="koli" id="koli" onkeyup="hitung2();" value="<?= $data['koli'] ?>" disabled></div>
    </div>
    <div class="form-group">
        <label for="ongkir">Ongkos Kirim/kg</label>
        <div class="input"><input type="text" name="ongkir" id="ongkir" onkeyup="hitung2();" value="<?= $ongkir['ongkir'] ?>" disabled></div>
    </div>
    <div class="form-group">
        <label for="total">Total Ongkir</label>
        <div class="input"><input type="text" name="total" id="total" value="<?= $data['total'] ?>" disabled></div>
    </div>
</div>
<div id="kanan">
    <div class="form-group">
        <h4>Penerima</h4>
    </div>
    <div class="form-group">
        <label for="nama_penerima">Nama</label>
        <div class="input"><input type="text" name="nama_penerima" id="nama_penerima" value="<?= $data['nama_penerima'] ?>" disabled></div>
    </div>
    <div class="form-group">
        <label for="alamat_penerima">Alamat</label>
        <div class="input"><textarea name="alamat_penerima" id="alamat_penerima" rows="3" disabled><?= $data['alamat_penerima'] ?></textarea></div>
    </div>
    <div class="form-group">
        <label for="telp_penerima">No. Telp</label>
        <div class="input"><input type="text" name="telp_penerima" id="telp_penerima" value="<?= $data['telp_penerima'] ?>" disabled></div>
    </div>
    <div class="form-group">
        <h4>Pengirim</h4>
    </div>
    <div class="form-group">
        <label for="nama_pengirim">Nama</label>
        <div class="input"><input type="text" name="nama_pengirim" id="nama_pengirim" value="<?= $data['nama_pengirim']?>" disabled></div>
    </div>
    <div class="form-group">
        <label for="alamat_pengirim">Alamat</label>
        <div class="input"><textarea name="alamat_pengirim" id="alamat_pengirim" rows="3" disabled><?= $data['alamat_pengirim'] ?></textarea></div>
    </div>
    <div class="form-group">
        <label for="telp_pengirim">No. Telp</label>
        <div class="input"><input type="text" name="telp_pengirim" id="telp_pengirim" value="<?= $data['telp_pengirim'] ?>" disabled></div>
    </div>
    <div class="form-group">
    <a class="tombol" href="?hal=kiriman">Kembali</a>
    </div>
</div>
</form>