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
    <script type="text/javascript" src="../../../js/funciones.js"></script>
    <title>Actualizar Usuario</title>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="index.php"><img id="cen" src="../../../public/imagenes/logo.png"></a>
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
                    <li id="ul" ><a href="">PEDIDOS</a>
                    </li>
                    <li id="ul"><a href="">FACTURAS</a>
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
                    <li id="de"><a href=""><img src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>"  width="15" height=15 ><?php echo $nombre . ' ' . substr($apellido, 0, 1) . '.' ?></a>
                        <ul>
                            <li><a href="../../../config/cerrarSesionAdmin.php">CERRAR SESION</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </section>
    </header>

    <h1>Eliminar Usuario</h1>


    <?php
    include '../../../config/conexionBD.php';
<<<<<<< HEAD
    $codigo = $_GET['codigo'] ;
=======
    $codigo = $_GET["codigo"];
>>>>>>> 0615472e7e268dc9ef5929302e436c6adca227c7
    $sql = "SELECT * FROM fer_usuario where fer_usu_id=$codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ?>
            <section id="form">
                <form method="POST" action="../../controladores/admin/eliminarUsuario.php" enctype="multipart/form-data">
                    <input id="in" type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <img id="uploadPreview1" name="uploadPreview1" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="200" height="200">
                    <br>
                    <label for="cedula">Cedula </label>
                    <input id="in" type="text" id="cedula" name="cedula" value="<?php echo $row["fer_usu_cedula"]; ?>" disabled />
                    <br>
                    <label for="nombres">Nombres</label>
                    <input id="in" type="text" id="nombres" name="nombres" value="<?php echo $row["fer_usu_nombres"]; ?>" disabled />
                    <br>
                    <label for="apellidos">Apelidos</label>
                    <input id="in" type="text" id="apellidos" name="apellidos" value="<?php echo $row["fer_usu_apellidos"]; ?>" disabled />
                    <br>
                    <label for="direccion">Dirección</label>
                    <input id="in" type="text" id="direccion" name="direccion" value="<?php echo $row["fer_usu_direccion"]; ?>" disabled />
                    <br>
                    <label for="telefono">Teléfono</label>
                    <input id="in" type="text" id="telefono" name="telefono" value="<?php echo $row["fer_usu_telefono"]; ?>" disabled />
                    <br>
                    <label for="fecha">Fecha Nacimiento</label>
                    <input id="in" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["fer_usu_fecha_nac"]; ?>" disabled />
                    <br>
                    <label for="correo">Correo electrónico </label>
                    <input id="in" type="email" id="correo" name="correo" value="<?php echo $row["fer_usu_correo"]; ?>" disabled />
                    <br>
                    <input id="in" type="submit" id="modificar" name="modificar" value="Eliminar Usuario" />
                </form>
            </section>
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