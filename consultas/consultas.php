<?php
include("conexion.php");
$con=conectar();

$sql="SELECT * FROM incide";
$query=mysqli_query($con,$sql);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css">
    
    <title>Hello, world!</title>
  </head>
  <body>
    
    <!--Barra vertical-->
    <div class="d-flex">
    <div class="vertical-nav bg-white" id="sidebar">
            <div class="py-4 px-3 mb-4 bg-light">
                <div class="media d-flex aling-items-center"><img src="../img/yoda.jpg" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadiw-sm">
                    <div class="media-body">
                        <h4 class="m-0">Diego</h4>
                        <p class="font-weight-normal text-muted mb-0">Administrador</p>
                    </div>
                </div>
            </div>
            <div class="menu">
            <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>
                <a href="../incidencias/incidencias.php" class="d-block text-dark p-3 bg-light"><i clase = "icono ion-md-persona lead"></i> Incidencias</a>
                <a href="../consultas/consultas.php" class="d-block text-dark p-3 bg-light">Consulta</a>
            </div> 
    </div>
    <div class="w-100">
       <nav class="navbar navbar-light bg-light">
       <a class="navbar-brand" href="#">
       <a><i clase ="icono ion-md-menu"></i></a>
       <img src="../img/escudo.png" class="img-fluid" width="53" height="53" alt="">
       </a>
       </nav>

       <!--contenido-->

       <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h2>Consultas</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contenedor-buscar" style="padding: 20px;">
    
    <form action="" method="post">
     <p>Buscar:

       <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
       id="text"placeholder="Ingrese los datos"></p>
      
      </form>
 
</div>
  <?php
   $conexion=mysqli_connect("localhost","root","","helpdesk"); 
   $where="";

   if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];

	if (isset($_GET['busqueda']))
	{
		$where="WHERE incide.id LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
    OR dni LIKE'%".$busqueda."%' OR departamento  LIKE'%".$busqueda."% OR tipo LIKE'%".$busqueda."%";
	}
  
}
?>    
    <section class="p-3 pr-5">
    <table class="table table-bordered table-hover table_id ">
       <thead>    
        <tr>
        <th>Item</th>
        <th>Name</th>
        <th>DNI</th>
        <th>Departamento</th>
        <th>Tipo</th>
        <th>Descripcion</th>
          <th>fecha</th>
          
         
        </tr>
      </thead>
    <tbody>

<?php

$conexion=mysqli_connect("localhost","root","","helpdesk");               
$SQL="SELECT incide.id, incide.nombre, incide.dni, incide.departamentos,incide.tipo, incide.descripcion,incide.fecha,
 FROM user incide
$where";
$dato = mysqli_query($conexion, $sql);

if($dato -> num_rows >0){
    while($row=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php  echo $row['id']?></td>
             
             <td><?php  echo $row['nombre']?></td>
             <td><?php  echo $row['dni']?></td>
             <td><?php  echo $row['departamentos']?></td>
             <td><?php  echo $row['tipo']?></td>
             <td><?php  echo $row['descripcion']?></td> 
             <td><?php  echo $row['fecha']?></td>  
             

</tr>
<?php
}
}else{
    ?>
    <tr>
    <td class="text-center"></td>
    <td colspan="7" style="text-align= center">No existen registros</td>
    <tr>
    <?php   
}

?>
</section>   

    </div>
    </div>
    <script>
    (function(document) {
    'buscador';

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

  })(document);
  </script>
<!--Termino de barra lateral-->
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>