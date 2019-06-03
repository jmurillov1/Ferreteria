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
        $val = false;
        $val2 = false;
        $total = 0.00;
        include '../../config/conexionBD.php';

        $sql = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_el='N' AND fer_ped_det_id=$codigo;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pro = $row["fer_ped_det_suc_pro_id"];
                $sql1 = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el='N' AND fer_suc_pro_id=$pro;";
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $sql2 = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$row1[fer_suc_pro_prod_id];";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $precio = $row2["fer_pro_precio"];
            }
        }

        $sqlp = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_el='N' AND fer_ped_det_id=$codigo;";
        $resultp = $conn->query($sqlp);
        if ($resultp->num_rows > 0) {
            while ($row = $resultp->fetch_assoc()) {
                $sql = "UPDATE fer_pedido_detalle SET fer_ped_det_cant=$cantidad, fer_ped_det_subtotal=$cantidad*$precio WHERE fer_ped_det_id=$codigo";
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Se ha actualizado los detalles correctamente !!!</p>";
                } else {
                    echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                }
            }
        }

        $sqlc = "SELECT SUM(fer_ped_det_subtotal) FROM fer_pedido_detalle WHERE fer_ped_det_el='N';";
        $resultc = $conn->query($sqlc);
        $row = $resultc->fetch_assoc();
        $total =  $row["SUM(fer_ped_det_subtotal)"];
        $sql = "UPDATE fer_pedido_cabecera SET fer_ped_cab_total=$total;";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha actualizado el pedido correctamemte !!!</p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>