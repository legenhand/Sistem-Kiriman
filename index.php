<?php
    session_start();
    ob_start();

    include "library/config.php";

    if(empty($_SESSION['username']) or empty($_SESSION['password'])){
        echo "<p align='center'> Anda harus login terlebih dahulu!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    }else{
        define('INDEX', true);
    
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#provinsi').select2();
                $('#kota').select2();
                $('.table').DataTable();
                $('#provinsi').change(function(){
                    var provinsi_id = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: 'content/kota.php',
                        data: 'prov_id='+provinsi_id,
                        success: function(response){
                            $('#kota').html(response);
                        }
                    });
                })
                $('#kota').change(function(){
                    var kota_id = $(this).val();
                    $("#alamat_penerima").val($("#kota option:selected").html() + "," + $("#provinsi option:selected").html());

                    $.ajax({
                        type: 'POST',
                        url: 'content/ongkos.php',
                        data: 'kot_id='+kota_id,
                        success: function(response){
                            $('#ongkir').val(response);
                        }
                    });
                })
                    var $formlacak = $('#form-lacak');
                    $formlacak.submit(function(){
                        var no_resi = $('#resi').val();

                        $.ajax({
                            type: 'POST',
                            url: 'content/lacakajax.php',
                            data: 'resi='+no_resi,
                            success: function(response){
                                $('#result').html(response);
                            }
                        });
                        $.post($(this).attr('action'), $(this).serialize(), function(response){
                        },'json');
                        return false;
                    });
                    
                    $('#tambah-ongkir').click(function(){
                        var data = $('#ongkir-tambah').serialize();
                        $.ajax({
                            type: 'POST',
                            url: 'content/ongkir_insert.php',
                            data: data,
                            success: function(response){
                                $('#result').html(response);
                            }
                        });
                    });

                    $('#tambah-kiriman').click(function(){
                        
                        var data = $('#kiriman-tambah').serialize();
                        $.ajax({
                            type: 'POST',
                            url: 'content/kiriman_insert.php',
                            data: data,
                            success: function(response){
                                $('#result').html(response);
                            }
                        });
                    });   
            });
            function hitung2() {
                var ongkir = $("#ongkir").val();
                var koli = $("#koli").val();
                var berat = $("#berat").val();
                total = ongkir * koli * berat;
                $("#total").val(total);
            }
            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
                return true;
            }
            
            function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
                var waktu = new Date();            //membuat object date berdasarkan waktu saat 
                var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
                var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
                var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
                document.getElementById("tgl").innerHTML = "<?= date('l, d-m-Y  '); ?>" + (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
            }
        </script>
        
        <!-- <link rel="stylesheet" href="css/style.css">  -->
    </head>
    <body class="h-100"> 
        <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
            <a href="#" class="navbar-brand">Manajemen Kiriman</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <nav class="collapse navbar-collapse" id="sidebar">
                <ul class="navbar-nav d-sm-none">
                    <li class="nav-item">
                        <a href="?hal=dashboard" class="nav-link text-white">
                            <i class="oi oi-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?hal=kiriman" class="nav-link text-white">
                            <i class="oi oi-list-rich"></i> Data Kiriman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?hal=ongkir" class="nav-link text-white">
                            <i class="oi oi-dollar"></i> Data Ongkos Kirim
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?hal=lacak" class="nav-link text-white">
                            <i class="oi oi-magnifying-glass"></i> Lacak Kiriman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-white">
                            <i class="oi oi-account-logout"></i> Keluar
                        </a>
                    </li>
                </ul>
            </nav>
        </nav>
        <div class="container-fluid h-100">
            <div class="row h-100">
                <nav class="col-md-2 col-sm-3 bg-dark h-100 p-0 position-fixed d-none d-sm-block">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark">
                            <a class="nav-link text-white" href="?hal=dashboard">
                                <i class="oi oi-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a class="nav-link text-white" href="?hal=kiriman">
                                <i class="oi oi-list-rich"></i> Data Kiriman
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a class="nav-link text-white" href="?hal=ongkir">
                                <i class="oi oi-dollar"></i> Data Ongkos kirim
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a class="nav-link text-white" href="?hal=lacak">
                                <i class="oi oi-magnifying-glass"></i> Lacak Kiriman
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a class="nav-link text-white" href="logout.php">
                                <i class="oi oi-account-logout"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-3 mb-3">
                    <section>
                        <?php include "konten.php"; ?>
                    </section>
                </div>
            </div>
        </div>
        <div class="bg-light fixed-bottom">
            <p class="m-2 text-center text-muted">Copyright &copy; Firmansyah</p>
        </div>
 
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
            <script src="js/form-validator/jquery.form-validator.min.js" type="text/javascript"></script>
            <script>
                $.validate({
                    modules : 'date, security'
                });
            </script>
    </body>
</html>
<?php
    }
?>