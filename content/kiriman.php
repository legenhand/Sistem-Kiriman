<?php
    if(!defined('INDEX')) die("");
?>

<h2 class="judul">Data kiriman</h2>
<a class="tombol" href="?hal=kiriman_tambah">Tambah</a>
<h4>Klik pada no resi untuk detail kiriman</h4>
<table class="table">
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
        
            <a href="?hal=kiriman_edit&id=<?= $data['no_resi']?>" class="tombol edit">Edit</a>
            <a href="?hal=kiriman_hapus&id=<?= $data['no_resi'] ?>" class="tombol hapus">hapus</a>
        </td>
    </tr>
    </tbody>
<?php
    }
?>
</table>