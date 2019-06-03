<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Sucursal Producto</title>
</head>
<body>
<?php
    include "../../../config/conexionBD.php";  
    $codigo = $_POST['codigo'];
    $suc_pro_stock = isset($_POST["stock"]) ? mb_strtoupper(trim($_POST["stock"]), 'UTF-8') : null;
    $suc_pro_prod = (int)isset($_POST["pro"]) ? trim($_POST["pro"]) : null;
    $suc_pro_suc = (int)isset($_POST["suc"]) ? trim($_POST["suc"]) : null;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_sucursal_producto SET fer_suc_pro_stock ='$suc_pro_stock', fer_suc_pro_prod_id = '$suc_pro_prod', fer_suc_pro_suc_id = '$suc_pro_suc', fer_suc_pro_mod = '$fecha' WHERE fer_suc_pro_id = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos de productos correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/admin/listar_suc_producto.php'>Regresar</a>";
    $conn->close();

    ?>
</body>

</html>