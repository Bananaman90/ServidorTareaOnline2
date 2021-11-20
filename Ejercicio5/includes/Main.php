<main style="text-align:center" class="marco">
    <?php require 'includes/Listar.php'; ?>

    <h2><i><b>Lista de usuarios</b></i></h2>

    <table class="table table-striped">
        <tr>
            <th> Nombre </th>
            <th> Apellidos </th>
            <th> E-mail </th>
            <th> Operaciones </th>
        </tr>
        
        <?php
            while($fila=$resultsquery->fetch()){
                echo'<tr>';
                    echo'<td>'.$fila['nombre'].'</td>';
                    echo '<td>'.$fila['apellidos'].'</td>';
                    echo'<td>'.$fila['email'].'</td>';
                    echo'<td>'.'<a style="color: #BC1717" href="Actualizar.php?id='.$fila['id'].'"> Editar </a>
                        &emsp;<a style="color: #BC1717" href="Eliminar.php?id='.$fila['id'].'"> Eliminar </a>'.'</td>';
                echo'</tr>';
            }
        ?>
    </table>
</main><br>