<!DOCTYPE html>
<html>
    <head>
        <title>Login Aplikasi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css">   
        <script src="js/jquery-3.4.1.min.js"></script> 
    </head>
    <body>
        <div class="container">
            <section class="login-box">
                <h2>Login Aplikasi</h2>
                <form action="ceklogin.php" method="post">
                    <input type="text" placeholder="Username" id="username" name="username" data-validation="required">
                    <input type="password" placeholder="Password" id="password" name="password" data-validation="required">
                    <input type="submit" value="LOGIN" id="login">
                </form>
        </div>
        
            <script src="js/form-validator/jquery.form-validator.min.js"></script>
            <script>
                $.validate({
                });
            </script>
    </body>
</html>