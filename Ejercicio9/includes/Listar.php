<?php
    $dbHost='localhost';
    $dbName='bdusuarios';
    $dbUser='root';
    $dbPass='';

    try {
        $conexion=new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pagina=isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $filasPagina=3;
        $inicio=($pagina>1) ? ($pagina*$filasPagina-$filasPagina) : 0;

        $sql=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM usuarios LIMIT $inicio, $filasPagina;");
        $sql->execute();
        $sql=$sql->fetchAll();

        if(!$sql) {
            header('Location: Index.php');
        }

        $totalFilas=$conexion->query('SELECT FOUND_ROWS() as total');
        $totalFilas=$totalFilas->fetch()['total'];
        $numPagina=ceil($totalFilas/$filasPagina);

        if($totalFilas) {
            echo '<div class="alert alert-success">'."La consulta se realizó correctamente!! :)".'</div>';
        } else {
            echo '<div class="alert alert-danger">'."La consulta no pudo realizarse correctamente!! :(".'</div>';
        }
    } catch(PDOException $error) {
        echo '<div class="alert alert-danger" style="text-align:center">'."No se pudo conectar a la BD de usuarios!! :(<br/>"
                .$error->getMessage().'</div>'; 
    }
?>