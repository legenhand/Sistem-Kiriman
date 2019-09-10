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
                url: 'content/kiriman/insert.php',
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