<?php 
class Conexion{

    public static function Conectar(){

        define ('dbhost', 'localhost');
        define ('dbuser', 'root');
        define ('dbpass' , '');
        define ('dbname', 'helpdesk');

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');

        try{
            $conexion = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass, $opciones);
            return $conexion;

        }catch(Exception $e){
            die("El error de esta conexion es: ".$e->getMessage());

        }
    }
    
}
?>