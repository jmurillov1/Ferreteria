<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Sucursal</title>
</head>
<body>
<?php
    include "../../../config/conexionBD.php";  
    $codigo = $_POST['codigo'];
    $tel_suc= isset($_POST["telefono"]) ? mb_strtoupper(trim($_POST["telefono"]), 'UTF-8') : null;   
<<<<<<< HEAD
    echo $tel_suc;
    $dir_suc= isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
    echo $dir_suc;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_sucursal SET fec_suc_telefono='$tel_suc',fec_suc_direccion= '$dir_suc',fer_suc_mod = '$fecha' WHERE fer_suc_id = $codigo";
=======
    $dir_suc= isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_sucursal SET fer_suc_telefono='$tel_suc',fer_suc_direccion= '$dir_suc',fer_suc_mod = '$fecha' WHERE fer_suc_id = $codigo";
>>>>>>> 3103f135191f09a723996883d4e395c72332d4b5
    
    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos de productos correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/admin/listar_sucursal.php'>Regresar</a>";
    $conn->close();

    ?>
</body>
</html>