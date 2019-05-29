<?php
session_start();
$nombre = $_SESSION['fer_usu_nombres'];
$apellido = $_SESSION['fer_usu_apellidos'];  
$foto = $_SESSION['fer_usu_foto'];
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="../../../public/vista/index.html"><img id="cen" src="../../../public/imagenes/logo.png"></a>
</head>

<body>
<header>

<section>
    <nav id="moopio">
        <ul id="menuPrincipal">
            <li><a href="">PEDIDOS</a>
            </li>
            <li id="de"><a href="" > <img src="data:image/jpg;base64,<?php echo $foto ?>"  width="15" height=15 ><?php echo $nombre.' '.substr($apellido, 0,1).'.'?></a>
                <ul>
                    <li><a href="modificarUsuario.php">MODIFICAR</a></li>
                    <li><a href="modificarContraseñaUsuario.php">ACT. CONTRA..</a></li>
                    <li><a href="eliminarUsuario.php">ELIMINAR</a></li>
                    <li><a href="../../../config/cerrarSesionUser.php">CERRAR SESION</a></li>
                </ul>
            </li>
            <li id="de"><a href="">SUCURSAL</a>
                <ul>
                    <li><a href="">....</a></li>
                    <li><a href="">....</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</section>
</header>

<h1> ACTUALIZAR CONTRASENA</h1>

    <br>
    <?php
    $codigo = $_SESSION['fer_usuario_codigo'];
    ?>
    <section id="form">
    <form  method="POST" action="../../controladores/user/modificarContraseñaUsuario.php">
        <input id="in" type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
        <label for="cedula">Contraseña Actual (*)</label>
        <input id="in" type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..." />
        <br>
        <label for="cedula">Contraseña Nueva (*)</label>
        <input id="in" type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..." />
        <br>

        <input id="in" type="submit" id="modificar" name="modificar" value="Modificar" />
        <input id="in" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
    </section>
</body>

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
                        <li><a href="https://www.facebook.com/niko.anazco.1" target="_blank"><img src="../imagenes/fac.png"  width=80px heidth=180px></a></li>
                        <li><a href="https://mail.google.com/mail/" target="_blank"><img src="../imagenes/cor.png" width=80px heidth=120px></a></li>
                        <li><a href="https://twitter.com/Nik_Augusto?lang=es" target="_blank"><img src="../imagenes/twi.png" width=80px heidth=100px></a></li>
                        <li><a href="https://www.instagram.com/nikoap77/" target="_blank"><img src="../imagenes/ins.png" width=80px heidth=100px></a></li>
                    </ul>
                </div>
        </section>

        <section id="fot1">
            <h2>© Copyright 2019 Powered by MurilloJ, A&ntilde;azcoN, BenavidezA </h1>
        </section>
    </footer>
</html>