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
    <link href="../../../public/vista/css/stables.css" rel="stylesheet" type="text/css" />
    <link href="../../../public/vista/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../controladores/js/funciones.js"> </script>
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
</head>

<body id='res'>

<?php
include '../../../config/conexionBD.php';
$codigo = $_SESSION['fer_usu_codigo'];
$sql = "SELECT fer_usu_foto from fer_usuario where fer_usu_id = $codigo";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<header>
        <section>
            <nav id="moopio">
                <ul id="menuPrincipal">
                    <li><a href="">PEDIDOS</a>
                        <ul>
                            <li><a href="carrito.php">Crear Pedido</a></li>
                            <li><a href="listar_pedido.php">Listar Pedidos</a></li>
                        </ul>
                    </li>
                    <li><a href="">FACTURAS</a>
                        <ul>
                            <li><a href="crear_factura.php">Crear Factura</a></li>
                            <li><a href="listar_facturas.php">Listar Facturas</a></li>
                        </ul>
                    </li>
                    <li id="de"><a href=""><img src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="15" height=15><?php echo $nombre . ' ' . substr($apellido, 0, 1) . '.' ?></a>
                        <ul>
                            <li><a href="modificarUsuario.php">MODIFICAR</a></li>
                            <li><a href="modificarContraseñaUsuario.php">ACT. CONTRA..</a></li>
                            <li><a href="eliminarUsuario.php">ELIMINAR</a></li>
                            <li><a href="../../../config/cerrarSesionUser.php">CERRAR SESION</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </section>
    </header>
    
    <?php
    include '../../../config/conexionBD.php';
    $tot = 0.00;
    $sql = "SELECT SUM(fer_pdt_cant) FROM fer_ped_det_temp";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tot = $tot + $row["SUM(fer_pdt_cant)"];
        }
    }
    ?>

<br>
        <h1>
            Orden
        </h1>
<br>
  
    <a href="pedido_detalle.php" class="carr">
        <p id='car'>Carrito<img id='imagen2' src='../images/carrito.jpg' /> <input id='sel' value='<?php echo $tot ?>'> </p>
    </a>
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
        $sql = "SELECT * FROM fer_ped_det_temp";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["fer_pdt_id"];
                $pros = $row["fer_pdt_suc_pro_id"];
                $cantidad = $row["fer_pdt_cant"];
                $subtotal = $row["fer_pdt_subtotal"];
                $sql1 = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el='N' AND fer_suc_pro_id=$pros;";
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $stock = $row1["fer_suc_pro_stock"];
                $sql2 = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$row1[fer_suc_pro_prod_id];";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $npro = $row2["fer_pro_nombre"];
                $precio = $row2["fer_pro_precio"];
                $foto = $row2["fer_pro_foto"];
                ?>
                <tr>
                    <td>
                        <center><button onclick="eliminar(<?php echo $codigo ?>)"><img id='foto' src='../images/bote.jpg' alt='titulo foto' /></button></center>
                    </td>
                    <td>
                        <center><img id='foto' src='data:image/*;base64,<?php echo base64_encode($foto) ?>' alt='titulo foto' /></center>
                    </td>
                    <td><?php echo $npro; ?></td>
                    <td>
                        <button id="menosf" onclick="menos1(<?php echo $codigo ?>);cargarProducto(<?php echo $codigo ?>);actualizar(<?php echo $codigo ?>)">ꓦ</button>
                        <input id="cant<?php echo $codigo ?>" value="<?php echo $cantidad; ?>" disabled />
                        <button id="masf" onclick="mas1(<?php echo $codigo ?>,<?php echo $stock ?>);cargarProducto(<?php echo $codigo ?>);actualizar(<?php echo $codigo ?>)">ꓥ</button>
                    </td>
                    <td id="tdp<?php echo $codigo ?>"><?php echo $precio; ?></td>
                    <td><?php echo $subtotal; ?></td>
                </tr>
            <?php
        }
    } else {
        echo "<td>";
        echo "No hay productos seleccionados";
        echo "</td>";
    }

    $tot = 0.00;
    $sql = "SELECT * FROM fer_ped_det_temp";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tot = $tot + $row["fer_pdt_subtotal"];
        }
    }
    $conn->close();
    ?>
    </table>
    <div>
        <label for="total">Total a Pagar</label>
        <input class="in" id="tot" value="<?php echo number_format($tot, 2) ?>">
    </div>
    <button onclick="confirmar()"> Confirmar </button>
    <a href="index.php" onclick="cancelar()"> Cancelar </a>
    <a href='carrito.php'>Comprar</a>




    <footer>
    <section id="pa">
        <h2>
            INFORMACIÓN DE CONTACTO
        </h2>
        <h3>
            DIRECCION
        </h3>
        <h4>
            Av. Gil Ramirez Davalos y Eliat Liut
        </h4>
        <h3>
            TELEFONO
        </h3>
        <h3>
            0981241115 - 0989224223
        </h3>
        <h3>
            EMAIL
        </h3>
        <h4>
            servicio@tupernoferreteria.com
        </h4>

    </section>

    <section id="fot">
        <h2>REDES SOCIALES</h1>
            <div>
                <ul>
                    <li><a href="https://www.facebook.com/niko.anazco.1" target="_blank"><img src="../../../public/imagenes/fac.png" width=80px heidth=180px></a></li>
                    <li><a href="https://mail.google.com/mail/" target="_blank"><img src="../../../public/imagenes/cor.png" width=80px heidth=120px></a></li>
                    <li><a href="https://twitter.com/Nik_Augusto?lang=es" target="_blank"><img src="../../../public/imagenes/twi.png" width=80px heidth=100px></a></li>
                    <li><a href="https://www.instagram.com/nikoap77/" target="_blank"><img src="../../../public/imagenes/ins.png" width=80px heidth=100px></a></li>
                </ul>
            </div>
    </section>

    <section id="fot1">
        <h2> &copy; Copyright 2019 Powered by MurilloJ, AñazcoN, BenavidezA </h1>
    </section>
</footer>

</body>

</html>