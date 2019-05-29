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
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
    $imagen = addslashes(file_get_contents($_FILES['uploadImage1']["tmp_name"]));
    if ($imagen == null) {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE fer_usuario " .
            "SET fer_usu_cedula = '$cedula', " .
            "fer_usu_nombres = '$nombres', " .
            "fer_usu_apellidos = '$apellidos', " .
            "fer_usu_direccion = '$direccion', " .
            "fer_usu_telefono = '$telefono', " .
            "fer_usu_correo = '$correo', " .
            "fer_usu_fecha_nac = '$fechaNacimiento', " .
            "fer_usu_mod = '$fecha' " .
            "WHERE fer_usu_id = $codigo";
        if ($conn->query($sql) === TRUE) {
            echo "Se ha actualizado los datos personales correctamemte!!!<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        echo "<a href='../../vista/user/index.php'>Regresar</a>";
        $conn->close();
    } else {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE fer_usuario " .
            "SET fer_usu_cedula = '$cedula', " .
            "fer_usu_nombres = '$nombres', " .
            "fer_usu_apellidos = '$apellidos', " .
            "fer_usu_direccion = '$direccion', " .
            "fer_usu_telefono = '$telefono', " .
            "fer_usu_correo = '$correo', " .
            "fer_usu_fecha_nac = '$fechaNacimiento', " .
            "fer_usu_foto = '$imagen', " .
            "fer_usu_mod = '$fecha' " .
            "WHERE fer_usu_id = $codigo";
        if ($conn->query($sql) === TRUE) {
            echo "Se ha actualizado los datos personales correctamemte!!!<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        echo "<a href='../../vista/user/index.php'>Regresar</a>";
        $conn->close();
    }


    ?>
</body>

</html>