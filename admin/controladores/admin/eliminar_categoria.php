<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Categoria</title>
</head>
<body>
<?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];

    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_categoria SET fer_cat_el= 'S', fer_cat_mod = '$fecha' WHERE fer_cat_id = $codigo"; 
<<<<<<< HEAD

=======
    
>>>>>>> 3103f135191f09a723996883d4e395c72332d4b5
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
<<<<<<< HEAD
    echo "<a href='../../vista/admin/listar_productos.php'>Regresar</a>";
=======
    echo "<a href='../../vista/admin/listar_categoria.php'>Regresar</a>";
>>>>>>> 3103f135191f09a723996883d4e395c72332d4b5
    $conn->close();
    ?>
</body>
</html>