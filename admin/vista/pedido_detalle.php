<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link href="../../../public/vista/css/stables.css" rel="stylesheet" type="text/css" />
    <link href="../../../public/vista/css/style.css" rel="stylesheet" type="text/css" />
    <!--<script type="text/javascript" src="../../controladores/user/js/metodos.js"> </script>-->
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    /*$sqlu = "SELECT * FROM usuario WHERE usu_codigo='$codigoui';";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();
    $foto = $row["usu_foto"];*/
    ?>
    <header class="cabis">
        <h2>
            Pedido Detalle
        </h2>
    </header>
    <table id="tbl">
        <tr>
            <th></th>
            <th></th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php

        $conn->close();
        ?>
    </table>
    <footer>
        <h5> Copyright </h5>
        <h5> Jordan Murillo </h5>
        <h5> 2019 </h5>
    </footer>
</body>

</html>