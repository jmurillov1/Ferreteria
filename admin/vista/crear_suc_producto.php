<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Ferretería</title>
    <link href="../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="../../public/vista/index.html"><img id="cen" src="../../public/imagenes/logo.png"></a>
</head>

<body>
    <header class="cab">
        <h1>Insertar Nueva Sucursal Producto</h1>
    </header>
    <form id="form" method="POST" action="../controladores/crear_suc_producto.php">
        <div class=" parte1">
            <label for="producto">Producto(*)</label>
            <select id="producto" name="producto">
                <option value="default"> Seleccione un Producto</option>
                <?php
                include '../../config/conexionBD.php';
                $sql = "SELECT * FROM fer_producto WHERE fer_pro_el='N';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $codigo = $row["fer_pro_id"];
                        $desc = $row["fer_pro_nombre"];
                        echo "<option  value='" . $codigo . "'>" . $desc . "</option>";
                    }
                }
                ?>
            </select>
            <span id="mensajeProducto" class="error"> </span>
            <br>
            <label for="stock">Stock(*)</label>
            <input class="in" type="text" id="stock" name="stock" value="" placeholder="Ingrese su descripción ..." />
            <span id="mensajeStock" class="error"></span>
            <br>
            <label for="sucursal">Sucursal(*)</label>
            <select id="sucursal" name="sucursal">
                <option value="default"> Seleccione una Sucursal</option>
                <?php
                $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_el='N';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $codigo = $row["fer_suc_id"];
                        $desc = $row["fer_suc_direccion"];
                        echo "<option  value='" . $codigo . "'>" . $desc . "</option>";
                    }
                }
                ?>
            </select>
            <span id="mensajeSucursal" class="error"></span>
            <br>
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
                        <li><a href="https://www.facebook.com/niko.anazco.1" target="_blank"><img src="../../public/imagenes/fac.png" width=80px heidth=180px></a></li>
                        <li><a href="https://mail.google.com/mail/" target="_blank"><img src="../../public/imagenes/cor.png" width=80px heidth=120px></a></li>
                        <li><a href="https://twitter.com/Nik_Augusto?lang=es" target="_blank"><img src="../../public/imagenes/twi.png" width=80px heidth=100px></a></li>
                        <li><a href="https://www.instagram.com/nikoap77/" target="_blank"><img src="../../public/imagenes/ins.png" width=80px heidth=100px></a></li>
                    </ul>
                </div>
        </section>

        <section id="fot1">
            <h2>&copy; Copyright 2019 Powered by MurilloJ, A&ntilde;azcoN, BenavidezA </h1>
        </section>
    </footer>    

</body>

</html>