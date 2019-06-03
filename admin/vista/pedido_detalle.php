<?php
session_start();
$cod = $_SESSION['fer_usu_codigo'];
$nombre = $_SESSION['fer_usu_nombres'];
$apellido = $_SESSION['fer_usu_apellidos'];
$foto = $_SESSION['fer_usu_foto'];
$cab = $_SESSION['cab'];
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../public/vista/css/stables.css" rel="stylesheet" type="text/css" />
    <link href="../../public/vista/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../controladores/js/funciones.js"> </script>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    /*$sqlu = "SELECT * FROM usuario WHERE usu_codigo='$codigoui';";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();
    $foto = $row["usu_foto"];*/
    ?>
    <header class="cabis">
        <h2>
            Pedido Detalle
        </h2>
    </header>
    <table id="tbl">
        <tr>
            <th></th>
            <th></th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $sql = "SELECT * FROM fer_pedido_detalle WHERE fer_ped_det_el='N' AND fer_ped_det_ped_cab_id=$cab;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["fer_ped_det_id"];
                $pro = $row["fer_ped_det_suc_pro_id"];
                $cantidad = $row["fer_ped_det_cant"];
                $subtotal = $row["fer_ped_det_subtotal"];
                $sql1 = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el='N' AND fer_suc_pro_id=$pro;";
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $sql2 = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$row1[fer_suc_pro_prod_id];";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $npro = $row2["fer_pro_nombre"];
                $precio=$row2["fer_pro_precio"];
                $foto = $row2["fer_pro_foto"];
                ?>
                <tr>
                    <td></td>
                    <td><img id='foto' src='data:image/*;base64,<?php echo base64_encode($foto) ?>' alt='titulo foto' /></td>
                    <td><?php echo $npro; ?></td>
                    <td>
                        <button id="menosf" onclick="menos1();cargarProducto()">-</button>
                        <input id="cant1" value="<?php echo $cantidad; ?>" />
                        <button id="masf" onclick="mas1();cargarProducto()">+</button>
                    </td>
                    <td><?php echo $precio; ?></td>
                    <td><?php echo $subtotal; ?></td>
                </tr>
            <?php
        }
    }
    ?>
    </table>
    <footer>
        <h5> Copyright </h5>
        <h5> Jordan Murillo </h5>
        <h5> 2019 </h5>
    </footer>
</body>

</html>