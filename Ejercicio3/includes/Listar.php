<?php
    $dbHost='localhost';
    $dbName='bdusuarios';
    $dbUser='root';
    $dbPass='';

    try {
        $conexion=new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<div class="alert alert-success" style="text-align:center">'."Conectado a la Base de Datos de usuarios!! :)".'</div>';

        $sql="SELECT * FROM usuarios;";
        $resultsquery=$conexion->query($sql);

        if($resultsquery) {
            echo '<div class="alert alert-success">'."La consulta se realizó correctamente!! :)".'</div>';
        } else {
            echo '<div class="alert alert-danger">'."La consulta no pudo realizarse correctamente!! :(".'</div>';
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>