<?php
require ("funciones.php");

if(isset($_GET["id"])){
  $eliminacontacto = eliminacontacto($_GET["id"]);
}

 ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Grid</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Latest compiled and minified CSS   <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css" -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">


	<link rel="stylesheet" href="estilos.css">

</head>
  <body>
    <header>
        <div class="jumbotron">
          <div class="container">
      <h1>AGENDA DE CONTACTOS</h1>
    </div>
    </div>
    </header>

    <!-- Barra de navegación -->


        <nav class="navbar navbar-inverse">
          <div class="container">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="nuevocontacto.php">Añadir Alumno</a></li>

            </ul>
              <form method="POST" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" class="form-control" name="buscar" placeholder="Busca en agenda ... ">
                </div>
                <button type="submit" class="btn btn-default">buscar</button>
              </form>
            </div>
          </nav>




    <main>
        <div class="container">
          <?php
          $aux = '';
         if (isset($_POST['buscar']) && $_POST['buscar']!='') {
           $aux = $_POST['buscar'];
           buscarContacto();
         } else {
              showContacts();
           }


               if (isset($eliminacontacto) && $eliminacontacto){
                 echo '<span>
                 <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <p class="bg-success">El contacto '.$eliminacontacto['nombre'].' ha sido eliminado </p>
                 </span>';

               }elseif(isset($eliminacontacto) && $eliminacontacto==false){
                 echo '<span>
                 <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <p class="bg-danger">El contacto seleccionado no ha sido eliminado</p>
                 </span>';
               }

           ?>


        </div>

    </main>
  </body>
  </html>
