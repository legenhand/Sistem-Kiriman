<?php
    if(!defined('INDEX')) die("");
?>

<h2 class="judul">Data Ongkos Kirim</h2>
<a class="tombol" href="?hal=ongkir_tambah">Tambah</a>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Ongkir/kg</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query = mysqli_query($con,"SELECT * FROM `ongkir` INNER JOIN regencies ON ongkir.id_regencies=regencies.id INNER JOIN provinces ON ongkir.id_provinces=provinces.id ORDER BY ongkir.id_regencies DESC ");
    $no = 0;
    while($data = mysqli_fetch_array($query)){
        $no++;
?>
    <tr>
        <td><?= $no ?></td>
        <td><?= $data['name_province'] ?></td>
        <td><?= $data['name'] ?></td>
        <td><?= $data['ongkir'] ?></td>    
        <td>
            <a class="tombol edit" href="?hal=ongkir_edit&id=<?=$data['id_regencies']?>"> Edit </a>
            <a class="tombol hapus" href="?hal=ongkir_hapus&id=<?=$data['id_regencies']?>"> Hapus </a>

        </td>
    </tr>
<?php
    }
?>    
    </tbody>
</table>