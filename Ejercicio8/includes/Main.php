<main style="text-align:center" class="lista">
    <?php require 'includes/Listar.php'; ?>

    <h2><i><b>Lista de usuarios</b></i></h2>

    <table class="table table-striped">
        <tr>
            <th> Nombre </th>
            <th> Apellidos </th>
            <th> E-mail </th>
            <th> Imagen </th>
            <th> Operaciones </th>
        </tr>
        
        <?php
            foreach($sql as $fila) {
                echo'<tr>';
                    echo'<td>'.$fila['nombre'].'</td>';
                    echo '<td>'.$fila['apellidos'].'</td>';
                    echo'<td>'.$fila['email'].'</td>';
                    
                    if($fila['imagen']!=null){
                        echo '<td><img src="imagenes/'.$fila['imagen'].'" width="40"/><br>'.$fila['imagen'].'</td>';
                    }
                    
                    echo'<td>'.'<a style="color: #BC1717" href="Actualizar.php?id='.$fila['id'].'"> Editar </a>
                    &emsp;<a style="color: #BC1717" href="Eliminar.php?id='.$fila['id'].'"> Eliminar </a>
                    <br/><a style="color: #BC1717" href="Detalles.php?id='.$fila['id'].'"> Detalles </a>'.'</td>';
                echo'</tr>';
            }
        ?>

        <section>
            <ul>
                <?php if($pagina==1) { ?>
                    <li class="disabled">&laquo;</li>
                <?php } else { ?>
                    <li><a href="?pagina=<?php echo $pagina-1 ?>">&laquo;</a></li>
                <?php } ?>

                <?php
                    for($i=1; $i<=$numPagina; $i++) {
                        if($pagina==$i) {
                            echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                        } else {
                            echo "<li><a href='?pagina=$i'>$i</a></li>";
                        }
                    }
                ?>

                <?php if($pagina==$numPagina) { ?>
                    <li class="disabled">&raquo;</li>
                <?php } else { ?>
                    <li><a href="?pagina=<?php echo $pagina+1 ?>">&raquo;</a></li>
                <?php } ?>
            </ul>
        </section>
    </table>

    <a style="color: #BC1717" href="Añadir.php"> Añadir usuarios </a>
</main><br>