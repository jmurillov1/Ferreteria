<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../public/vista/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../controladores/js/funciones.js"> </script>
</head>

<body>
    <header class="cabis">
        <h4>Productos</h4>
    </header>
    <a href="pedido_detalle.php" class="carr">
        <h5 id='car'>Carrito<img id='imagen2' src='images/carrito.jpg' /> <input id='sel' value='0'> </h5>
    </a>
    <?php
    include '../../config/conexionBD.php';
    $sql1 = "SELECT MIN(fer_suc_id) FROM fer_sucursal WHERE fer_suc_el='N';";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $ident = $row["MIN(fer_suc_id)"];
        }
    }
    ?>
    <select id="sucursal" name="sucursal" onclick="cargar()">
        <option value="default"> Seleccione una Sucursal</option>
        <?php
        $sql = "SELECT * FROM fer_sucursal WHERE fer_suc_el='N';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["fer_suc_id"];
                $desc = $row["fer_suc_direccion"];
                echo "<option  id='item' value='" . $codigo . "'>" . $desc . "</option>";
            }
        }
        ?>
    </select>
    <input autofocus type="text" id="correo" name="correo" value="" placeholder="Ingrese cédula para buscar" required onkeyup="buscarPorCorreo()" />
    <img id="imagen2" src="../../../public/vista/images/lupa.png">
    <?php
    $sql = "SELECT * FROM fer_suc_pro WHERE fer_suc_pro_el='N' AND fer_suc_pro_suc_id=$ident;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $codigo = $row["fer_pro_id"];
            $producto = $row["fer_suc_pro_prod_id"];
            $descripcion = $row["fer_pro_desc"];
            $precio = $row["fer_pro_precio"];
            $foto = $row["fer_pro_foto"];
            echo "<section id='pro'>";
            echo "<div class='parte1'>";
            echo $nombre . "<br>";
            echo $descripcion  . "<br>";
            echo "$" . substr($precio, 0, 4)  . "<br>";
            echo "</div>";
            echo "<div class='parte2'><img id='foto' src='data:image/*;base64," . base64_encode($foto) . "' alt='titulo foto' /></div>";
            echo "<div class='parte3'><button id='menos' onclick='menos($codigo)'>-</button><input class='ctd' name='ctd' id='ctd$codigo' value='1' /><button id='mas' onclick='mas($codigo)'>+</button> <br><button class='agg' id='agg$codigo' onclick='agregar($codigo)'>Agregar Carrito</button></div>";
            echo "</section>";
        }
    } else {
        echo  "<div>No Hay Productos</div>";
    }
    $conn->close();
    ?>
    <footer>
        <h5> Copyright </h5>
        <h5> FerTech </h5>
        <h5> 2019 </h5>
    </footer>
</body>

</html>