<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "helpdesk";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$usu = $_POST["usuario"];
$pas = $_POST["password"];

//login
if(isset($_POST["btnIngresar"]))
{
    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuarios = '".$usu."' and contraseña = '".$pas."'");
    $nr = mysqli_num_rows($query);

    if($nr==1)
    {
        //echo "Bienvenido: ".$usu;
        header("Location: pagina.html");
    }else if($nr==0)
    {
        echo"No ingresó";
    }

}


?>