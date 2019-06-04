<?php
session_start();
$nombre = $_SESSION['fer_usu_nombres'];
$apellido = $_SESSION['fer_usu_apellidos'];
$foto = $_SESSION['fer_usu_foto'];
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
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
                    <li id="ul"><a href="">PEDIDOS</a>
                        <ul>
                            <li><a href="listar_pedido.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="ul"><a href="">FACTURAS</a>
                        <ul>
                            <li><a href="listar_facturas.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="ul"><a href="usuarios.php">USUARIOS</a>
                    </li>
                    <li id="ul"><a href="">CATEGORIA</a>
                        <ul>
                            <li><a href="crear_categoria.php">CREAR</a></li>
                            <li><a href="listar_categoria.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="ul"><a href="">SUCURSAL</a>
                        <ul>
                            <li><a href="crear_sucursal.php">CREAR</a></li>
                            <li><a href="listar_sucursal.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="ul"><a href="">PRODUCTOS</a>
                        <ul>
                            <li><a href="crear_producto.php">CREAR</a></li>
                            <li><a href="listar_productos.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li><a href="">PRODUCTOS SUCURSAL</a>
                        <ul>
                            <li><a href="crear_suc_producto.php">CREAR</a></li>
                            <li><a href="listar_suc_producto.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="de"><a href="">
                    <li id="de"><a href=""><img src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="15" height=15><?php echo $nombre . ' ' . substr($apellido, 0, 1) . '.' ?></a>
                        <ul>
                            <li><a href="../../../config/cerrarSesionAdmin.php">CERRAR SESION</a></li>
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
            <th>Anulado</th>
            <th>Total</th>
            <th>Ver</th>
            <th>Anular</th>
        </tr>
        <?php
        include "../../../config/conexionBD.php";
        $codigo_usu = $_SESSION['fer_usu_codigo'];
        $sql1 = "SELECT * FROM fer_pedido_cabecera;";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $usu = $row["fer_ped_cab_usu_id"];
                $cab = $row["fer_ped_cab_id"];
                $suc = $row["fer_ped_cab_suc_id"];
                $sqlc = "SELECT * FROM fer_factura_cabecera WHERE fer_fac_cab_ped_cab_id=$cab AND fer_fac_cab_anulado='N';";
                $resultc = $conn->query($sqlc);
                if ($resultc->num_rows > 0) {
                    while ($row = $resultc->fetch_assoc()) {
                        $sql_usu = "SELECT fer_usu_nombres from fer_usuario WHERE fer_usu_id = $usu";
                        $result2 = $conn->query($sql_usu);
                        $row2 = $result2->fetch_assoc();

                        $sql_suc = "SELECT fer_suc_direccion FROM fer_sucursal WHERE fer_suc_id = $suc";
                        $result3 = $conn->query($sql_suc);
                        $row3 = $result3->fetch_assoc();
                        echo "<tr>";
                        echo "   <td>" . $row2['fer_usu_nombres'] . "</td>";
                        echo "   <td>" . $row3['fer_suc_direccion'] . "</td>";
                        echo "   <td>" . $row['fer_fac_cab_anulado'] . "</td>";
                        echo "   <td>" . $row['fer_fac_cab_total'] . "</td>";
                        echo "   <td>" . "<a href = 'ver_factura.php?codigo=" . $row['fer_fac_cab_id'] . "'>" . "Ver</a>" . "</td>";
                        echo "   <td>" . "<a href = '../../controladores/user/anular_factura.php?codigo=" . $row['fer_fac_cab_id'] . "'>" . "IR</a>" . "</td>";
                        echo "</tr>";
                    }
                }
            }
        }
        $conn->close();
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