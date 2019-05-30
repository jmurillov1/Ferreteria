<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    include "../../config/conexionBD.php";
    $nombre_producto = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $desc_producto = isset($_POST["desc"]) ? mb_strtoupper(trim($_POST["desc"]), 'UTF-8') : null;
    $precio_producto = isset($_POST["precio"]) ? trim($_POST["precio"]) : null;
    $cat_producto = (int)isset($_POST["cat"]) ? trim($_POST["cat"]) : null;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    if ($_FILES["image"]["tmp_name"] != null) {
        $foto = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $sql = "UPDATE fer_producto SET fer_pro_nombre ='$nombre_producto',fer_pro_desc='$desc_producto',fer_pro_precio = '$precio_producto', fer_pro_foto = '$foto', fer_pro_cat_id = $cat_producto, fer_pro_mod = '$fecha'";
    } else {
        $sql = "UPDATE fer_producto SET fer_pro_nombre ='$nombre_producto',fer_pro_desc='$desc_producto',fer_pro_precio = '$precio_producto',fer_pro_cat_id = $cat_producto, fer_pro_mod = '$fecha'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../vista/listar_productos.php'>Regresar</a>";
    $conn->close();

    ?>
</body>

</html>