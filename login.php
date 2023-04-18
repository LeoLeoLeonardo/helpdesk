<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "helpdesk";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn){
    die("No hay conexion: ".mysqli_connect_error());
}
    
$user = $_POST["usuario"];
$pass = $_POST["password"];

$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuarios = '".$user."' and contraseña = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1){
    
    header ("location: pagina.html");
}else if ($nr == 0)
{
    header ("location: login.html");
}

?>