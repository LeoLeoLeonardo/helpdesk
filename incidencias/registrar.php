<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "helpdesk";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if(isset($_POST['enviar'])){
    if( strlen($_POST['nom']) >= 1 && strlen($_POST['dni']) >= 1 && strlen($_POST['dep']) >= 1 && ($_POST['tip']) >= 1 && ($_POST['des']) >= 1)
    {
        
        $nom = ($_POST['nom']);
        $dni = ($_POST['dni']);
        $dep = ($_POST['dep']);
        $tip = ($_POST['tip']);
        $des = ($_POST['des']);

        date_default_timezone_set('America/Lima');
        $fec = date("y-m-d");

        $reg = "INSERT INTO incide(nombre, dni, departamentos, tipo, descripcion, fecha) VALUES ('$nom','$dni','$dep', '$tip', '$des', '$fec')";
        $res = mysqli_query($conn, $reg); 

        if($res)
        {
            header ("location:incidencias.php");
        }else
        {
            ?>
                <h3>¡ocurrió un error!</h3>
            <?php
        }
        
    }  
}

        

?>