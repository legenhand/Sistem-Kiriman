

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
    include ("../library/config.php");
    $no_resi = $_GET['resi'];
    $query = mysqli_query($con, "SELECT * FROM status WHERE no_resi = $no_resi");
    $stats = mysqli_fetch_array($query);
    $no  = 0;
    $pecahstr = explode("|",$stats['status']);
    for ( $i = 0; $i < count($pecahstr); $i++ ) {
        if($i % 2 == 0){
            echo "<tr><td>$i</td>";
        }
?>
            <td><?= $pecahstr[$i] ?></td>
<?php
        
?>
    </tbody>
<?php 
    }
?>
</table>