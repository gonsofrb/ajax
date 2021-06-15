<?php
 session_start();
 unset($_SESSION['usuario']);
 unset( $_SESSION['idRol']);
 unset($_SESSION['rol_descripcion']);
 session_destroy($_SESSION['usuario']);
 header("Location: ../index.php");



?>