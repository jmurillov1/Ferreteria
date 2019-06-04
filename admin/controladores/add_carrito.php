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
</head>

<body>
    <table id="tbl">
        <?php
        $codigo = $_GET['codigo'];
        $cantidad = $_GET['cantidad'];
        $val2 = false;
        $total = 0.00;
        include '../../config/conexionBD.php';

        $sql = "SELECT * FROM fer_sucursal_producto WHERE fer_suc_pro_el='N' AND fer_suc_pro_id=$codigo;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $pro = $row["fer_suc_pro_prod_id"];
        echo $pro;
        $sql1 = "SELECT * FROM fer_producto WHERE fer_pro_el='N' AND fer_pro_id=$pro;";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $precio = $row1["fer_pro_precio"];
        echo $precio;

        $sql2 = "SELECT * FROM fer_ped_det_temp WHERE fer_pdt_suc_pro_id=$codigo;";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                if ($row["fer_pdt_suc_pro_id"] == $codigo) {
                    $canti = $row["fer_pdt_cant"] + $cantidad;
                    $sql = "UPDATE fer_ped_det_temp SET fer_pdt_cant=$canti, fer_pdt_subtotal=$canti*$precio WHERE fer_pdt_suc_pro_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Se ha actualizado los detalles correctamente !!!</p>";
                    } else {
                        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
                    }
                }
            }
        } else {
            $sql = "INSERT INTO fer_ped_det_temp VALUES(0, $cantidad, $precio*$cantidad,$codigo);";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Se ha agregado correctamente !!!</p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }
        }
        $conn->close();
        ?>
    </table>
</body>

</html>