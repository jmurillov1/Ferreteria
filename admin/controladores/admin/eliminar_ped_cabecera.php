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
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];

    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_pedido_cabecera SET fer_ped_cab_el= 'S', fer_ped_cab_mod = '$fecha' WHERE fer_ped_cab_id = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    $sql_det = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_ped_cab_id = $codigo";
    $result = $conn->query($sql_det);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
            $codigodtl = $row['fer_ped_det_id'];
            $sql_up = "UPDATE fer_pedido_detalle SET fer_ped_det_el= 'S', fer_ped_det_mod = '$fecha' WHERE fer_ped_det_id = $codigodtl"; 
            if ($conn->query($sql_up) === TRUE) {
 
            } else {
                echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            }
        }
    }

    echo "<a href='../../vista/admin/listar_pedido.php'>Regresar</a>";
    $conn->close();
    ?>
</body>

</html>