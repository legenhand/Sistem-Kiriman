<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <script src="js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link href="css/select2.css" rel="stylesheet">
        <script src="js/select2.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="plugin/datatables.min.css"/>
        <script type="text/javascript" src="plugin/datatables.min.js"></script>
</head>
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
        break;
        case 2:
        $ststerbaru = "Dikirim Ke kantor tujuan";
        break;
        case 3:
        $ststerbaru = "Dikirim Ke alamat Penerima";
        break;
        case 4:
        $ststerbaru = "Paket telah diterima";
        break;
        case 5:
        $ststerbaru = "retur ke kota pengirim";
        break;
        case 6:
        $ststerbaru = "retur diterima oleh pengirim";
        break;
        case 0:
        $ststerbaru = "Kiriman Dibatalkan";
        break;
    }
?>
<h4>Status Terbaru : <?= $ststerbaru ?></h4>
<table class="table table-striped table-hover table-bordered">
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