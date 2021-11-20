<?php
    $dbHost='localhost';
    $dbName='bdusuarios';
    $dbUser='root';
    $dbPass='';

    try {
        $conexion=new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<div class="alert alert-success" style="text-align:center">'."Conectado a la Base de Datos de usuarios!! :)".'</div>';

        if(isset($_POST["datos"])) {

            $nombre=$_POST["nombre"];
            $apellidos=$_POST["apellidos"];
            $biografia=$_POST["biografia"];
            $email=$_POST["email"];
            $contrasena=sha1($_POST["contrasena"]);
            $imagen=$_FILES["imagen"]["tmp_name"];

            $stmt="INSERT INTO usuarios VALUES (NULL, :nombre, :apellidos, :biografia, :email, :contrasena, :imagen);";

            $query=$conexion->prepare($stmt);

            $query->execute(['nombre'=>$nombre, 'apellidos'=>$apellidos, 'biografia'=>$biografia, 'email'=>$email, 
                                    'contrasena'=>$contrasena, 'imagen'=>$imagen]);

            if($query) {
                echo '<div class="alert alert-success" style="text-align:center">'."El usuario se registró correctamente!! :)".'</div>';
            } else {
                echo '<div class="alert alert-success" style="text-align:center">'."El usuario no pudo registrarse!! :(".'</div>';
            }
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>