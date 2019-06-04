<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Sucursal</title>
</head>

<body>
    <?php
    include "../../../config/conexionBD.php";
    $codigo_suc = $_GET['codigo'];
    $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_id = $codigo_suc AND fer_suc_el = 'N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="form" method="POST" action="../../controladores/admin/actualizar_sucursal.php">
                <div class=" parte1">
                    <input class="in" type="hidden" id="codigo" name="codigo" value="<?php echo $row['fer_suc_id']; ?>" />
                    <br>
                    <label for="desc">Telefono(*)</label>
                    <input class="in" type="text" id="telefono" name="telefono" value="<?php echo $row["fec_suc_telefono"]; ?>" />
                    <br>
                    <label for="desc">Direccion(*)</label>
                    <input class="in" type="text" id="direccion" name="direccion" value="<?php echo $row["fec_suc_direccion"]; ?>" />
                    <br>
                    <input class="in" type="submit" value="Actualizar" />
                    <input class="in" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
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