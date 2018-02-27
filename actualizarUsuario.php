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

      $id=$_POST["id"];
      $nombre=$_POST["nombre"];
      $apellidos=$_POST["apellidos"];
      $edad=$_POST["edad"];
      $curso=$_POST["curso"];
      $puntuacion=$_POST["puntuacion"];
      $correo=$_POST["correo"];

      $probar="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', edad=$edad , curso=$curso, puntuacion=$puntuacion , correo='$correo' WHERE id=$id ";

      $consulta=$conector->query($probar);
      $consulta2=$conector->query("SELECT * FROM usuarios");

      while($actualizarUsuario=$consulta2->fetch_assoc()) {
        echo "<b>Nombre:</b>".$actualizarUsuario['nombre']."<br>";
        echo "<b>Apellidos</b>:".$actualizarUsuario['apellidos']."<br>";
        echo "<b>Edad:</b>".$actualizarUsuario['edad']."<br>";
        echo "<b>Curso:</b>".$actualizarUsuario['curso']."<br>";
        echo "<b>Puntuacion:</b>".$actualizarUsuario['puntuacion']."<br>";
        echo "<b>Correo:</b>".$actualizarUsuario['correo']."<br>";
        echo "<br><br>";

        }
    }
     ?>
     <form action="listadoUsuarios.php" method="post">
       <input type="submit" value="Volver">
     </form><br>

     <form action="formularioActualizar.php" method="post">
       <input type="submit" value="Actualizar">
     </form><br>

     <form action="formularioBorrar.php" method="post">
       <input type="submit" value="Borrar">
     </form><br>
  </body>
</html>
