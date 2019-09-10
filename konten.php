<?php
    if(!defined('INDEX')) die("");

    $halaman = array("dashboard","kiriman/kiriman","kiriman/tambah", "kiriman/insert", "kiriman/edit",
    "kiriman/update", "kiriman/hapus", "kiriman/detail" , "ongkir", "ongkir_tambah", "ongkir_insert",
    "ongkir_edit", "ongkir_update", "ongkir_hapus", "print_resi", "lacak");

    if(isset($_GET['hal'])) $hal = $_GET['hal'];
    else $hal = "dashboard";

    foreach($halaman as $h){
        if($hal == $h){
            include "content/$h.php";
            break;
        }
    }
?>