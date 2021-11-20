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

        if(isset($_POST['datos'])) {
            $id=$_POST['id'];
            $nuevoNombre=$_POST['nombre'];
            $nuevoApellidos=$_POST['apellidos'];
            $nuevoEmail=$_POST['email'];

            $sql="UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, email=:email WHERE id=:id;";
            $query=$conexion->prepare($sql);
            $query->execute(['id'=>$id, 'nombre'=>$nuevoNombre, 'apellidos'=>$nuevoApellidos, 'email'=>$nuevoEmail]);
                
            if($query) {
                echo '<div class="alert alert-success">'."El usuario se actualizó correctamente!! :)".'</div>';
            } else {
                echo '<div class="alert alert-danger">'."El usuario no pudo actualizarse!! :(".'</div>';
            }

            $valNombre=$nuevoNombre;
            $valApellidos=$nuevoApellidos;
            $valEmail=$nuevoEmail;
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
            } else {
                echo '<div class="alert alert-danger">'."No se pudieron obtener los datos de usuario!!:(".'</div>';
            }
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>