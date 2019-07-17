<?php
    if(!defined('INDEX')) die("");

    $query = mysqli_query($con, "SELECT * FROM ongkir WHERE id_regencies='$_GET[id]'");
    $data = mysqli_fetch_array($query);
?>

<h2 class="judul">Atur Ongkos Kirim</h2>
<form action="?hal=ongkir_update" method="post">

<div class="form-group">
        <label for="provinsi">Provinsi</label>
        <div class="input">
<?php
            $sql_provinsi = mysqli_query($con, 'select * from provinces');
?>
<input type="hidden" name="kotatemp" id="kotatemp" value="<?= $data['id_regencies'] ?>">
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
        <label for="ongkir">Ongkir</label>
        <div class="input"><input type="text" name="ongkir" id="ongkir" value="<?= $data['ongkir'] ?>"></div>
    </div>        
    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>       
</form>