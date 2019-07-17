<?php
    if(!defined('INDEX')) die("");

    $query = mysqli_query($con, "DELETE FROM datakiriman WHERE no_resi='$_GET[id]'");

    if($query){
        echo "Data berhasil dihapus!";
        echo "<meta http-equiv='refresh' content='1; url=?hal=kiriman'>";
    }else{
        echo "tidak dapat menghapus data!";
        echo mysqli_error;
    }
?>