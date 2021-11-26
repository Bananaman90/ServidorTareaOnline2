<main style="text-align:center" class="marco">
    <?php require 'includes/Editar.php'; ?>

    <h2><i><b>Actualizar usuario</b></i></h2>

    <form action="Actualizar.php" method="post" enctype="multipart/form-data">
        Nombre 
        <br><input type="text" name="nombre" value="<?php echo $valNombre; ?>"><br><br>
        <?php echo alertar($fallos, "nombre"); ?>

        Apellidos 
        <br><input type="text" name="apellidos" value="<?php echo $valApellidos; ?>"><br><br>
        <?php echo alertar($fallos, "apellidos"); ?>

        E-mail 
        <br><input type="email" name="email" value="<?php echo $valEmail; ?>"><br><br>
        <?php echo alertar($fallos, "email"); ?>

        Imagen de Perfil:
        <?php if($valImagen!=null) { ?>
        <td><img src="imagenes/<?php echo $valImagen; ?>" width="40"/><br><?php } ?><br>

        Actualizar Imagen — 
        <br><input type="file" name="imagen"/>
        <?php echo alertar($fallos, "imagen"); ?>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <br><br><input type="submit" value="Actualizar" name="datos"/>
    </form><br>

    <a style="color: #BC1717" href="Index.php"> Listar usuarios </a>
</main><br>