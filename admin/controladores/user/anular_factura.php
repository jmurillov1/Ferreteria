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
        include '../../../config/conexionBD.php';
        $sql = "UPDATE fer_factura_cabecera SET fer_fac_cab_anulado='S' WHERE fer_fac_cab_id=$codigo;";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha actualizado los detalles correctamente !!!</p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>