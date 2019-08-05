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
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <link href="css/select2.css" rel="stylesheet" />
        <script src="js/select2.js"></script>
        <script>
            $(document).ready(function(){
                $('#provinsi').select2();
                $('#kota').select2();
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
                var koli = $(".koli").val();
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
        
    </head>
    <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
        <header>
            <div class="blok">
                <div id="jdl">Aplikasi Manajemen kiriman</div> 
                <div id="tgl"></div>
                <div id="info">Halo <?= $_SESSION['nama_lengkap'] ?>, Anda Login Sebagai <?= $_SESSION['kantor']?><br><a href="logout.php">Logout</a></div>
            </div>
        </header>
        <div class="container">
            <aside>
                <ul class="menu">
                    <li><a href="?hal=dashboard" class="aktif">Dashboard</a></li>
                    <li><a href="?hal=kiriman">Data kiriman</a></li>
                    <li><a href="?hal=ongkir">Data Ongkos kirim</a></li>
                    <li><a href="?hal=lacak">Cek kiriman</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            </aside>
            <section class="main">
                <?php include "konten.php"; ?>
            </section>
        </div>
        <footer>
            Copyright &copy; Firmansyah
        </footer>
        <script>
        </script>
            <script src="js/form-validator/jquery.form-validator.min.js"></script>
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