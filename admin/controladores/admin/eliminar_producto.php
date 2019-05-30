<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
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
    $sql = "UPDATE fer_producto SET fer_pro_el= 'S', fer_pro_mod = '$fecha' WHERE fer_pro_id = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<a href='../../vista/admin/listar_productos.php'>Regresar</a>";
    $conn->close();
    ?>
</body>
</html>