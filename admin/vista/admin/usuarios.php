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
    <title>Usuarios</title>
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
                    </li>
                    <li><a href="usuarios.php">USUARIOS</a>
                    </li>
                    <li><a href="">SUCURSAL</a>
                        <ul>
                            <li><a href="">CREAR</a></li>
                            <li><a href="">LISTAR</a></li>
                        </ul>
                    </li>
                    <li><a href="">PRODUCTOS SUCURSAL</a>
                        <ul>
                            <li><a href="">CREAR</a></li>
                            <li><a href="">LISTAR</a></li>
                        </ul>
                    </li>
                    <li id="de"><a href="" > <!--<img src="data:image/jpg;base64,php echo $foto ?>"  width="15" height=15 >--><?php echo $nombre.' '.substr($apellido, 0,1).'.'?></a>
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



    <div>
        <h1>Usuarios</h1>
    </div>
    <table style="width:100%" border="1px">
        <tr>
            <th>Foto</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>FechaDeNacimiento</th>
            <th>Correo</th> 
            <th>Actualizar</th> 
            <th>Eliminar</th> 
            <th>Actualizar Contraseña</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM fer_usuario WHERE fer_usu_el = 'N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { 
                echo "<tr>"; 
                ?>  
                 <td> <img id="uploadPreview1" name ="uploadPreview1"  class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="40" height="40"> </td>;
                <?php 
                echo "   <td>" . $row['fer_usu_cedula'] . "</td>";
                echo "   <td>" . $row['fer_usu_nombres'] . "</td>";
                echo "   <td>" . $row['fer_usu_apellidos'] . "</td>";
                echo "   <td>" . $row['fer_usu_direccion'] . "</td>";
                echo "   <td>" . $row['fer_usu_telefono'] . "</td>";
                echo "   <td>" . $row['fer_usu_fecha_nac'] . "</td>";
                echo "   <td>" . $row['fer_usu_correo'] . "</td>"; 
                echo "   <td>" . "<a href = 'modificarUsuario.php?codigo=" . $row['fer_usu_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = 'eliminarUsuario.php?codigo=" . $row['fer_usu_id'] . "'>" . "Eliminar</a>" . "</td>";
                echo "   <td>" . "<a href = 'modificarContraseñaUsuario.php?codigo=" . $row['fer_usu_id'] . "'>" . "Actualizar Contraseña</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
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
                            <li><a href="https://www.facebook.com/niko.anazco.1" target="_blank"><img src="../imagenes/fac.png"  width=80px heidth=180px></a></li>
                            <li><a href="https://mail.google.com/mail/" target="_blank"><img src="../imagenes/cor.png" width=80px heidth=120px></a></li>
                            <li><a href="https://twitter.com/Nik_Augusto?lang=es" target="_blank"><img src="../imagenes/twi.png" width=80px heidth=100px></a></li>
                            <li><a href="https://www.instagram.com/nikoap77/" target="_blank"><img src="../imagenes/ins.png" width=80px heidth=100px></a></li>
                        </ul>
                    </div>
            </section>
    
            <section id="fot1">
                <h2>&copy; Copyright 2019 Powered by MurilloJ, A&ntilde;azcoN, BenavidezA </h1>
            </section>
        </footer>
</body>

</html>