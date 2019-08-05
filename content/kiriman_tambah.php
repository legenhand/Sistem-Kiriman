<?php
    if(!defined('INDEX')) die("");
?>
<head>

</head>
<h2 class="judul">Kiriman</h2>
<form method="post" id="kiriman-tambah">
<div class="form-group">
        <label for="resi" id="resi">No Resi</label>
        <div class="inputresi">
            <input type="text" name="resi" id="resi" data-validation="number">
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
        <label for="berat">Berat</label>
        <div class="inputkecil"><input type="text" name="berat" id="berat" onkeyup="hitung2();" data-validation="required"></div>
        <label for="koli" id="koli" >Koli</label>
        <div class="inputkecil"><input type="text" name="koli" class="koli" id="koli" onkeyup="hitung2();" data-validation="required"></div>
    </div>
    <div class="form-group">
        <label for="ongkir">Ongkos Kirim/kg</label>
        <div class="input"><input type="text" name="ongkir" id="ongkir" onkeyup="hitung2();" readonly></div>
    </div>
    <div class="form-group">
        <label for="total">Total Ongkir</label>
        <div class="input"><input type="text" name="total" id="total" readonly></div>
    </div>
</div>
<div id="kanan">
    <div class="form-group">
        <h4>Penerima</h4>
    </div>
    <div class="form-group">
        <label for="nama_penerima">Nama</label>
        <div class="input"><input type="text" name="nama_penerima" id="nama_penerima" data-validation="required"></div>
    </div>
    <div class="form-group">
        <label for="alamat_penerima">Alamat</label>
        <div class="input"><textarea name="alamat_penerima" id="alamat_penerima" rows="3" data-validation="required"></textarea></div>
    </div>
    <div class="form-group">
        <label for="telp_penerima">No. Telp</label>
        <div class="input"><input type="number" name="telp_penerima" id="telp_penerima" data-validation="required"></div>
    </div>
    <div class="form-group">
        <h4>Pengirim</h4>
    </div>
    <div class="form-group">
        <label for="nama_pengirim">Nama</label>
        <div class="input"><input type="text" name="nama_pengirim" id="nama_pengirim" data-validation="required"></div>
    </div>
    <div class="form-group">
        <label for="alamat_pengirim">Alamat</label>
        <div class="input"><textarea name="alamat_pengirim" id="alamat_pengirim" rows="3" data-validation="required"></textarea></div>
    </div>
    <div class="form-group">
        <label for="telp_pengirim">No. Telp</label>
        <div class="input"><input type="number" name="telp_pengirim" id="telp_pengirim" data-validation="required"></div>
    </div>
    <div class="form-group">
        <a class="tombol simpan" id="tambah-kiriman">Simpan</a>
        <input type="reset" value="Batal" class="tombol reset">
    </div>
    <div id="result"></div>
</div>
</form>