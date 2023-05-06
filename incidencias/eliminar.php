<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "helpdesk";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if(isset($_POST['eliminar'])){
        
        $ite = ($_POST['ite']);

        $reg = "DELETE FROM incide WHERE id = '$ite' ";
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