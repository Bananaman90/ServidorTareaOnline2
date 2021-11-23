<?php
    $dbHost='localhost';
    $dbName='bdusuarios';
    $dbUser='root';
    $dbPass='';

    try {
        $conexion=new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_GET['id']) && (is_numeric($_GET['id']))) {
            $id=$_GET['id'];
            
            $sql="DELETE FROM usuarios WHERE id=:id;";
            $query=$conexion->prepare($sql);
            $query->execute(['id'=>$id]);

            if($query) {
                echo '<div class="alert alert-success">'."La eliminación del usuario se realizó correctamente!! :)".'</div>';
                header("Location: Index.php");
            } else {
                echo '<div class="alert alert-danger">'."La eliminación del usuario no se realizó correctamente!! :(".'</div>';
            }
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>