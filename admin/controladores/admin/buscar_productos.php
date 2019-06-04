<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
</head>

<body>
    <table style="width:100%" border="1" id="informacion">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Categoria</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $producto = $_GET['producto'];
        $sql = "SELECT * FROM fer_producto WHERE fer_pro_nombre LIKE '$producto%' AND fer_pro_el = 'N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo_des = $row['fer_pro_cat_id'];
                $sql_des = "SELECT fer_cat_desc from fer_categoria WHERE fer_cat_id = $codigo_des";
                $result2 = $conn->query($sql_des);
                $row2 = $result2->fetch_assoc();
                echo "<tr>";
                echo "   <td>" . $row['fer_pro_nombre'] . "</td>";
                echo "   <td>" . $row['fer_pro_desc'] . "</td>";
                echo "   <td>" . $row['fer_pro_precio'] . "</td>";
                ?>
                <td> <img id="uploadPreview1" name="uploadPreview1" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_pro_foto']) ?>" width="100" height="100"> </td>
                <?php
                echo "   <td>" . $row2['fer_cat_desc'] . "</td>";
                echo "   <td>" . "<a href = 'actualizar_Producto.php?codigo=" . $row['fer_pro_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = '../../controladores/admin/eliminar_producto.php?codigo=" . $row['fer_pro_id'] . "'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
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