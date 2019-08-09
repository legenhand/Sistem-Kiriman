<?php
    if(!defined('INDEX')) die("");
?>

<h4 class="mt-2">Atur Ongkos Kirim</h4>
<hr>
<form class="mb-5" method="post" id="ongkir-tambah">

    <div class="form-group row">
        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-4">
<?php
            $sql_provinsi = mysqli_query($con, 'select * from provinces');
?>
            <select class="form-control" name="provinsi" id="provinsi" data-validation="required">
                <option value="">Pilih Provinsi</option>
<?php 
                while($row_provinsi = mysqli_fetch_array($sql_provinsi)){
?>              <option value="<?= $row_provinsi['id'] ?>"><?= $row_provinsi['name_province'] ?></option>
<?php                    
                }    
?>
            </select>
        </div>
    </div>

    <div class="form-group row">
    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
        <div class="col-sm-4">
            <select class="form-control" name="kota" id="kota" data-validation="required">
                <option value="">Pilih Provinsi terlebih dahulu</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="ongkir" class="col-sm-2 col-form-label">Ongkir</label>
        <div class="col-sm-4"><input class="form-control" type="number" name="ongkir" id="ongkir" data-validation="required"></div>
    </div>        
    <div class="form-group row">
        <a class="btn btn-lg btn-success" id="tambah-ongkir">Simpan</a>
        <input type="reset" value="Batal" class="btn btn-lg btn-danger">
    </div>    
    <div id="result">
    </div>   
</form>