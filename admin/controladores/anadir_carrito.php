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
        include '../../config/conexionBD.php';

        $sql = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_el='N';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["fer_ped_det_suc_pro_id"] == $codigo) {
                    $canti = $row["fer_ped_det_cant"] + $cantidad;
                    $sql = "UPDATE fer_pedido_detalle SET fer_ped_det_cant=$canti WHERE fer_ped_det_id=$row[fer_ped_det_id]";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Se ha creado los datos personales correctamemte !!!</p>";
                    } else {
                        if ($conn->errno == 1062) {
                            echo "<p class='error'> La persona con la cedula $cedula ya está registrada en el sistema </p>";
                        } else {
                            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                        }
                    }
                }
            }
        } else {
            $sql = "INSERT INTO fer_pedido_detalle VALUES(0, $cantidad, 0.00, 0.00,1,$codigo,'N', null,null);";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Se ha creado los datos personales correctamemte !!!</p>";
            } else {
                if ($conn->errno == 1062) {
                    echo "<p class='error'> La persona con la cedula $cedula ya está registrada en el sistema </p>";
                } else {
                    echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                }
            }
        }
        $conn->close();
        ?>
    </table>
</body>

</html>