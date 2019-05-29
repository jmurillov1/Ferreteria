<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../../js/funciones.js"></script>
    <title>Actualizar Usuario</title>
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM fer_usuario where fer_usu_id=$codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="../../controladores/admin/eliminarUsuario.php" enctype="multipart/form-data">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <img id="uploadPreview1" name="uploadPreview1" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="200" height="200">
                <br>
                <label for="cedula">Cedula </label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["fer_usu_cedula"]; ?>" disabled />
                <br>
                <label for="nombres">Nombres</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["fer_usu_nombres"]; ?>" disabled />
                <br>
                <label for="apellidos">Apelidos</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["fer_usu_apellidos"]; ?>" disabled />
                <br>
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["fer_usu_direccion"]; ?>" disabled />
                <br>
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["fer_usu_telefono"]; ?>" disabled />
                <br>
                <label for="fecha">Fecha Nacimiento</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["fer_usu_fecha_nac"]; ?>" disabled />
                <br>
                <label for="correo">Correo electrónico </label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["fer_usu_correo"]; ?>" disabled />
                <br>
                <input type="submit" id="modificar" name="modificar" value="Eliminar Usuario" />
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