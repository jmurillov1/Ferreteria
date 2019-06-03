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
    <?php
    $codigo = $_GET['codigo'];
    include '../../config/conexionBD.php';

    $sqlp = "DELETE FROM fer_pedido_detalle WHERE fer_pro_id=$codigo;";
    if ($conn->query($sqlp) === TRUE) {
        echo "<p>Se ha creado el pedido correctamemte !!!</p>";
    } else {
        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
    }
    $conn->close();
    ?>
</body>

</html>