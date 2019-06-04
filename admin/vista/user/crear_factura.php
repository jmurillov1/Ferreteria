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
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
    <script type="text/javascript" src="../../controladores/js/funciones.js"> </script>
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
    
    <table style="width:100%" border="1" id="informacion">
        <tr>
            <th>Usuario</th>
            <th>Sucursal</th>
            <th>Estado</th>
            <th>Total</th>
            <th>Facturar</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php";
        $codigo_usu = $_SESSION['fer_usu_codigo'];
        $sql = "SELECT * FROM fer_pedido_cabecera WHERE fer_ped_cab_usu_id= $codigo_usu";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql_usu = "SELECT fer_usu_nombres from fer_usuario WHERE fer_usu_id = $codigo_usu";
                $result2 = $conn->query($sql_usu);
                $row2 = $result2->fetch_assoc();


                $codigo_suc = $row['fer_ped_cab_suc_id'];
                $sql_suc = "SELECT fer_suc_direccion FROM fer_sucursal WHERE fer_suc_id = $codigo_suc";
                $result3 = $conn->query($sql_suc);
                $row3 = $result3->fetch_assoc();
                echo "<tr>";
                echo "   <td>" . $row2['fer_usu_nombres'] . "</td>";
                echo "   <td>" . $row3['fer_suc_direccion'] . "</td>";
                echo "   <td>" . $row['fer_ped_cab_estado'] . "</td>";
                echo "   <td>" . $row['fer_ped_cab_total'] . "</td>";
                echo "   <td>" . "<a href = '../../controladores/user/crear_factura.php?codigo=" . $row['fer_ped_cab_id'] . "'>" . "IR</a>" . "</td>";
                echo "</tr>";
            }
            $conn->close();
        }
        ?>
        </section>
    </table>




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