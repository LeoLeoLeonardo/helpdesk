<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "helpdesk";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if(isset($_POST['enviar'])){
        
        $dni = ($_POST['dni']);
        $dep = ($_POST['dep']);
        $tip = ($_POST['tip']);
        $des = ($_POST['des']);

        $reg = "UPDATE incide SET tipo='$tip', descripcion='$des', departamentos='$dep' WHERE dni='$dni'";
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

        

?>