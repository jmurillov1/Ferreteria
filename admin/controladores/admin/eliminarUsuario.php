<?php
session_start();
$Cod = $_SESSION['fer_usu_codigo'];
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de persona </title>
</head>

<body>
    <?php
//incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST['codigo'];
    $codigo = $_SESSION['fer_usu_codigo'];
    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE fer_usuario SET fer_usu_el = 'S', fer_usu_mod = '$fecha' WHERE fer_usu_id = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    if ($codigo == $Cod) {
        echo "<a href='../../../public/vista/login.html'>Regresar</a>";
    } else {
        echo "<a href='../../vista/admin/usuarios.php'>Regresar</a>";
    }
    $conn->close();
    ?>
</body>

</html>