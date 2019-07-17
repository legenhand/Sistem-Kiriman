<?php
    if(!defined('INDEX')) die("");

    $halaman = array("dashboard","kiriman","kiriman_tambah", "kiriman_insert", "kiriman_edit",
    "kiriman_update", "kiriman_hapus", "ongkir", "ongkir_tambah", "ongkir_insert",
    "ongkir_edit", "ongkir_update", "ongkir_hapus", "kiriman_detail");

    if(isset($_GET['hal'])) $hal = $_GET['hal'];
    else $hal = "dashboard";

    foreach($halaman as $h){
        if($hal == $h){
            include "content/$h.php";
            break;
        }
    }
?>