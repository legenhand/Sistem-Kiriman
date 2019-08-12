<?php
    if(!defined('INDEX')) die("");
?>
<head>

</head>
<h4 class="mt-2">Kiriman</h4>
<hr>
<form class="mb-5" method="post" id="kiriman-tambah">
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="resi" id="resi">No Resi</label>
    <div class="col-sm-3">
        <input class="form-control" type="text" name="resi" id="resi" data-validation="number">
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
                    while($row_provinsi = mysqli_fetch_array($sql_provinsi)){
                        ?>              <option value="<?= $row_provinsi['id'] ?>"><?= $row_provinsi['name_province'] ?></option>
    <?php                    
                    }    
    ?>
                </select>
                </div>
            </div>

        <div class="form-group row">
        <label class="col-sm-3 col-form-label" for="kota">Kota</label>
            <div class="col-sm-6">
                <select class="form-control" name="kota" id="kota" data-validation="required">
                    <option value="">Pilih Provinsi terlebih dahulu</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="berat">Berat</label>
            <div class="col-sm-2"><input class="form-control" type="text" name="berat" id="berat" onkeyup="hitung2();" data-validation="required"></div>
            <label class="col-sm-2 col-form-label" for="koli">Koli</label>
            <div class="col-sm-2"><input class="form-control" type="text" name="koli" class="koli" id="koli" onkeyup="hitung2();" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="ongkir">Ongkir/kg</label>
            <div class="col-sm-5"><input class="form-control" type="text" name="ongkir" id="ongkir" onkeyup="hitung2();" readonly></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="total">Total Ongkir</label>
            <div class="col-sm-6"><input class="form-control" type="text" name="total" id="total" readonly></div>
        </div>
    </div>
    <div class="col">
        <h5 class="mt-2">Penerima</h5>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nama_penerima">Nama</label>
            <div class="col-sm-7"><input class="form-control" type="text" name="nama_penerima" id="nama_penerima" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="alamat_penerima">Alamat</label>
            <div class="col-sm-7"><textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3" data-validation="required"></textarea></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="telp_penerima">No. Telp</label>
            <div class="col-sm-6"><input class="form-control" type="number" name="telp_penerima" id="telp_penerima" data-validation="required"></div>
        </div>
        
        <h5 class="mt-2">Pengirim</h5>
        <hr>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nama_pengirim">Nama</label>
            <div class="col-sm-7"><input class="form-control" type="text" name="nama_pengirim" id="nama_pengirim" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="alamat_pengirim">Alamat</label>
            <div class="col-sm-7"><textarea class="form-control" name="alamat_pengirim" id="alamat_pengirim" rows="3" data-validation="required"></textarea></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="telp_pengirim">No. Telp</label>
            <div class="col-sm-6"><input class="form-control" type="number" name="telp_pengirim" id="telp_pengirim" data-validation="required"></div>
        </div>
        <div class="form-group row">
            <a class="btn btn-lg btn-success text-white" id="tambah-kiriman">Simpan</a>&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Batal" class="btn btn-lg btn-danger">
        </div>
        <div id="result"></div>
    </div>
    </form>
</div>