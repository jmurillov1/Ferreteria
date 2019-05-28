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
    include '../../config/conexionBD.php';
    $desc = isset($_POST["desc"]) ? mb_strtoupper(trim($_POST["desc"]), 'UTF-8') : null;

    $sql = "INSERT INTO fer_categoria VALUES(0, '$desc', 'N', null,null);";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado la categoria correctamemte !!!</p>";
    } else {
        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
    }
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_categoria.html'>Regresar</a>";
    ?>
</body>

</html>