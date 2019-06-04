<?php
session_start();
$nombre = $_SESSION['fer_usu_nombres'];
$apellido = $_SESSION['fer_usu_apellidos'];
$foto = $_SESSION['fer_usu_foto'];
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Pedidos</title>
</head>

<body>
    <table style="width:100%" border="1" id="informacion">
        <tr>
            <th>Usuario</th>
            <th>Sucursal</th>
            <th>Anulado</th>
            <th>Total</th>
            <th>Ver</th>
            <th>Anular</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php";
        $codigo_usu = $_SESSION['fer_usu_codigo'];
        $sql1 = "SELECT * FROM fer_pedido_cabecera WHERE fer_ped_cab_usu_id= $codigo_usu;";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $cab = $row["fer_ped_cab_id"];
                $suc = $row["fer_ped_cab_suc_id"];
                $sqlc= "SELECT * FROM fer_factura_cabecera WHERE fer_fac_cab_ped_cab_id=$cab AND fer_fac_cab_anulado='N';";
                $resultc = $conn->query($sqlc);
                if ($resultc->num_rows > 0) {
                    while ($row = $resultc->fetch_assoc()) {
                        $sql_usu = "SELECT fer_usu_nombres from fer_usuario WHERE fer_usu_id = $codigo_usu";
                        $result2 = $conn->query($sql_usu);
                        $row2 = $result2->fetch_assoc();
                        
                        $sql_suc = "SELECT fer_suc_direccion FROM fer_sucursal WHERE fer_suc_id = $suc";
                        $result3 = $conn->query($sql_suc);
                        $row3 = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "   <td>" . $row2['fer_usu_nombres'] . "</td>";
                        echo "   <td>" . $row3['fer_suc_direccion'] . "</td>";
                        echo "   <td>" . $row['fer_fac_cab_anulado'] . "</td>";
                        echo "   <td>" . $row['fer_fac_cab_total'] . "</td>";
                        echo "   <td>" . "<a href = 'ver_factura.php?codigo=" . $row['fer_fac_cab_id'] . "'>" . "Ver</a>" . "</td>";
                        echo "   <td>" . "<a href = '../../controladores/user/anular_factura.php?codigo=" . $row['fer_fac_cab_id'] . "'>" . "IR</a>" . "</td>";
                        echo "</tr>";
                    }
                }
            }
        }
        $conn->close();
        ?>
        </section>
    </table>

</body>

</html>