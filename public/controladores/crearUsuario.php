<?php
include "../../config/conexionBD.php";
$cedula = isset($_POST['cedula']) ? strtoupper(trim($_POST['cedula'])) : null;
$nombres = isset($_POST['nombres']) ? strtoupper(trim($_POST['nombres'])) : null;
$apellidos = isset($_POST['apellidos']) ? strtoupper(trim($_POST['apellidos'])) : null;
$direccion = isset($_POST['direccion']) ? strtoupper(trim($_POST['direccion'])) : null;
$telefono = isset($_POST['telefono']) ? strtoupper(trim($_POST['telefono'])) : null;
$fechaDeNacimiento = isset($_POST['fecha_nacimiento']) ? strtoupper(trim($_POST['fecha_nacimiento'])) : null;
$correo = isset($_POST['correo']) ? strtoupper(trim($_POST['correo'])) : null;
$contraseña = isset($_POST['contrasena']) ? (trim($_POST['contrasena'])) : null;
$imagen_usuario = addslashes(file_get_contents($_FILES['uploadImage1']["tmp_name"]));
$contra = MD5($contraseña);
$sql = "INSERT INTO fer_usuario VALUES(null,'$cedula','$nombres','$apellidos','$direccion','$telefono','$fechaDeNacimiento','$correo','$contra','$imagen_usuario','user','N',null,null)";
if ($conn->query($sql) === TRUE) {
    echo "Se han creado los datos personales correctamente <br>";
} else {
    if ($conn->errno == 1862) {
        echo "La persona con la cedula $cedula ya esta registrada en el sistema";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->errno . "<br>";
    }
    echo "Error:" . $sql . "<br>" . $conn->errno . "br";
}
echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
$conn->close();
?>