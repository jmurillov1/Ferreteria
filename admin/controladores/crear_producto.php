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
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $desc = isset($_POST["desc"]) ? mb_strtoupper(trim($_POST["desc"]), 'UTF-8') : null;
    $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : null;

    if ($_FILES["image"]["tmp_name"] != null) {
        $foto = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    } else {
        $foto = addslashes(file_get_contents('../vista/images/usu.PNG'));
    }


    $sql = "INSERT INTO fer_producto VALUES(0, '$nombre', '$desc', $precio, '$foto', 'N', null,null);";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamemte !!!</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'> La persona con la cedula $cedula ya está registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
    }
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_producto.html'>Regresar</a>";
    ?>
</body>

</html>