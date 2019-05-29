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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Principal Usuario</title>
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
                    <li><a href="">FACTURAS</a>
                        <ul>
                            <li>...</li>
                            <li>...</li>
                        </ul>
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


    <h1>Bienvenido Usuario</h1>
</body>

</html>