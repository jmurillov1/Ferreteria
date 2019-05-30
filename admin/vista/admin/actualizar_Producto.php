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
    <link href="../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="../../public/vista/index.html"><img id="cen" src="../../public/imagenes/logo.png"></a>
</head>

<body>
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

    <?php
    include "../../config/conexionBD.php";
    $codigo_pro = $_GET['codigo'];
    $sql = "SELECT * FROM fer_producto WHERE fer_pro_id = $codigo_pro AND fer_pro_el = 'N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $precio = $row["fer_pro_precio"];
            ?>
            <form id="form" method="POST" enctype="multipart/form-data" action="../controladores/crear_producto.php">
                <div class=" parte1">
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
                        include '../../config/conexionBD.php';
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
                    <input type="text" id="precio" name="precio" value="<?php echo $precio ?>" />
                    <span id="mensajePrecio" class="error"></span>
                    <br>
                    <input type="submit" id="crear" name="crear" value="Aceptar" />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                </div>
                <div class=" parte2">
                    <input class="in" id="uploadImage1" type="file" name="image" onchange="previewImage(1)" accept="image/*" />
                    <img id="uploadPreview1" width="150" height="150" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_pro_foto']) ?>" width="100" height="100" />
                </div> 
                <input type="submit" value="Actualizar" />
            </form>
        <?php
    }
} else {
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
</body>

</html>