<?php
require ("funciones.php");
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
      <h1>Agenda de contactos</h1>
      <h3>Crear Nuevo Contacto</h3>
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
                  <input type="text" class="form-control" name="search" placeholder="Busca en agenda ... ">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </nav>




    <main>
      <div class="container">
      <form action="" method="post" class="form-horizontal">
        <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="name" class="form-control" name="nombre" required>
        </div>

        <div class="form-group">
                <label for="mail">E-mail:</label>
                <input type="email" class="form-control" name="mail" required>
      </div>

      <button type="submit" class="btn btn-success">Crear Usuario</button>

    </form>
    <?php
         if (isset($_POST['nombre']) && $_POST['mail']!='') {
           $nombre = $_POST['nombre'];
           $mail = $_POST['mail'];

           agregarContacto($nombre, $mail);
         }
         ?>
          </div>
    </main>
  </body>
  </html>
