<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <table style="width:100%" border="1" id="informacion">
        <tr>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sucursal = $_GET['sucursal'];
        $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_direccion LIKE '$sucursal%' AND fer_suc_el = 'N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row['fer_suc_direccion'] . "</td>";
                echo "   <td>" . $row['fer_suc_telefono'] . "</td>";
                echo "   <td>" . "<a href = 'actualizar_sucursal.php?codigo=" . $row['fer_suc_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = '../../controladores/admin/eliminar_sucursal.php?codigo=" . $row['fer_suc_id'] . "'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='11'> Esta sucursal no esta registrada en el sistema</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>