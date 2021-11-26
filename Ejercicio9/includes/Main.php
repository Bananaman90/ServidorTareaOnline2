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
    </table>

    <section>
        <nav aria-label="Page navigation example">
            <ul class="pagination" style="justify-content:center">
                <?php if($pagina==1) { ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="page-item active">
                        <a class="page-link" href="?pagina=<?php echo $pagina-1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php } ?>

                <?php
                    for($i=1; $i<=$numPagina; $i++) {
                        if($pagina==$i) {
                            echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                        }
                    }
                ?>

                <?php if($pagina==$numPagina) { ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#!" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="page-item active">
                        <a class="page-link" href="?pagina=<?php echo $pagina+1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </section>

    <a style="color: #BC1717" href="Añadir.php"> Añadir usuarios </a><br>
    <a style="color: #BC1717" href="GenerarPDF.php" target="blank"> Generar PDF </a>
</main><br>