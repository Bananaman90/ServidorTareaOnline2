<?php
    $dbHost='localhost';
    $dbName='bdusuarios';
    $dbUser='root';
    $dbPass='';

    try {
        $conexion=new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        validar($fallos);

        if(isset($_POST["submit"]) && validar($fallos)==true) {
            $nombre=$_POST["nombre"];
            $apellidos=$_POST["apellidos"];
            $biografia=$_POST["biografia"];
            $email=$_POST["email"];
            $contrasena=sha1($_POST["contrasena"]);
            $imagen=$_FILES["imagen"]["tmp_name"];

            if(isset($_FILES["imagen"]) && (!empty($_FILES["imagen"]["tmp_name"]))) {
                if(!is_dir("imagenes")) {
                    $dir=mkdir("imagenes", 0777, true);
                } else {
                    $dir=true;
                }

                if($dir) {
                    $nombreImagen=time()." — ".$_FILES["imagen"]["name"];
                    $moverImagen=move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagenes/".$nombreImagen);
                    $imagen=$nombreImagen;
                }

                if($moverImagen) {
                    $imagenCargada=true;
                } else {
                    $imagenCargada=false;
                    $fallos["imagen"]="Error: La imagen no se cargó correctamente! :(";
                }
            }

            $stmt="INSERT INTO usuarios VALUES (NULL, :nombre, :apellidos, :biografia, :email, :contrasena, :imagen);";

            $query=$conexion->prepare($stmt);

            $query->execute(['nombre'=>$nombre, 'apellidos'=>$apellidos, 'biografia'=>$biografia, 'email'=>$email, 
                                    'contrasena'=>$contrasena, 'imagen'=>$imagen]);

            if($query) {
                echo '<div class="alert alert-success" style="text-align:center">'."El usuario se registró correctamente!! :)".'</div>';
            } else {
                echo '<div class="alert alert-success" style="text-align:center">'."El usuario no pudo registrarse!! :(".'</div>';
            }

            $operacion="Usuario añadido";

            $fecha=getdate();

            $horas=$fecha['hours'];
            $minutos=$fecha['minutes'];
            $hora=$horas.":".$minutos;

            $dia=$fecha['mday'];
            $mes=$fecha['mon'];
            $ano=$fecha['year'];
            $fechaActual=$dia."-".$mes."-".$ano;
            
            $stmt2="INSERT INTO logs VALUES (NULL, :operacion, :hora, :fecha);";

            $query2=$conexion->prepare($stmt2);

            $query2->execute(['operacion'=>$operacion, 'hora'=>$hora, 'fecha'=>$fechaActual]);
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>