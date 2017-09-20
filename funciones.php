<?php


function conexionBD() {
  try{
    $con = new PDO("mysql:host=localhost; dbname=agenda","root");
  }catch(PDOException $e){
    echo "<p class='bg-danger'>Error:".$e->getMessage()."</p>";
  }
  return $con;
}

function showContacts() {
  $con = conexionBD();
  $sql = "SELECT * FROM contacto;";
  $datos = $con->query($sql);
  if (!$datos){
    echo "<p>".$con->errorInfo()[2]."</p>";
  }else{

  echo "<table border='1' class='table'>";
  echo" <thead class='thead-inverse'>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Eliminar</th></tr>";

  foreach ($datos as $fila) {
    echo "<tr><td>".$fila['id']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['mail']."</td>";
    echo '<td><a href="index.php?id='.$fila['id'].'"><button type="button" class="btn btn-danger btn-default btn-sm">X</button></a></td>';

  }
}
  echo "</table>";
}

function buscarContacto() {
  $con = conexionBD();
  $busqueda = $_POST['buscar'];
  $sql = "SELECT * FROM contacto WHERE nombre LIKE '%$busqueda%' or mail LIKE '%$busqueda%';";
  $datos = $con->query($sql);
  if (!$datos){
    echo "<p>".$con->errorInfo()[2]."</p>";
  }else{
  echo "<table border='1' class='table'>";
  echo" <thead class='thead-inverse'>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th></tr>";

  foreach ($datos as $fila) {
    echo "<tr><td>".$fila['id']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['mail']."</td></tr>";
  }
}
  echo "</table>";
}

function agregarContacto() {
  $con = conexionBD();
   $nombre = $_POST['nombre'];
   $mail = $_POST['mail'];
   $sql = "INSERT INTO contacto(nombre, mail) VALUES ('$nombre', '$mail');";
   $exe = $con->exec($sql);
  }

  function eliminacontacto($id){
    $con = conexionBD();
    $sql = "SELECT * FROM contacto where id=$id";
    $res = $con->query($sql);

    $sql_borrar = "DELETE FROM contacto where id=$id";
    $res_borrar = $con->exec($sql_borrar);

    if($res_borrar===false) return false;
    else return $res->fetch();

  }


 ?>
