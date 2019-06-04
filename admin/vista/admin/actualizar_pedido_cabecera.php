<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Cabecera</title>
    <link href="../../../public/vista/css/estilo.css" rel="stylesheet" />
</head>

<body>
    <header>
    </header>
    <?php
    include "../../../config/conexionBD.php";
    $codigo_cab = $_GET['codigo'];
    $sql = "SELECT * FROM fer_pedido_cabecera WHERE fer_ped_cab_id = $codigo_cab AND fer_ped_cab_el = 'N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form id="form" method="POST" enctype="multipart/form-data" action="../../controladores/admin/actualizar_producto.php">
                <div class=" parte1">
                    <input class="in" type="hidden" id="codigo" name="codigo" value="<?php echo  $row["fer_ped_cab_id"]; ?>" />
                    <select id="cat" name="cat">
                        <option value="default" selected><?php echo $row["fer_ped_cab_estado"] ?> </option>
                        <option value="default"> En camino</option>
                        <option value="default"> Finalizado</option>
                    </select>
                </div>
                <div class=" parte2">
                    <input class="in" id="uploadImage1" type="file" name="image" onchange="previewImage(1)" accept="image/*" />
                    <img id="uploadPreview1" width="150" height="150" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_pro_foto']) ?>" width="100" height="100" />
                </div>
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