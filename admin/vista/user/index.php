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
    <title>Principal Usuario</title>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
    <script type="text/javascript" src="../../controladores/js/funciones.js"> </script>

</head>

<body>

    <?php
    include '../../../config/conexionBD.php';
    $codigo = $_SESSION['fer_usu_codigo'];
    $codigos = 0;
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
    <h1>Bienvenido Usuario</h1>

    <br>


    <label for="desc">Sucursal(*)</label>
    <select id="" name="">
        <option> Seleccione Sucursal</option>
        <?php
        //include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_el='N';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row2 = $result->fetch_assoc()) {
                $codigos = $row2["fer_suc_id"];
                $desc = $row2["fer_suc_direccion"];
                echo "<option id='item$codigos' onclick='val($codigos)' value='" . $codigos . "'>" . $desc . "</option>";
            }
        }
        ?>
        <br>
    </select>

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