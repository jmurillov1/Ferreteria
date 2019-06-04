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
        include '../../../config/conexionBD.php';
        $suc = $_SESSION["suc"];
        $total = $_GET["total"];
        date_default_timezone_set("America/Guayaquil");

        $sql = "INSERT INTO fer_pedido_cabecera VALUES(0, $total,$cod,$suc,'Creado','N',null,null);";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha agregado correctamente cabecera ped !!!</p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
        $sql1 = "SELECT MAX(fer_ped_cab_id) FROM fer_pedido_cabecera;";
        $result1 = $conn->query($sql1);
        $row = $result1->fetch_assoc();
        $cab = $row["MAX(fer_ped_cab_id)"];
        echo $cab;

        $sql2 = "SELECT * FROM fer_ped_det_temp";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $cantidad = $row['fer_pdt_cant'];
                $subtotal = $row['fer_pdt_subtotal'];
                $pros = $row['fer_pdt_suc_pro_id'];
                $sqld = "INSERT INTO fer_pedido_detalle VALUES(0,$cantidad,$subtotal,$cab,$pros,'N',null,null)";
                if ($conn->query($sqld) === TRUE) {
                    echo "<p>Se ha agregado detalle correctamente ped !!!</p>";
                } else {
                    echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                }
                $sqlps = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_id=$pros;";
                $resultps = $conn->query($sqlps);
                $row = $resultps->fetch_assoc();
                $cantidad2 = $row["fer_suc_pro_stock"];
                $fecha = date('Y-m-d H:i:s', time());
                $sqld = "UPDATE fer_sucursal_producto SET fer_suc_pro_stock=$cantidad2-$cantidad , fer_suc_pro_mod=$fecha WHERE fer_suc_pro_id=$pros";
                if ($conn->query($sqld) === TRUE) {
                    echo "<p>Se ha disminuido stock !!!</p>";
                } else {
                    echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                }
            }
        }

        $sqlp = "DELETE FROM fer_ped_det_temp;";
        if ($conn->query($sqlp) === TRUE) {
            echo "<p>Se ha creado el pedido correctamemte !!!</p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }

        $sql = "ALTER TABLE fer_ped_det_temp AUTO_INCREMENT=0;";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado el pedido correctamemte !!!</p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>