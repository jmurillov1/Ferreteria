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
    <title>Actualizar Sucursal Producto</title>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
</head>

<header>
        <section>
            <nav id="moopio">
                <ul id="menuPrincipal">
                    <li id="ul" ><a href="">PEDIDOS</a>
                    </li>
                    <li id="ul"><a href="">FACTURAS</a>
                    </li>
                    <li id="ul"><a href="usuarios.php">USUARIOS</a>
                    </li>
                    <li id="ul"><a href="">CATEGORIA</a>
                        <ul>
                            <li><a href="crear_categoria.html">CREAR</a></li>
                            <li><a href="listar_categoria.php">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="ul"><a href="">SUCURSAL</a>
                        <ul>
                            <li><a href="crear_sucursal.html">CREAR</a></li>
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
                            <!--<img src="data:image/jpg;base64,php echo $foto ?>"  width="15" height=15 >--><?php echo $nombre . ' ' . substr($apellido, 0, 1) . '.' ?></a>
                        <ul>
                            <li><a href="../../../config/cerrarSesionAdmin.php">CERRAR SESION</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </section>
    </header>
    
    <h1>Actualizar Sucursal Producto</h1>

    <?php
    include "../../../config/conexionBD.php";
    $codigo_suc_pro = $_GET['codigo'];
    $sql = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_id = $codigo_suc_pro AND fer_suc_pro_el = 'N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //$precio = $row["fer_pro_precio"];
            ?>
            <form id="form" method="POST" enctype="multipart/form-data" action="../../controladores/admin/actualizar_suc_producto.php">
                <div class>
                    <input class="in" type="hidden" id="codigo" name="codigo" value="<?php echo $row["fer_suc_pro_id"]; ?>" />
                    
                    <label for="stock">Stock(*)</label>
                    <input class="in" type="text" id="stock" name="stock" value="<?php echo $row["fer_suc_pro_stock"]; ?>" />
                    <span id="mensajeStock" class="error"> </span>
                    <br>
                    
                    <label for="pro">Producto(*)</label>
                    <select id="pro" name="pro">
                        <option value="default"></option>
                        <?php
                        include '../../../config/conexionBD.php';
                        $sql = "SELECT * FROM fer_producto WHERE fer_pro_el='N';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row2 = $result->fetch_assoc()) {
                                $codigo = $row2["fer_pro_id"];
                                $prod = $row2["fer_pro_nombre"];
                                if ($row["fer_suc_pro_prod_id"] == $codigo) {
                                    echo "<option value='" . $codigo . "'selected>" . $prod . "</option>";
                                } else {
                                    echo "<option  value='" . $codigo . "'>" . $prod . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <span id="mensajeProducto" class="error"></span>
                    <br>


                    <label for="suc">Sucursal(*)</label>
                    <select id="suc" name="suc">
                        <option value="default"></option>
                        <?php
                        include '../../../config/conexionBD.php';
                        $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_el='N';";
                        $result1 = $conn->query($sql);
                        if ($result1->num_rows > 0) {
                            while ($row3 = $result1->fetch_assoc()) {
                                $codigo1 = $row3["fer_suc_id"];
                                $suc = $row3["fer_suc_direccion"];
                                if ($row["fer_suc_pro_suc_id"] == $codigo1) {
                                    echo "<option value='" . $codigo1 . "'selected>" . $suc . "</option>";
                                    
                                } else {
                                    echo "<option  value='" . $codigo . "'>" . $suc . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <span id="mensajeSucursal" class="error"></span>
                    <br>

                </div>

                <input class="in" type="submit" value="Actualizar" />
                <input class="in" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>






    
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
            <h2>&copy; Copyright 2019 Powered by MurilloJ, A&ntilde;azcoN, BenavidezA </h1>
        </section>
    </footer>
</body>

</html>

