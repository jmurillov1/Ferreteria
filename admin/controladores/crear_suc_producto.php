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
    $stock = (int)isset($_POST["stock"]) ? trim($_POST["stock"]) : null;
    $sucursal = (int)isset($_POST["sucursal"]) ? trim($_POST["sucursal"]) : null;
    $producto = (int)isset($_POST["producto"]) ? trim($_POST["producto"]) : null;

    $sql = "INSERT INTO fer_sucursal_producto VALUES(0, $stock, $producto, $sucursal, 'N', null,null);";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado el producto sucursal correctamemte !!!</p>";
    } else {
        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
    }
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_suc_producto.php'>Regresar</a>";
    ?>
</body>

</html>