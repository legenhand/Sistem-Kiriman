<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <title>Login Aplikasi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body class="h-100 bg-info d-flex align-items-center">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js" integrity="sha256-H7bYoAw738qgns17P+7wWt77AfnEh7yCJMQGUCNcxQA=" crossorigin="anonymous"></script>
        <script>
            $.validate({
            });
        </script>
    </body>
</html>