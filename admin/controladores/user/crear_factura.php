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
        $codigoc = $_GET["codigo"];
        $cont = 0;
        date_default_timezone_set("America/Guayaquil");

        $sqlc = "SELECT * FROM fer_factura_cabecera";
        $resultc = $conn->query($sqlc);
        if ($resultc->num_rows > 0) {
            while ($rowc = $resultc->fetch_assoc()) {
                if ($rowc['fer_fac_cab_ped_cab_id'] !== $codigoc) {
                    $cont = $cont + 1;
                } else {
                    echo "Ya existe esta Factura";
                }
            }
        }
        if ($cont == 0) {
            $sql2 = "SELECT * FROM fer_pedido_cabecera WHERE fer_ped_cab_id=$codigoc";
            $result2 = $conn->query($sql2);
            $row = $result2->fetch_assoc();
            $total = $row['fer_ped_cab_total'];
            $usuario = $row['fer_ped_cab_usu_id'];
            $suc = $row['fer_ped_cab_suc_id'];
            $sqld = "INSERT INTO fer_factura_cabecera VALUES(0,$total,$codigoc,'N',null,null)";
            if ($conn->query($sqld) === TRUE) {
                echo "<p>Se ha agregado cabecera correctamente fact !!!</p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }

            $sqld = "UPDATE fer_pedido_cabecera SET fer_ped_cab_estado='Confirmado' WHERE fer_ped_cab_id=$codigoc;";
            if ($conn->query($sqld) === TRUE) {
                echo "<p>Se ha actualizado cabecera correctamente !!!</p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }

            $sql1 = "SELECT MAX(fer_fac_cab_id) FROM fer_factura_cabecera;";
            $result1 = $conn->query($sql1);
            $row = $result1->fetch_assoc();
            $cab = $row["MAX(fer_fac_cab_id)"];
            echo $cab;

            $sql2 = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_ped_cab_id=$codigoc";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $codigod = $row['fer_ped_det_id'];
                    $cantidad = $row['fer_ped_det_cant'];
                    $subtotal = $row['fer_ped_det_subtotal'];
                    $pros = $row['fer_ped_det_suc_pro_id'];
                    $sqld = "INSERT INTO fer_factura_detalle VALUES(0,$cantidad,$subtotal,$cab,$codigod,'N',null)";
                    if ($conn->query($sqld) === TRUE) {
                        echo "<p>Se ha agregado detalle correctamente ped !!!</p>";
                    } else {
                        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                    }
                }
            }
        }
        $conn->close();
        ?>
    </table>
</body>

</html>