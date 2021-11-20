<main style="text-align:center" class="marco">
    <?php require 'includes/Detallar.php'; ?>

    <h2><i><b>Detalles de usuario</b></i></h2>

    <table class="table table-striped">
        <?php
            if($fila=$query->fetch()) {
                echo '<tr>';
                    echo '<th> Nombre </th>';
                    echo'<td>'.$fila['nombre'].'</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> Apellidos </th>';
                    echo'<td>'.$fila['apellidos'].'</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> Biografía </th>';
                    echo'<td>'.$fila['biografia'].'</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> E-mail </th>';
                    echo'<td>'.$fila['email'].'</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> Contraseña </th>';
                    echo'<td>'.$fila['contrasena'].'</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> Imagen </th>';
                    echo'<td>'.$fila['imagen'].'</td>';
                echo '</tr>';
            }
        ?>
    </table>

    <a style="color: #BC1717" href="Index.php"> Listar usuarios </a>
</main><br>