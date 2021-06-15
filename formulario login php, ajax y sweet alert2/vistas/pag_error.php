<?php 
    session_start();
    if($_SESSION['usuario'] == null){
        header("Location: ../index.php");
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
                    <h1 class="display-4 text-center">Permisos</h1>
                    <h2 class="text-center">Usuario:<span class="badge badge-success"><?php echo $_SESSION['usuario'];?></span></h2>
                    <p class="text-center">Usted NO tiene permisos de ADMINISTRADOR</p>
                    <p class="text-center">Su permiso es:<span class="badge badge-warning"><?php echo $_SESSION['rol_descripcion'] ?></span> </p>
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