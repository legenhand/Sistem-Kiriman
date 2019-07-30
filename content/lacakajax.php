<?php
    include ("../library/config.php");
    $no_resi = $_POST['resi'];
    $query = mysqli_query($con, "SELECT * FROM status WHERE no_resi = $no_resi");
    $stats = mysqli_fetch_array($query);
    $no  = 0;
    $pecahstr = explode("|",$stats['status']);
    $i = 0; 
    $a = 0;
    switch($stats['kode_status']){
        case 1:
        $ststerbaru = "Diinput Di Kota Pengirim";
        case 2:
        $ststerbaru = "Dikirim Ke kantor tujuan";
        case 3:
        $ststerbaru = "Dikirim Ke alamat Penerima";
        case 4:
        $ststerbaru = "Paket telah diterima";
        case 5:
        $ststerbaru = "retur ke kota pengirim";
        case 6:
        $ststerbaru = "retur diterima oleh pengirim";
        case 0:
        $ststerbaru = "Kiriman Dibatalkan";
        break;
    }
?>
<h4>Status Terbaru : <?= $ststerbaru ?></h4>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Waktu</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
<?php
    while( $i < count($pecahstr)) { 
        echo "<tr>";
        $a = $a + 1;
        echo "<td>$a</td>";
        for ($b=1;$b<=2;$b++){
            echo "<td>$pecahstr[$i]</td>";
            $i++;        
        }
        echo "<tr>";    
?>
    </tbody>
<?php 
    }
?>
</table>