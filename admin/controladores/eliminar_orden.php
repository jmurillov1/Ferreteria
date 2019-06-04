<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <script type="text/javascript" src="../controladores/js/funciones.js"> </script>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $sqlp = "DELETE FROM fer_ped_det_temp;";
    if ($conn->query($sqlp) === TRUE) {
        echo "<p>Se ha creado el pedido correctamemte !!!</p>";
    } else {
        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
    }
    $sql = "ALTER TABLE fer_ped_det_temp AUTO_INCREMENT=0;";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado el pedido correctamemte !!!</p>";
    } else {
        echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
    }
    $conn->close();
    ?>
</body>

</html>