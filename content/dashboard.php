<?php
   if(!defined('INDEX')) die("");
   $jml_kiriman = mysqli_num_rows(mysqli_query($con, "SELECT * FROM datakiriman"));
   $jml_ongkir = mysqli_num_rows(mysqli_query($con, "SELECT * FROM ongkir"));
?>
<div class="jumbotron mt-3">
    <H1>Selamat Datang <?= $_SESSION['nama_lengkap'] ?> di </h1> 
    <h1 class="display-4"> Aplikasi Manajemen kiriman</H1>
    <h3>Anda login sebagai Administrator<H3>
</div>
<div class="row mb-3 pb-3">
    <div class="col-sm-6 mb-3">
        <ul class="list-group">
            <li class="list-group-item text-danger">
                <i class="oi oi-list-rich display-3"></i>
                <span class="display-3 float-right"><?= $jml_kiriman?></span>
            </li>
            <li class="list-group-item bg-danger">
                <a href="?hal=kiriman" class="nav-link text-white">Data Kiriman </a>
            </li>
        </ul>
    </div>
    <div class="col-sm-6 mb-3">
        <ul class="list-group">
            <li class="list-group-item text-success">
                <i class="oi oi-dollar display-3"></i>
                <span class="display-3 float-right"><?= $jml_ongkir?></span>
            </li>
            <li class="list-group-item bg-success">
                <a href="?hal=kiriman" class="nav-link text-white">Data Ongkos Kirim </a>
            </li>
        </ul>
    </div>
</div>