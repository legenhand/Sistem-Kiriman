<?php
    if(!defined('INDEX')) die("");
    $query = mysqli_query($con, "SELECT * FROM datakiriman WHERE no_resi='$_GET[id]'");
    $data = mysqli_fetch_array($query);
    $sql_ongkir = mysqli_query($con, "SELECT * FROM ongkir WHERE id_regencies = $data[id_regencies]");
    $ongkir = mysqli_fetch_array($sql_ongkir);
?>
<head>

</head>
<h4 class="mt-2">Kiriman</h4>
<hr>
<form class="mb-5" method="post" id="kiriman-tambah">
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="resi" id="resi">No Resi</label>
    <div class="col-sm-3">
        <input class="form-control" type="text" name="resi" id="resi" data-validation="number" value="<?= $data['no_resi']?>" readonly>
    </div>
</div>
<div class="row">
    <div class="col">
        <h5 class="mt-2">Tujuan</h5>
        <hr>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="provinsi">Provinsi</label>
                <div class="col-sm-6">
<?php
            $sql_provinsi = mysqli_query($con, 'select * from provinces');
?>
            <select class="form-control" name="provinsi" id="provinsi" data-validation="required">
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

    <div class="form-group row">
        <label class="col-sm-3 col-form-label" for="kota">Kota</label>
            <div class="col-sm-6">
            <select class="form-control" name="kota" id="kota" data-validation="required">
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
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="berat">Berat</label>
            <div class="col-sm-2"><input class="form-control" type="text" name="berat" id="berat" onkeyup="hitung2();" data-validation="required" value="<?= $data['berat']?>"></div>
            <label class="col-sm-2 col-form-label" for="koli">Koli</label>
            <div class="col-sm-2"><input class="form-control" type="text" name="koli" class="koli" id="koli" onkeyup="hitung2();" data-validation="required" value="<?= $data['koli']?>"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="ongkir">Ongkir/kg</label>
            <div class="col-sm-5"><input class="form-control" type="text" name="ongkir" id="ongkir" onkeyup="hitung2();" value="<?= $ongkir['ongkir']?>" readonly></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="total">Total Ongkir</label>
            <div class="col-sm-6"><input class="form-control" type="text" name="total" id="total" value="<?= $data['total']?>" readonly></div>
        </div>
    </div>
    <div class="col">
        <h5 class="mt-2">Penerima</h5>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nama_penerima">Nama</label>
            <div class="col-sm-7"><input class="form-control" type="text" name="nama_penerima" id="nama_penerima" value="<?= $data['nama_penerima']?>" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="alamat_penerima">Alamat</label>
            <div class="col-sm-7"><textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3" data-validation="required"><?= $data['alamat_penerima']?></textarea></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="telp_penerima">No. Telp</label>
            <div class="col-sm-6"><input class="form-control" type="number" name="telp_penerima" id="telp_penerima" value="<?= $data['telp_penerima']?>" data-validation="required"></div>
        </div>
        
        <h5 class="mt-2">Pengirim</h5>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nama_pengirim">Nama</label>
            <div class="col-sm-7"><input class="form-control" type="text" name="nama_pengirim" id="nama_pengirim" value="<?= $data['nama_pengirim']?>" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="alamat_pengirim">Alamat</label>
            <div class="col-sm-7"><textarea class="form-control" name="alamat_pengirim" id="alamat_pengirim" rows="3" data-validation="required"><?= $data['alamat_pengirim']?></textarea></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="telp_pengirim">No. Telp</label>
            <div class="col-sm-6"><input class="form-control" type="number" name="telp_pengirim" id="telp_pengirim" value="<?= $data['telp_pengirim']?>" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <a class="btn btn-lg btn-success text-white" id="tambah-kiriman">Simpan</a>&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Batal" class="btn btn-lg btn-danger">
        </div>
        <div id="result"></div>
    </div>
    </form>
</div>