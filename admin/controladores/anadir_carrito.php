<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../../public/vista/css/stables.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <table id="tbl">
        <?php
        $codigo = $_GET['codigo'];
        $cantidad = $_GET['cantidad'];
        include '../../../config/conexionBD.php';
        $foto = null;
        $nombre = null;
        $precio = 0.00;
        $val = false;
        $val1 = false;

        $sql = "INSERT INTO fer_pedido_detalle VALUES(0, '$cant', '$desc', $precio, '$foto',$cat, 'N', null,null);";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte !!!</p>";
        } else {
            if ($conn->errno == 1062) {
                echo "<p class='error'> La persona con la cedula $cedula ya está registrada en el sistema </p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }
        }
        $conn->close();
        ?>
    </table>
</body>

</html>