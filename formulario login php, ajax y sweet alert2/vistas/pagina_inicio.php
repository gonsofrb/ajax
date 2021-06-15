<?php 
//Si nadie inicia sesion vuelve a la pagina Login
    session_start();
    if($_SESSION['usuario'] == null){
        header("Location: ../index.php");
    }else{
        if($_SESSION['idRol']!=1){
            header("Location: pag_error.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login con PHP -Bootstrap 4</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="display-4 text-center">¡Bienvenido!</h1>
                    <h2 class="text-center">Usuario:<span class="badge badge-primary"><?php echo $_SESSION['usuario'];?></span></h2>
                    <p class="lead text-center">Esta es la página de inicio, luego de un LOGIN correcto.</p>
                    <hr class="my-4">
                    <a class="btn btn-danger btn-lg" href="../bd/logout.php" role="button">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <script src="../popper/popper.min.js"></script>


    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>