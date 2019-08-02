<?php
    include "../library/config.php";
    $query = mysqli_query($con, "INSERT INTO ongkir SET id_provinces = '$_POST[provinsi]',
                                                        id_regencies ='$_POST[kota]',
                                                        ongkir = '$_POST[ongkir]'
                                                        ");

    if($query){
        echo "Data berhasil disimpan!";
    }else{
        echo "Tidak dapat menyimpan data!";
        echo mysqli_error();
    }
?>