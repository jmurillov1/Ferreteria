<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Sucursales</title>
</head>
<body>
<table style="width:100%" border="1">
        <tr>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php";
        $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_el = 'N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row['fec_suc_telefono'] . "</td>";
                echo "   <td>" . $row['fec_suc_direccion'] . "</td>";
                echo "   <td>" . "<a href = 'actualizar_sucursal.php?codigo=" . $row['fer_suc_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = '../../controladores/admin/eliminar_sucursal.php?codigo=" . $row['fer_suc_id'] . "'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
            }
            $conn->close();
        }
        ?>
        </section>
    </table>
</body>
</html>