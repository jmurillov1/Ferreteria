<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"> 
    <script type="text/javascript" src="../../../js/funciones.js"></script>
    <title>Modificar datos de persona</title>
</head>

<body>
    <?php
    $codigo = $_GET["codigo"];
    include '../../../config/conexionBD.php';
    $sql = "SELECT * FROM fer_usuario where fer_usu_id=$codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="formulario01" method="POST" action="../../controladores/admin/modificarUsuario.php"  enctype="multipart/form-data">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
                <img id="uploadPreview1" name ="uploadPreview1"  class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="200" height="200"> 
                <br>
                <input type="file" id="uploadImage1" name="uploadImage1" onchange="previewImage(1)" accept="image/*" />
                <br>
                <label for="cedula">Cedula</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["fer_usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..." />
                <br>
                <label for="nombres">Nombres</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["fer_usu_nombres"]; ?>" required placeholder="Ingrese los dos nombres ..." />
                <br>
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["fer_usu_apellidos"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                <br>
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["fer_usu_direccion"]; ?>" required placeholder="Ingrese la dirección ..." />
                <br>
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["fer_usu_telefono"]; ?>" required placeholder="Ingrese el teléfono ..." />
                <br>
                <label for="fecha">Fecha Nacimiento</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["fer_usu_fecha_nac"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..." />
                <br>
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["fer_usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..." />
                <br>
                <input type="submit" id="modificar" name="modificar" value="Modificar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
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