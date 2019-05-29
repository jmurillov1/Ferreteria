<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';

    $usuario = isset($_POST['correo']) ? trim($_POST['correo']) : null;
    $contraseña = isset($_POST['contraseña']) ? trim($_POST['contraseña']) : null;
    echo $contraseña;
    $pass = MD5($contraseña);
    echo $pass;
    $sql = "SELECT * FROM fer_usuario WHERE fer_usu_correo = '$usuario' and fer_usu_password = '$pass' and fer_usu_el = 'N'";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        if ($rows['fer_usu_rol'] == 'user') { 
            $foto = base64_encode($rows['fer_usu_foto']);
            $_SESSION['isUser'] = TRUE;
            $_SESSION['fer_usuario_codigo'] = $rows['fer_usu_id']; 
            $_SESSION['fer_usu_nombres'] = $rows['fer_usu_nombres'];
            $_SESSION['fer_usu_apellidos'] = $rows['fer_usu_apellidos'];
            $_SESSION['fer_usu_foto'] = $foto;
            header("Location:../../admin/vista/user/index.php");
        } else if ($rows['fer_usu_rol'] == 'admin') {
            $_SESSION['isAdmin'] = TRUE;
            $_SESSION['fer_usuario'] = $rows['fer_usu_codigo'];
            $_SESSION['fer_usu_nombres'] = $rows['fer_usu_nombres'];
            $_SESSION['fer_usu_apellidos'] = $rows['fer_usu_apellidos'];
            $_SESSION['fer_usu_foto']= $rows['fer_usu_foto'];
            header("Location:../../admin/vista/admin/usuarios.php");
        }
    } else {
        header("Location:../vista/login.html");
    }

    $conn->close();
    ?>
</body>
</html>