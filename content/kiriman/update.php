<?php
    include "../../library/config.php";
    session_start();
    if(!defined('INDEX')) die("");
    
    
    
            $query = mysqli_query($con, "UPDATE datakiriman SET id_provinces = $_POST[provinsi],
                                    id_regencies = $_POST[kota],
                                    berat = $_POST[berat],
                                    koli = $_POST[koli],
                                    total = $_POST[total],
                                    nama_penerima = '$_POST[nama_penerima]',
                                    alamat_penerima = '$_POST[alamat_penerima]',
                                    telp_penerima = $_POST[telp_penerima],
                                    nama_pengirim = '$_POST[nama_pengirim]',
                                    alamat_pengirim = '$_POST[alamat_pengirim]',
                                    telp_pengirim = $_POST[telp_pengirim] WHERE no_resi = $_POST[resi]   
                                    ");
    if($query){
        echo "Data Berhasil di edit!";
    }else{
        echo "tidak dapat menyimpan data! <br>";
        echo mysqli_error($con);
    }
?>