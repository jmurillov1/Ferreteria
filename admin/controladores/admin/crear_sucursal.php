<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Crear Nuevo Producto</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;
    $sql = "INSERT INTO fer_sucursal VALUES(0,'$direccion', '$telefono','N', null,null);";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado la sucursal correctamente !!!</p>";
    } else {
        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
    }
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../../vista/admin/crear_sucursal.php'>Regresar</a>";
    ?>
</body>

</html>