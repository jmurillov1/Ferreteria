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
<html>

<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
    <script type="text/javascript" src="../../controladores/js/funciones.js"></script>
</head>

<body>
    <header>
        <section>
            <nav id="moopio">
                <ul id="menuPrincipal">
                    <li id="ul"><a href="">PEDIDOS</a>
                    </li>
                    <li id="ul"><a href="">FACTURAS</a>
                    </li>
                    <li id="ul"><a href="usuarios.php">USUARIOS</a>
                    </li>
                    <li id="ul"><a href="">SUCURSAL</a>
                        <ul>
                            <li><a href="">CREAR</a></li>
                            <li><a href="">LISTAR</a></li>
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
                            <li><a href="">CREAR</a></li>
                            <li><a href="">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="de"><a href="">
                            <!--<img src="data:image/jpg;base64,php echo $foto ?>"  width="15" height=15 >--><?php echo $nombre . ' ' . substr($apellido, 0, 1) . '.' ?></a>
                        <ul>
                            <li><a href="modificarUsuario.php">MODIFICAR</a></li>
                            <li><a href="modificarContraseñaUsuario.php">ACT. CONTRA..</a></li>
                            <li><a href="eliminarUsuario.php">ELIMINAR</a></li>
                            <li><a href="../../../config/cerrarSesionAdmin.php">CERRAR SESION</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </section>
    </header>
    <h1>Actualizar Producto</h1>
    <?php
    include "../../../config/conexionBD.php";
    $codigo_pro = $_GET['codigo'];
    $sql = "SELECT * FROM fer_producto WHERE fer_pro_id = $codigo_pro AND fer_pro_el = 'N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $precio = $row["fer_pro_precio"];
            ?>
            <form id="form" method="POST" enctype="multipart/form-data" action="../../controladores/admin/actualizar_producto.php">
                <div class=" parte1">
                    <input class="in" type="hidden" id="codigo" name="codigo" value="<?php echo $row["fer_pro_id"]; ?>" />
                    <label for="nombre">Nombre(*)</label>
                    <input class="in" type="text" id="nombre" name="nombre" value="<?php echo $row["fer_pro_nombre"]; ?>" />
                    <span id="mensajeNombre" class="error"> </span>
                    <br>
                    <label for="desc">Descripción(*)</label>
                    <input class="in" type="text" id="desc" name="desc" value="<?php echo $row["fer_pro_desc"]; ?>" />
                    <span id="mensajeDescripcion" class="error"></span>
                    <br>
                    <label for="desc">Categoria(*)</label>
                    <select id="cat" name="cat">
                        <option value="default"></option>
                        <?php
                        include '../../../config/conexionBD.php';
                        $sql = "SELECT * FROM fer_categoria WHERE fer_cat_el='N';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row2 = $result->fetch_assoc()) {
                                $codigo = $row2["fer_cat_id"];
                                $desc = $row2["fer_cat_desc"];
                                if ($row["fer_pro_cat_id"] == $codigo) {
                                    echo "<option value='" . $codigo . "'selected>" . $desc . "</option>";
                                } else {
                                    echo "<option  value='" . $codigo . "'>" . $desc . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <span id="mensajeCategoria" class="error"></span>
                    <br>
                    <label for="precio">Precio(*)</label>
                    <input class="in" type="text" id="precio" name="precio" value="<?php echo $precio ?>" />
                    <span id="mensajePrecio" class="error"></span>
                    <br>

                </div>
                <div class=" parte2">
                    <input class="in" id="uploadImage1" type="file" name="image" onchange="previewImage(1)" accept="image/*" />
                    <img id="uploadPreview1" width="150" height="150" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_pro_foto']) ?>" width="100" height="100" />
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