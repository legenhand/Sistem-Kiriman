<?php
    if(!defined('INDEX')) die("");

    $query = mysqli_query($con, "UPDATE ongkir SET ongkir = '$_POST[ongkir]' WHERE id_regencies='$_POST[kotatemp]'");
    if($query){
        echo "Data berhasil disimpan";
        echo "<meta http-equiv='refresh' content='1;url=?hal=ongkir'>";
    }else{
        echo "tidak dapat menyimpan data!<br>";
        echo mysqli_error();
    }
?>