<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <table style="width:100%" border="1">
        <tr>
            <th>Codigo</th>
            <th>Stock</th>
            <th>Producto</th>
            <th>Sucursal</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php";
        $prosucursal = $_GET['producto'];
        $sqlprod = "SELECT fer_pro_id FROM fer_producto WHERE fer_pro_el = 'N' AND fer_pro_nombre LIKE '$prosucursal%'";
        $resultproduc = $conn->query($sqlprod);
        if ($resultproduc->num_rows > 0) {
            while ($rowsuc = $resultproduc->fetch_assoc()) {
                $codigopro = $rowsuc['fer_pro_id'];
                $sql = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el = 'N'AND fer_suc_pro_prod_id = $codigopro";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $codigoPro = $row['fer_suc_pro_prod_id'];
                        $sql_pro = "SELECT fer_pro_nombre from fer_producto WHERE fer_pro_id = $codigoPro";
                        $result2 = $conn->query($sql_pro);
                        $row2 = $result2->fetch_assoc();

                        $codigoSuc = $row['fer_suc_pro_suc_id'];
                        $sql_suc = "SELECT fer_suc_direccion from fer_sucursal WHERE fer_suc_id = $codigoSuc";
                        $result3 = $conn->query($sql_suc);
                        $row3 = $result3->fetch_assoc();


                        echo "<tr>";
                        echo "   <td>" . $row['fer_suc_pro_id'] . "</td>";
                        echo "   <td>" . $row['fer_suc_pro_stock'] . "</td>";
                        echo "   <td>" . $row2['fer_pro_nombre'] . "</td>";
                        echo "   <td>" . $row3['fer_suc_direccion'] . "</td>";
                        echo "   <td>" . "<a href = 'actualizar_suc_producto.php?codigo=" . $row['fer_suc_pro_id'] . "'>" . "Actualizar</a>" . "</td>";
                        echo "   <td>" . "<a href = '../../controladores/admin/eliminar_suc_producto.php?codigo=" . $row['fer_suc_pro_id'] . "'>" . "Eliminar</a>" . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "   <td colspan='11'> Este producto no esta registrado en el sistema</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='11'> Este producto no esta registrado en el sistema</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>