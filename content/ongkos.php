<?php
    require_once "../library/config.php";

    $kota_id = $_POST['kot_id'];

    $sql_ongkir = mysqli_query($con, "SELECT * FROM ongkir WHERE id_regencies = $kota_id");
    while($row_ongkir = mysqli_fetch_array($sql_ongkir)){
        echo $row_ongkir['ongkir'];
    }
?>