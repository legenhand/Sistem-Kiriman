<?php
    if(!defined('INDEX')) die("");
    
    $query = mysqli_query($con, "INSERT INTO ongkir SET id_provinces = '$_POST[provinsi]',
                                                        id_regencies ='$_POST[kota]',
                                                        ongkir = '$_POST[ongkir]'
                                                        ");

    if($query){
        echo "Data berhasil disimpan!";
        echo "<meta http-equiv='refresh' content='1; url=?hal=ongkir'>";
    }else{
        echo "Tidak dapat menyimpan data! <br>";
        echo mysqli_error();
    }
?>