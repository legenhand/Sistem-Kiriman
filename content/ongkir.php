<?php
    if(!defined('INDEX')) die("");
?>

<h4 class="mt-2">Data Ongkos Kirim</h4>
<hr>
<a class="btn btn-success" href="?hal=ongkir_tambah"><i class="oi oi-plus"></i>Tambah</a>
<div class="table-responsive mt-3">
    <table class="table table-striped table-hover table-bordered">
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
                    <a class="btn btn-sm btn-info" href="?hal=ongkir_edit&id=<?=$data['id_regencies']?>"><i class="oi oi-pencil"></i> Edit </a>
                    <a class="btn btn-sm btn-danger" href="?hal=ongkir_hapus&id=<?=$data['id_regencies']?>"> Hapus </a>

                </td>
            </tr>
<?php
    }
    ?>    
        </tbody>
    </table>
</div>