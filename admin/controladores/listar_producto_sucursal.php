<?php
session_start();
$cod = $_SESSION['fer_usu_codigo'];
$nombre = $_SESSION['fer_usu_nombres'];
$apellido = $_SESSION['fer_usu_apellidos'];
$foto = $_SESSION['fer_usu_foto'];
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>
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
    ?>
    <table id="info">
        <?php
        $sql = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el='N' AND fer_suc_pro_suc_id=$ident;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["fer_suc_pro_id"];
                $stock = $row["fer_suc_pro_stock"];
                $producto = $row["fer_suc_pro_prod_id"];
                $sqlp = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$producto;";
                $resultp = $conn->query($sqlp);
                if ($resultp->num_rows > 0) {
                    while ($rowp = $resultp->fetch_assoc()) {
                        $nombre = $rowp["fer_pro_nombre"];
                        $descripcion = $rowp["fer_pro_desc"];
                        $precio = $rowp["fer_pro_precio"];
                        $foto = $rowp["fer_pro_foto"];
                    }
                }
                echo "<section id='pro'>";
                echo "<div class='parte1'>";
                echo $nombre . "<br>";
                echo $descripcion  . "<br>";
                echo "$" . substr($precio, 0, 4)  . "<br>";
                echo "</div>";
                echo "<div class='parte2'><img id='foto' src='data:image/*;base64," . base64_encode($foto) . "' alt='titulo foto' /></div>";
                echo "<div class='parte3'>";
                echo "<button id='menos' onclick='menos($codigo)'>-</button>";
                echo "<input class='ctd' name='ctd' id='ctd$codigo' value='1' />";
                echo "<button id='mas' onclick='mas($codigo,$stock)'>+</button> <br>";
                echo "<button class='agg' id='agg$codigo' onclick='agregar($codigo)'>Agregar Carrito</button>";
                echo "</div>";
                echo "</section>";
            }
        } else {
            echo  "<div>No Hay Productos</div>";
        }
        $conn->close();
        ?>
    </table>
    <footer>
        <h5> Copyright </h5>
        <h5> Tu Perno </h5>
        <h5> 2019 </h5>
    </footer>
</body>

</html>