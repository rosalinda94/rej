<?php
function redirect ($url) {
  header ('location: ' . $url);
}
/*CONEXION A LA BASE DE DATOS */
function conexion(){
  try {
    $pdo= new PDO('mysql:host=localhost;dbname=miClub','root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;

  } catch (\Exception $e) {
    return true;
  }
}



/* COMENTO EL JSON
function archivo($archivo, $contenido) {
    $json = json_encode([$contenido], JSON_PRETTY_PRINT);

    if (file_exists($archivo)) {
        $data = file_get_contents($archivo);

        $json = json_decode($data, true);

        $json[] = $contenido;

        $json = json_encode($json, JSON_PRETTY_PRINT);
    }

    file_put_contents($archivo, $json);
}*/



 ?>
