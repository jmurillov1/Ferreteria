<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Categorias</title>
</head>
<body>
<table style="width:100%" border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php";
        $sql = "SELECT * FROM fer_categoria WHERE fer_cat_el = 'N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row['fer_cat_id'] . "</td>";
                echo "   <td>" . $row['fer_cat_desc'] . "</td>";
                echo "   <td>" . "<a href = 'actualizar_categoria.php?codigo=" . $row['fer_cat_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = '../../controladores/admin/eliminar_producto.php?codigo=" . $row['fer_cat_id'] . "'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
            }
            $conn->close();
        }
        ?>
        </section>
    </table>
</body>
</html>