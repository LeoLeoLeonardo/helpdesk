<?php 
include("mostrarDatos.php");

$objeto = new Conexion();
$conn = $objeto->Conectar();

$consulta = "SELECT id, nombre, dni, departamentos, tipo, descripcion, fecha FROM incide";
$resultado = $conn->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
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

       <!--Data table-->
        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h2>Registro <b>Incidencias</b></h2>
                            </div>
                            <div class="botonR">
                                <a href="#registrar" class="btn btn-success" data-toggle="modal"><span>Registro nuevo</span></a>					
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Name</th>
                                <th>DNI</th>
                                <th>Departamento</th>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            foreach($data as $dat){
                        ?>
                            <tr>
                                
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['dni'] ?></td>
                                <td><?php echo $dat['departamentos'] ?></td>
                                <td><?php echo $dat['tipo'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td>
                                    <a href="#editar" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="#eliminar" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>	
                        
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>        
        </div>
        
        <!-- Nuevo Registro -->
        <div id="registrar" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="registrar.php">
                        <div class="modal-header">						
                            <h4 class="modal-title">Nuevo Incidente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="mb-3 px-5 py-5   ">
                            <div class="mb-3 px-5 ">
                                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="nom"></input >
                            </div>
                            <div class="mb-3 px-5">
                                <label for="exampleFormControlInput1" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="doc" name="dni"></input >
                            </div>
                            <div class="mb-3 px-5">
                                <label for="exampleFormControlTextarea1" class="form-label">Departamento</label>
                                <input  type="text" class="form-control" id="dep" name="dep"></input >
                            </div>    
                            <div class="mb-3 px-5">
                                <label for="exampleFormControlTextarea1" class="form-label">Tipo</label>
                                <input type="text" class="form-control" id="tip" name="tip"></input>
                            </div> 
                            <div class="mb-3 px-5">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripción" rows="3" name="des"></textarea>
                            </div> 
                            <div class="mb-3 px-5">
                                <input class="btn btn-primary" type="submit" value=" Enviar " name="enviar"></input >
                                <input class="btn btn-primary" type="reset" value="Limpiar" ></input >
                            </div>
                        </div>
                    </form>
                </div>
                </div>
        </div>


	<!-- Editar Registro -->
	<div id="editar" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="editar.php">
					<div class="modal-header">						
						<h4 class="modal-title">Editar incidencias</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
                        <div class="form-group">
							<label>DNI</label>
							<input type="text" class="form-control" name="dni" required></input>
						</div>				
						<div class="form-group">
							<label>Departamento</label>
							<input type="text" class="form-control" name="dep" required></input>
						</div>
						<div class="form-group">
							<label>Tipo</label>
							<input type="text" class="form-control" name="tip" required></input>
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<textarea class="form-control" name="des" required></textarea>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="enviar" name="enviar">
					</div>
				</form>
			</div>
		</div>
	</div>  


	<!-- Delete Registro -->
	<div id="eliminar" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="eliminar.php">
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar incidencia</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Estás seguro de eliminar esta incidencia?</p>
					</div>
                    <div class="form-group">
							<label>ingresar item para confirmar</label>
							<input type="text" class="form-control" name="ite" required></input>
						</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>
       
        
    </div>
    </div>


    <!--Termino de barra lateral-->




    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>