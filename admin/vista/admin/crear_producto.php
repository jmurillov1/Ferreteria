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
    <title>Sistema de Gestion de Ferretería</title>
    <script type="text/javascript" src="../../controladores/js/funciones.js"></script>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
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

    <h1>Insertar Nuevo Producto</h1>

    <form id="form" method="POST" enctype="multipart/form-data" action="../../controladores/admin/crear_producto.php">
        <div class=" parte1">
            <label for="nombre">Nombre(*)</label>
            <input class="in" type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el nombre del producto ..." />
            <span id="mensajeNombre" class="error"> </span>
            <br>
            <label for="desc">Descripción(*)</label>
            <input class="in" type="text" id="desc" name="desc" value="" placeholder="Ingrese su descripción ..." />
            <span id="mensajeDescripcion" class="error"></span>
            <br>
            <label for="desc">Categoria(*)</label>
            <select id="cat" name="cat">
                <option value="default"> Seleccione una Categoria</option>
                <?php
                include '../../../config/conexionBD.php';
                $sql = "SELECT * FROM fer_categoria WHERE fer_cat_el='N';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $codigo = $row["fer_cat_id"];
                        $desc = $row["fer_cat_desc"];
                        echo $desc;
                        echo "<option  value='" . $codigo . "'>" . $desc . "</option>";
                    }
                }
                ?>
            </select>
            <span id="mensajeCategoria" class="error"></span>
            <br>
            <label for="precio">Precio(*)</label>
            <input class="in" type="text" id="precio" name="precio" value="" placeholder="Ingrese el precio ..." />
            <span id="mensajePrecio" class="error"></span>
            <br>
        </div>
        <div class=" parte2">
            <label for="imagen">Seleccione imagen a cargar</label>
            <input class="in" id="uploadImage1" type="file" name="image" onchange="previewImage(1)" accept="image/*" />
            <img id="uploadPreview1" width="150" height="150" src="images/usu.PNG" />
            <input class="in" type="submit" id="crear" name="crear" value="Aceptar" />
            <input class="in" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
        </div>
    </form>

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