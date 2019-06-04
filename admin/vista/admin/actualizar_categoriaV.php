<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Categoria</title>
</head>

<body>
    <?php
    include "../../../config/conexionBD.php";
    $codigo_cat = $_GET['codigo'];
    $sql = "SELECT * FROM fer_categoria WHERE fer_cat_id = $codigo_cat AND fer_cat_el = 'N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="form" method="POST"  action="../../controladores/admin/actualizar_categoria.php">
                <div class=" parte1">
                    <input class="in" type="hidden" id="codigo" name="codigo" value="<?php echo $row['fer_cat_id']; ?>" />
                    <br>
                    <label for="desc">Descripción(*)</label>
                    <input class="in" type="text" id="desc" name="desc" value="<?php echo $row["fer_cat_desc"]; ?>" />
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