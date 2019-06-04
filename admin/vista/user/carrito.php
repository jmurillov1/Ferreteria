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
    <link href="../../../public/vista/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../controladores/js/funciones.js"> </script>
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
    <script type="text/javascript" src="../../controladores/js/funciones.js"> </script>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
</head>

<body>

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
    $suc = $_SESSION["suc"];
    $sql = "SELECT SUM(fer_pdt_cant) FROM fer_ped_det_temp";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tot = $tot + $row["SUM(fer_pdt_cant)"];
        }
    }
    ?>
    <header class="cabis">
        <h4>Productos</h4>
    </header>
    <a href="pedido_detalle.php" class="carr">
        <p id='car'>Carrito<img id='imagen2' src='../images/carrito.jpg' /> <input id='sel' value='<?php echo $tot ?>'> </p>
    </a>
    <input autofocus type="text" id="correo" name="correo" value="" placeholder="Ingrese cédula para buscar" required onkeyup="buscarPorCorreo()" />
    <div id="info">
        <?php
        $sql = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el='N' AND fer_suc_pro_suc_id=$suc;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["fer_suc_pro_id"];
                $stock = $row["fer_suc_pro_stock"];
                $producto = $row["fer_suc_pro_prod_id"];
                $sqlp = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$producto;";
                $resultp = $conn->query($sqlp);
                if ($resultp->num_rows > 0) {
                    while ($rowp = $resultp->fetch_assoc()) {
                        $nombre = $rowp["fer_pro_nombre"];
                        $descripcion = $rowp["fer_pro_desc"];
                        $precio = $rowp["fer_pro_precio"];
                        $foto = $rowp["fer_pro_foto"];
                    }
                }
                echo "<section id='pro'>";
                echo "<div class='parte1'>";
                echo $nombre . "<br>";
                echo $descripcion  . "<br>";
                echo "$" . substr($precio, 0, 4)  . "<br>";
                echo "</div>";
                echo "<div class='parte2'><img id='foto' src='data:image/*;base64," . base64_encode($foto) . "' alt='titulo foto' /></div>";
                echo "<div class='parte3'>";
                echo "<button id='menos' onclick='menos($codigo)'>-</button>";
                echo "<input class='ctd' name='ctd' id='ctd$codigo' value='1' />";
                echo "<button id='mas' onclick='mas($codigo,$stock)'>+</button> <br>";
                echo "<button class='agg' id='agg$codigo' onclick='agregar($codigo)'>Agregar Carrito</button>";
                echo "</div>";
                echo "</section>";
            }
        } else {
            echo  "<div>No Hay Productos</div>";
        }
        $conn->close();
        ?>
    </div>




    <br>

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