<?php
    $host='localhost';
    $nombre='bdusuarios';
    $usuario='root';
    $contrasena='';

    try {
        $conexion=new PDO("mysql:host=$host; nombre=$nombre", $usuario, $contrasena);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<div class="alert alert-success" style="text-align:center">'."Conectado a la Base de Datos de usuarios!! :)".'</div>';
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>".$error->getMessage().'</div>'; 
    }
?>