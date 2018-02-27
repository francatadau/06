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

      $probar="DELETE FROM usuarios WHERE id=$id ";
      // echo $probar;

      $consulta=$conector->query($probar);
      $consulta2=$conector->query("SELECT * FROM usuarios");

      echo "Se a borrado con éxito";
    }
    
     ?>
     <br>
     <form action="listadoUsuarios.php" method="post">
       <input type="submit" value="Volver">
     </form>
  </body>
</html>
