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
    <a href="#">
        <h5 id="car">Carrito<img id="imagen2" src="images/carrito.jpg" />
            <p id="sel"></p>
        </h5>
    </a>
    <!--<input autofocus type="text" id="correo" name="correo" value="" placeholder="Ingrese cédula para buscar" required onkeyup="buscarPorCorreo()" />
        <img id="imagen2" src="../../../public/vista/images/lupa.png">-->
    <?php
    include '../../config/conexionBD.php';
    $sql = "SELECT * FROM fer_producto WHERE fer_pro_el='N';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $codigo = $row["fer_pro_id"];
            $nombre = $row["fer_pro_nombre"];
            $descripcion = $row["fer_pro_desc"];
            $precio = $row["fer_pro_precio"];
            $foto = $row["fer_pro_foto"];
            echo "<section id='pro'>";
            echo "<div class='parte1'>";
            echo $nombre . "<br>";
            echo $descripcion  . "<br>";
            echo substr($precio, 0, 3)  . "<br>";
            echo "</div>";
            echo "<div class='parte2'><img id='foto' src='data:image/*;base64," . base64_encode($foto) . "' alt='titulo foto' /></div>";
            echo "<div class='parte3'><button id='menos' onclick='menos()'>-</button><input id='ctd' value='1' /><button id='mas' onclick='mas()'>+</button> <br><button id='agg' onclick='agregar()'>Agregar Carrito</button></div>";
            echo "</section>";
        }
    } else {
        echo  "<div>No Hay Productos</div>";
    }
    $conn->close();
    ?>
    <footer>
        <h5> Copyright </h5>
        <h5> Jordan Murillo </h5>
        <h5> 2019 </h5>
    </footer>
</body>

</html>