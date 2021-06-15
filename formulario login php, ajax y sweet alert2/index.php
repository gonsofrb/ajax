<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login con PHP -Bootstrap 4</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
</head>
<body>
    <div id="login">
        <h3 class="text-center  display-4">Login con PHP</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 bg-light text-dark">
                        <form id="formLogin" class="form" action="" method="POST">
                            <h3 class="text-center text-dark">Iniciar Sesion</h3>
                            <div class="form-group">
                                <label for="usuario" class="text-dark">Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-dark">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Conectar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="popper/popper.min.js"></script>


    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>