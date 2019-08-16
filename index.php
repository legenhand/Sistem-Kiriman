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
        <script src="js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/brand-icons.css">
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link href="css/select2.css" rel="stylesheet">
        <script src="js/select2.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="plugin/datatables.min.css"/>
        <script type="text/javascript" src="plugin/datatables.min.js"></script>
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
 
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
            <script src="js/form-validator/jquery.form-validator.min.js" type="text/javascript"></script>
            <script>
                $.validate({
                });
            </script>
    </body>
</html>
<?php
    }
?>