<?php
include 'funciones.php';

  $data = file_get_contents('archivo.json');

  $usuarios = json_decode ($data, true);

  $pdo = conexion();
  
  foreach ($usuarios as $usuario) {

    $sql = 'INSERT INTO users (id, email, password)
                      VALUES (null, $usuario[email],$usuario[password]';

    $stmt = $pdo->prepare($sql);

    $result = $stmt->execute();
}
