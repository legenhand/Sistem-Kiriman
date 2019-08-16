<?php
    session_start();
    ob_start();

    include "library/config.php";

    if(empty($_SESSION['username']) or empty($_SESSION['password'])){
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    }else{
        define('INDEX', true);
    
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/brand-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
            
        <!-- <link rel="stylesheet" href="css/style.css">  -->
    </head>
    <body class="h-100 bg-light"> 
        <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info row">
            <a href="#" class="navbar-brand col">Manajemen Kiriman</a>
            <div class="col-sm-10 text-right hidden col-4 text-light">Anda Login Sebagai <?= $_SESSION['kantor']?></div>
            <button class="navbar-toggler col-2 col-sm-1" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
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
            <p class="m-2  text-center text-muted">
                <a href="https://github.com/legenhand"><i class="bd-github"></i></a>
            </p>
        </div>
 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js" integrity="sha256-H7bYoAw738qgns17P+7wWt77AfnEh7yCJMQGUCNcxQA=" crossorigin="anonymous"></script>
            <script>
                $.validate({
                });
            </script>
    </body>
</html>
<?php
    }
?>