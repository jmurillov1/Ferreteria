<?php
session_start();
$cod = $_SESSION['fer_usu_codigo'];
$nombre = $_SESSION['fer_usu_nombres'];
$apellido = $_SESSION['fer_usu_apellidos'];
$foto = $_SESSION['fer_usu_foto'];
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
</head>

<body>
    <table id="tbl">
        <?php
        $codigo = $_GET['codigo'];
        $cantidad = $_GET['cantidad'];
        $cab = $_GET['cab'];
        $suc = $_GET['suc'];
        $val = false;
        $val2 = false;
        $total = 0.00;
        include '../../config/conexionBD.php';

        $sqlp = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$codigo;";
        $resultp = $conn->query($sqlp);
        if ($resultp->num_rows > 0) {
            while ($row = $resultp->fetch_assoc()) {
                $precio = $row["fer_pro_precio"];
            }
        }

        $sql = "SELECT * FROM fer_pedido_cabecera WHERE fer_ped_cab_el='N';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['fer_ped_cab_id'] != $cab) {
                    $sqlc = "INSERT INTO fer_pedido_cabecera VALUES($cab,$cantidad*$precio,$cod,$suc,'Creado','N', null,null);";
                    if ($conn->query($sqlc) === TRUE) {
                        echo "<p>Se ha creado el pedido correctamemte !!!</p>";
                    } else {
                        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                    }
                    $val = true;
                } else {
                    $val2 = true;
                }
            }
        }
        $sqlp = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_el='N' AND fer_ped_det_suc_pro_id=$codigo;";
        $resultp = $conn->query($sqlp);
        if ($resultp->num_rows > 0) {
            while ($row = $resultp->fetch_assoc()) {
                if ($row["fer_ped_det_suc_pro_id"] == $codigo) {
                    $canti = $row["fer_ped_det_cant"] + $cantidad;
                    $sql = "UPDATE fer_pedido_detalle SET fer_ped_det_cant=$canti, fer_ped_det_subtotal=$canti*$precio WHERE fer_ped_det_id=$row[fer_ped_det_id] AND fer_ped_det_ped_cab_id=$cab";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Se ha actualizado los detalles correctamente !!!</p>";
                    } else {
                        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                    }
                }
            }
        } else {
            $sql = "INSERT INTO fer_pedido_detalle VALUES(0, $cantidad, $precio*$cantidad,$cod,$codigo,'N', null,null);";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Se ha craedo el detalle correctamemte !!!</p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }
        }
        if ($val2 == true) {
            $sqlc = "SELECT SUM(fer_ped_det_subtotal) FROM fer_pedido_detalle WHERE fer_ped_det_el='N' AND fer_ped_det_ped_cab_id=$cab ;";
            $resultc = $conn->query($sqlc);
            $row = $resultc->fetch_assoc();
            $total =  $row["SUM(fer_ped_det_subtotal)"];
            $sql = "UPDATE fer_pedido_cabecera SET fer_ped_cab_total=$total;";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Se ha actualizado el pedido correctamemte !!!</p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }
        }
        $conn->close();
        ?>
    </table>
</body>

</html>