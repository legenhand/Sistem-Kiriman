<?php
    include "../../library/config.php";
    session_start();

            $insert = date('d-m-Y H-i-s') . "| Input Di " . $_SESSION['kantor'];
    
            $query = mysqli_query($con, "INSERT INTO datakiriman SET no_resi = $_POST[resi],
                                    id_provinces = $_POST[provinsi],
                                    id_regencies = $_POST[kota],
                                    berat = $_POST[berat],
                                    koli = $_POST[koli],
                                    total = $_POST[total],
                                    nama_penerima = '$_POST[nama_penerima]',
                                    alamat_penerima = '$_POST[alamat_penerima]',
                                    telp_penerima = $_POST[telp_penerima],
                                    nama_pengirim = '$_POST[nama_pengirim]',
                                    alamat_pengirim = '$_POST[alamat_pengirim]',
                                    telp_pengirim = $_POST[telp_pengirim]   
                                    ");
            $querystatus = mysqli_query($con, "INSERT INTO status SET no_resi = $_POST[resi],
                                    kode_status = '1',
                                    status = '$insert'
                                    ");
    if($query && $querystatus){
        echo "Data Berhasil disimpan!";
    }else{
        echo "tidak dapat menyimpan data! <br>";
        echo mysqli_error($con);
    }
?>