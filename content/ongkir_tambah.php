<?php
    if(!defined('INDEX')) die("");
?>

<h2 class="judul">Atur Ongkos Kirim</h2>
<form method="post" id="ongkir-tambah">

    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <div class="input">
<?php
            $sql_provinsi = mysqli_query($con, 'select * from provinces');
?>
            <select name="provinsi" id="provinsi" data-validation="required">
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

    <div class="form-group">
    <label for="kota">Kota</label>
        <div class="input">
            <select name="kota" id="kota" data-validation="required">
                <option value="">Pilih Provinsi terlebih dahulu</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="ongkir">Ongkir</label>
        <div class="input"><input type="number" name="ongkir" id="ongkir" data-validation="required"></div>
    </div>        
    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>    
    <div id="result">
    </div>   
</form>