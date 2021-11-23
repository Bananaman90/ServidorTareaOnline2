<?php
    $dbHost='localhost';
    $dbName='bdusuarios';
    $dbUser='root';
    $dbPass='';

    try {
        $conexion=new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $valNombre="";
        $valApellidos="";
        $valEmail="";
        $valImagen="";

        if(isset($_POST['datos'])) {      
            $id=$_POST['id'];
            $nuevoNombre=$_POST['nombre'];
            $nuevoApellidos=$_POST['apellidos'];
            $nuevoEmail=$_POST['email'];
            $nuevoImagen;

            if(isset($_FILES["imagen"]) && (!empty($_FILES["imagen"]["tmp_name"]))) {
                if(!is_dir("imagenes")) {
                    $dir=mkdir("imagenes", 0777, true);
                } else {
                    $dir=true;
                }

                if($dir) {
                    $nombreImagen=time()." — ".$_FILES["imagen"]["name"];
                    $moverImagen=move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagenes/".$nombreImagen);
                    $nuevoImagen=$nombreImagen;
                }

                if($moverImagen) {
                    $imagenCargada=true;
                } else {
                    $imagenCargada=false;
                    $fallos["imagen"]="Error: La imagen no se cargó correctamente! :(";
                }
            }

            $sql="UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, email=:email, imagen=:imagen WHERE id=:id;";
            $query=$conexion->prepare($sql);
            $query->execute(['id'=>$id, 'nombre'=>$nuevoNombre, 'apellidos'=>$nuevoApellidos, 'email'=>$nuevoEmail, 
                                'imagen'=>$nuevoImagen]);

            if($query) {
                echo '<div class="alert alert-success">'."El usuario se actualizó correctamente!! :)".'</div>';
            } else {
                echo '<div class="alert alert-danger">'."El usuario no pudo actualizarse!! :(".'</div>';
            }

            $valNombre=$nuevoNombre;
            $valApellidos=$nuevoApellidos;
            $valEmail=$nuevoEmail;
            $valImagen=$nuevoImagen;
        } 

        if(isset($_GET['id']) && (is_numeric($_GET['id']))) {
            $id=$_GET['id'];

            $sql="SELECT * FROM usuarios WHERE id=:id;";
            $query=$conexion->prepare($sql);
            $query->execute(['id'=>$id]);

            if($query) {
                echo '<div class="alert alert-success">'."Los datos del usuario se obtuvieron correctamente!! :)".'</div>';
                $fila=$query->fetch(PDO::FETCH_ASSOC);

                $valNombre=$fila['nombre'];
                $valApellidos=$fila['apellidos'];
                $valEmail=$fila['email'];
                $valImagen=$fila['imagen'];
            } else {
                echo '<div class="alert alert-danger">'."No se pudieron obtener los datos de usuario!!:(".'</div>';
            }
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>