<?php
    session_start();

    include_once 'conexion.php';
     $objeto = new Conexion();
     $conexion = $objeto->Conectar();
     

     //recepción de datos enviados mediante POST desde ajax
     $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
     $password = isset($_POST['password']) ? $_POST['password'] : '' ;

     $pass = md5($password); //encripto la clave enviada por el usuaurio para compararla con la clave encriptada y almacenada en la BD

//  print_r($usuario);
//  print_r($pass);


     $consulta = "SELECT usuarios.idRol AS idRol, roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol = roles.id  WHERE usuario ='$usuario' AND contrasena ='$pass'";
     $resultado = $conexion->prepare($consulta);
     $resultado->execute();

     if($resultado->rowCount()>=1){
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['usuario']=$usuario;
        $_SESSION['idRol']=$data[0]['idRol'];
        $_SESSION['rol_descripcion']=$data[0]["rol"];  
        //!aclarar $data[0]
     }else{
        $_SESSION['usuario']=null;
        $data=null;
     }
     print json_encode($data); //Envio el array final en formato json a AJAX

     $conexion=null;
?>