<?php
function redirect ($url) {
  header ('location: ' . $url);
}

function archivo($archivo, $contenido) {
    $json = json_encode([$contenido], JSON_PRETTY_PRINT);

    if (file_exists($archivo)) {
        $data = file_get_contents($archivo);

        $json = json_decode($data, true);

        $json[] = $contenido;

        $json = json_encode($json, JSON_PRETTY_PRINT);
    }
    
    file_put_contents($archivo, $json);
}


 ?>
