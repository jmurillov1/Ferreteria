<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Categoria</title>
</head>
<body>
<?php
    include "../../../config/conexionBD.php";  
    $codigo = $_POST['codigo'];
    $desc_categoria = isset($_POST["desc"]) ? mb_strtoupper(trim($_POST["desc"]), 'UTF-8') : null;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_categoria SET fer_cat_desc ='$desc_categoria',fer_cat_mod = '$fecha' WHERE fer_cat_id = $codigo";
    
    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos de productos correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/admin/listar_productos.php'>Regresar</a>";
    $conn->close();

    ?>
</body>
</html>