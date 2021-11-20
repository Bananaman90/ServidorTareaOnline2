<main style="text-align:center" class="marco">
    <?php require 'includes/Listar.php'; ?>

    <h2><i><b>Lista de usuarios</b></i></h2>

    <table class="table table-striped">
        <tr>
            <th> Nombre </th>
            <th> Apellidos </th>
            <th> E-mail </th>
        </tr>
        
        <?php
            while($fila=$resultsquery->fetch()){
                echo'<tr>';
                    echo'<td>'.$fila['nombre'].'</td>';
                    echo '<td>'.$fila['apellidos'].'</td>';
                    echo'<td>'.$fila['email'].'</td>';
                echo'</tr>';
            }
        ?>
    </table>
</main><br>