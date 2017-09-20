<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Crear BD cole</title>
    <style>
      .error{
        color: red;
        border: 1px solid red;
        background-color: rgb(255,200,200);
        padding: 1em;
        margin: 1em;
        border-radius: 20px;
      }

      .ok{
        color: green;
        border: 1px solid green;
        background-color: rgb(200,255,200);
        padding: 1em;
        margin: 1em;
        border-radius: 20px;
      }
    </style>
  </head>
  <body>
    <h1>Crear BD Agenda</h1>
    <?php
    /*Creando el ErrorException para la conexion con la base de datos*/
        try {
          $con= new PDO("mysql:host0localhost","root");
        } catch (PDOException $e) {
            echo "<p class='error'>Error:".$e->getMessage()."</p>";
            echo "</body> </html>";
            die();
        }
    ?>
    <p class="ok">La conexión ha sido establecida con ContactsBD</p>

    <?php
      /* borrar la base de datos */
      $con->exec("drop database agenda;");

      /* Creamos la base de datos Contactos */
      $sql="create database agenda;";
      $res=$con->exec($sql);
      if(!$res){
        echo"<p class='error'>Error, no se ha podido crear la base de datos</p>";
        echo"<p class='error'>".$con->errorInfo()[2]."</p>";
      }else{
        echo"<p class='ok'>Base de Datos creada con exito.</p>";
      }

      /* Establecer la conexión con la base de datos */
      $sql="use agenda;";
      $res= $con->exec($sql);
      if($res===false){
        echo"<p class='error'>La conexión con la Base de Datos no ha sido establecidad</p>";
        echo"<p class='error'>".$con->errorInfo()[2]."</p>";
      }else{
        echo"<p class='ok'> La conexion con la Base de Datos ha sido establecida.</p>";
      }

      /* Creamos la Tabla contactos*/

      $sql= "create table contacto(
        id integer primary key auto_increment,
        nombre varchar(30) not null,
        mail varchar(50) unique,
        eliminar varchar(3) not null
      );";
      $res = $con->exec($sql);
      if($res===false){
        echo "<p class='error'>No se ha podido crear la tabla contactos.</p>";
        echo "<p class='error'>".$con->errorInfo()[2]."</p>";
      }else{
        echo "<p class='ok'>La tabla contacto ha sido creada correctamente.</p>";
      }

      /* crear tabla relacion */
      $sql = "create table relacion(
          id_conocedor integer,
          id_conocido integer,
          primary key (id_conocedor,id_conocido),
          foreign key(id_conocido) references contacto(id),
          foreign key (id_conocedor) references contacto(id)
      );";
      $res = $con->exec($sql);
      if($res===false){
        echo "<p class='error'>No se ha podido crear la tabla alum_asig.</p>";
        echo "<p class='error'>".$con->errorInfo()[2]."</p>";
      }else{
        echo "<p class='ok'>La tabla relacion ha sido creada correctamente.</p>";
      }


      /* insertar datos dentro de la tabl contactos */
      $sql = "insert into contacto(nombre, mail) values
        ('manuel', 'manuel27@jmail.com'),
        ('alfonso', 'alfonso@jmail.com'),
        ('martin', 'martin21@jmail.com'),
        ('martha', 'martha2@jmail.com'),
        ('katherine', 'katherine10@jmail.com');


        insert into relacion(id_conocedor, id_conocido) values
        (1,2,3),
        (1,2,3);";

      $res = $con->exec($sql);
      if($res===false){
        echo "<p class='error'>No se ha podido insertar los datos.</p>";
        echo "<p class='error'>".$con->errorInfo()[2]."</p>";
      }else{
        echo "<p class='ok'>Datos insertados correctamente.</p>";
      }
     ?>

      </body>
     </html>
