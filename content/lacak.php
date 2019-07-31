<?php
    if(!defined('INDEX')) die("");
?>
<h2 class="judul">Cek status kiriman</h2>
<form id="form-lacak">
    <div class="form-group">
        <label for="resi">No. Resi</label>
        <div class="inputresi"><input type="text" name="resi" id="resi"></div>
    </div>
    <div class="form-group">
        <input type="submit" value="Cek" class="tombol simpan" id="lacak">
        <input type="reset" value="Batal" class="tombol reset">
    </div>     
</form>
<div id="result">
</div>