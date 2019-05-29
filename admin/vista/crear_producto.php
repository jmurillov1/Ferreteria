<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Ferretería</title>
    <link href="../../public/vista/css/estilo.css" rel="stylesheet" />
    <a href="../../public/vista/index.html"><img id="cen" src="../../public/imagenes/logo.png"></a>
</head>

<body>
    <h1>Insertar Nuevo Producto</h1>

    <form id="form" method="POST" enctype="multipart/form-data" action="../controladores/crear_producto.php">
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
                include '../../config/conexionBD.php';
                $sql = "SELECT * FROM fer_categoria WHERE fer_cat_el='N';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $codigo = $row["fer_cat_id"];
                        $desc = $row["fer_cat_desc"];
                        echo "<option  value='" . $codigo . "'>" . $desc . "</option>";
                    }
                }
                ?>
            </select>
            <span id="mensajeCategoria" class="error"></span>
            <br>
            <label for="precio">Precio(*)</label>
            <input type="text" id="precio" name="precio" value="" placeholder="Ingrese el precio ..." />
            <span id="mensajePrecio" class="error"></span>
            <br>
            <input type="submit" id="crear" name="crear" value="Aceptar" />
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
        </div>
        <div class=" parte2">
            <label for="imagen">Seleccione imagen a cargar</label>
            <input class="in" id="uploadImage1" type="file" name="image" onchange="previewImage(1)" accept="image/*" />
            <img id="uploadPreview1" width="150" height="150" src="images/usu.PNG" />
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