<?php
    if(!defined('INDEX')) die("");
    $query = mysqli_query($con, "DELETE FROM ongkir WHERE id_regencies='$_GET[id]'");

    if($query){
        echo "Data berhasil dihapus!";
        echo "<meta http-equiv='refresh' content='1;url=?hal=ongkir'>";
    }else{
        echo "tidak dapat menghapus data!<br>";
        echo mysqli_error();
    }
?>