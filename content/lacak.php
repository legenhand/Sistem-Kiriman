<?php
    if(!defined('INDEX')) die("");
?>
<h4 class="mt-3">Cek status kiriman</h4>
<form id="form-lacak">
    <div class="form-group">
        <label for="resi">No. Resi</label>
        <div class="inputresi"><input type="text" name="resi" id="resi"></div>
    </div>
    <div class="form-group">
        <input type="submit" value="Cek" class="btn btn-lg btn-info" id="lacak">
        <input type="reset" value="Batal" class="btn btn-lg btn-danger">
    </div>     
</form>
<div id="result">
</div>