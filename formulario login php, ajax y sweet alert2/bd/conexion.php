<?php
    class Conexion{
        public static function Conectar(){
            define('servidor','localhost');
            define('nombre_bd','login_2021');
            define('usuario','root');
            define('password','');
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            try {
                $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd,usuario,password,$opciones);
                // $conexion->exec("SET CHARACTER SET utf8");
                return $conexion;
            } catch (Exception $e) {
                die("El error de Conexion es:".$e->getMessage());
            }
        }
    }
?>