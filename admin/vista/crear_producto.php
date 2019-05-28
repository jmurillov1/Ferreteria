<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestion de Ferretería</title>
    <link href="../../public/vista/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../controladores/js/funciones.js"> </script>
    <!--<script type="text/javascript" src="../controladores/js/validaciones.js"> </script>-->
</head>

<body>
    <header class="cab">
        <h1>Insertar Nuevo Producto</h1>
    </header>
    <form id="formulario01" method="POST" enctype="multipart/form-data" action="../controladores/crear_producto.php">
        <div class=" parte1">
            <label for="nombre">Nombre(*)</label>
            <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el nombre del producto ..." />
            <span id="mensajeNombre" class="error"> </span>
            <br>
            <label for="desc">Descripción(*)</label>
            <input type="text" id="desc" name="desc" value="" placeholder="Ingrese su descripción ..." />
            <span id="mensajeDescripcion" class="error"></span>
            <br>
            <label for="precio">Precio(*)</label>
            <input type="text" id="precio" name="precio" value="" placeholder="Ingrese el precio ..." />
            <span id="mensajePrecio" class="error"></span>
            <br>
            <input type="submit" id="crear" name="crear" value="Aceptar" />
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
            <?php
            include '../../config/conexionBD.php';
            $sql = "SELECT * FROM fer_categoria WHERE fer_cat_el='N';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $desc = $row["fer_cat_desc"];
                    echo "<option>";
                    echo "$desc";
                    echo "</option>";
                }
            }
            ?>
        </div>
        <div class=" parte2">
            <label for="imagen">Seleccione imagen a cargar</label>
            <input id="uploadImage1" type="file" name="image" onchange="previewImage(1)" accept="image/*" />
            <img id="uploadPreview1" width="150" height="150" src="images/usu.PNG" />
        </div>
    </form>
</body>

</html>