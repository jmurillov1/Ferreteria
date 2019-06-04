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
            <th>Producto</th> 
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Actualizar</th> 
            <th>Eliminar</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php"; 
        $codigo_cab=$_GET['codigo'];
        $sql = "SELECT * FROM fer_factura_detalle WHERE fer_fac_det_fac_cab_id = $codigo_cab";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { 
                $codigo_pro_suc = $row['fer_fac_det_suc_pro_id'];
                $sql_pro_suc = "SELECT fer_suc_pro_suc_id from fer_sucursal_producto WHERE fer_suc_pro_id = $codigo_pro_suc";
                $result2 = $conn->query($sql_pro_suc);
                $row2 = $result2->fetch_assoc();  

                $codigo_pro= $row2['fer_suc_pro_suc_id'];
                $sql_pro = "SELECT fer_pro_nombre from fer_producto WHERE fer_pro_id = $codigo_pro";
                $result3 = $conn->query($sql_pro);
                $row3 = $result3->fetch_assoc();  
                
                echo "<tr>";
                echo "   <td>" . $row3['fer_pro_nombre'] . "</td>";
                echo "   <td>" . $row['fer_ped_det_cant'] . "</td>";
                echo "   <td>" . $row['fer_ped_det_subtotal'] . "</td>"; 
                echo "   <td>" . "<a href = 'actualizar_Producto.php?codigo=" . $row['fer_ped_det_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = '../../controladores/admin/eliminar_producto.php?codigo=" . $row['fer_ped_det_id']. "'>" . "Eliminar</a>" . "</td>";
                echo "</tr>";
            }
            $conn->close();
        }
        ?>
        </section>
    </table>

</body>

</html>