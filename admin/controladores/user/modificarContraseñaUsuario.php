<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona </title>
</head>

<body> 

    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
    $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;
    $sqlContrasena1 = "SELECT * FROM fer_usuario where fer_usu_id = $codigo and fer_usu_password= MD5('$contrasena1')";
    $result1 = $conn->query($sqlContrasena1);

    if ($result1->num_rows > 0) {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sqlContrasena2 = "UPDATE fer_usuario " .
            "SET fer_usu_password = MD5('$contrasena2')," .
            "fer_usu_mod= '$fecha' " .
            "WHERE fer_usu_id = $codigo";
        if ($conn->query($sqlContrasena2) === TRUE) {
            echo "Se ha actualizado la contraseña correctamemte!!!<br>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>La contraseña actual no coincide con nuestros registros!!! </p>";
    }
    echo "<a href='../../vista/user/Index.php'>Regresar</a>";
    $conn->close();

    ?>
</body>

</html>