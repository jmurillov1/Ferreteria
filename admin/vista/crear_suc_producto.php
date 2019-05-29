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
    <form id="formulario01" method="POST" action="../controladores/crear_suc_producto.php">
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
            <input type="text" id="stock" name="stock" value="" placeholder="Ingrese su descripción ..." />
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
            <input type="submit" id="crear" name="crear" value="Aceptar" />
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
        </div>
    </form>
</body>

</html>