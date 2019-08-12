<?php
    if(!defined('INDEX')) die("");
?>

<h4 class="mt-2">Data kiriman</h4>
<hr>
<a class="btn btn-success" href="?hal=kiriman_tambah"><i class="oi oi-plus"></i> Tambah</a>
<h5 class="mt-1">Klik pada no resi untuk detail kiriman</h5>
<div class="table-responsive mt-3">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Resi</th>
                <th>nama pengirim</th>
                <th>nama penerima</th>
                <th>Kota tujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php
    $query = mysqli_query($con, "SELECT * FROM datakiriman INNER JOIN regencies ON datakiriman.id_regencies=regencies.id ORDER BY datakiriman.no_resi ASC");
    $no  = 0;
    while($data = mysqli_fetch_array($query)){
        $no++;
?>
        <tr>
            <td><?= $no ?></td>
            <td><a href="?hal=kiriman_detail&id=<?= $data['no_resi'] ?>"><?= $data['no_resi'] ?></a></td>
            <td><?= $data['nama_pengirim'] ?></td>
            <td><?= $data['nama_penerima'] ?></td>
            <td><?= $data['name'] ?></td>
            <td>
                <a href="content/print_resi.php?id=<?= $data['no_resi']?>" class="btn btn-sm btn-light" target="_BLANK"><i class="oi oi-print"></i> Cetak</a>
                <a href="?hal=kiriman_edit&id=<?= $data['no_resi']?>" class="btn btn-sm btn-info"><i class="oi oi-pencil"></i> Edit</a>
                <a href="?hal=kiriman_hapus&id=<?= $data['no_resi'] ?>" class="btn btn-sm btn-danger"><i class="oi oi-delete"></i> hapus</a>
            </td>
        </tr>
    <?php
        }
        ?>
        </tbody>
    </table>
</div>