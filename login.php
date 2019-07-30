<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <title>Login Aplikasi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="js/jquery-3.4.1.min.js"></script> 
    </head>
    <body class="h-100 bg-info d-flex align-items-center">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
                    <h3 class="text-center text-info pb-3 mb-3 border-bottom">Login Aplikasi</h3>
                    <form action="ceklogin.php" method="post">
                        <input class="form-control form-control-lg mb-3" type="text" placeholder="Username" id="username" name="username" data-validation="required">
                        <input class="form-control form-control-lg mb-3" type="password" placeholder="Password" id="password" name="password" data-validation="required">
                        <input class="btn btn-info btn-lg btn-block" type="submit" value="LOGIN" id="login">
                    </form>
                </div>
            </div>
        </div>
        
            <script src="js/form-validator/jquery.form-validator.min.js"></script>
            <script>
                $.validate({
                });
            </script>
    </body>
</html>