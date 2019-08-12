<?php
    if(!defined('INDEX')) die("");

    $query = mysqli_query($con, "SELECT * FROM ongkir WHERE id_regencies='$_GET[id]'");
    $data = mysqli_fetch_array($query);
?>
<h4 class="mt-2">Atur Ongkos Kirim</h4>
<hr>

<form class="mb-5" action="?hal=ongkir_update" method="post">

<div class="form-group row">
        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-4">
<?php
            $sql_provinsi = mysqli_query($con, 'select * from provinces');
?>
<input type="hidden" class="form-control" name="kotatemp" id="kotatemp" value="<?= $data['id_regencies'] ?>">
            <select class="form-control" name="provinsi" id="provinsi" disabled>
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
        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
        <div class="col-sm-4">
            <select class="form-control" name="kota" id="kota" disabled>
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
        <label for="ongkir" class="col-sm-2 col-form-label">Ongkir</label>
        <div class="col-sm-4"><input class="form-control" type="number" name="ongkir" id="ongkir" data-validation="required" value="<?= $data['ongkir']?>"></div>
    </div>           
    <div class="form-group row">
        <input type="submit" value="Simpan" class="btn btn-lg btn-success text-white m-2">
        <input type="reset" value="Batal" class="btn btn-lg btn-danger m-2">
    </div>       
</form>