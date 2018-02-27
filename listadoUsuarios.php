<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listar usuarios</title>
  </head>
  <body>
    <h1>Tabla de Usuarios</h1>
    <?php

    $conector = new mysqli("localhost", "root", "", "juegos");
    if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $conector->connect_error;
    }else {

      $nombre=$_POST["nombre"];
      $apellidos=$_POST["apellidos"];
      $edad=$_POST["edad"];
      $curso=$_POST["curso"];
      $puntuacion=$_POST["puntuacion"];
      $correo=$_POST["correo"];

      $consulta=$conector->query("INSERT INTO usuarios (nombre,apellidos,edad,curso,puntuacion,correo) VALUES ('$nombre','$apellidos',$edad,$curso,$puntuacion,'$correo')");
      $consulta2=$conector->query("SELECT * FROM usuarios");

      while($listarUsuario=$consulta2->fetch_assoc()) {
        echo "<b>Nombre:</b>".$listarUsuario['nombre']."<br>";
        echo "<b>Apellidos</b>:".$listarUsuario['apellidos']."<br>";
        echo "<b>Edad:</b>".$listarUsuario['edad']."<br>";
        echo "<b>Curso:</b>".$listarUsuario['curso']."<br>";
        echo "<b>Puntuacion:</b>".$listarUsuario['puntuacion']."<br>";
        echo "<b>Correo:</b>".$listarUsuario['correo']."<br>";
        echo "<br><br>";

        }
    }
     ?>

     <a href="formularioActualizar.php">Actualizar</a><br><br>
     <a href="formularioBorrar.php">Borrar usuario</a>
  </body>
</html>
