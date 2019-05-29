<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>

<body>
    <div align="center">
        <h1>Usuarios</h1>
    </div>
    <table style="width:100%" border=1>
        <tr>
            <th>Foto</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>FechaDeNacimiento</th>
            <th>Correo</th> 
            <th>Actualizar</th> 
            <th>Eliminar</th> 
            <th>Actualizar Contraseña</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM fer_usuario WHERE fer_usu_el = 'N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { 
                echo "<tr>"; 
                ?>  
                 <td> <img id="uploadPreview1" name ="uploadPreview1"  class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['fer_usu_foto']) ?>" width="200" height="200"> </td>;
                <?php 
                echo "   <td>" . $row['fer_usu_cedula'] . "</td>";
                echo "   <td>" . $row['fer_usu_nombres'] . "</td>";
                echo "   <td>" . $row['fer_usu_apellidos'] . "</td>";
                echo "   <td>" . $row['fer_usu_direccion'] . "</td>";
                echo "   <td>" . $row['fer_usu_telefono'] . "</td>";
                echo "   <td>" . $row['fer_usu_fecha_nac'] . "</td>";
                echo "   <td>" . $row['fer_usu_correo'] . "</td>"; 
                echo "   <td>" . "<a href = 'modificarUsuario.php?codigo=" . $row['fer_usu_id'] . "'>" . "Actualizar</a>" . "</td>";
                echo "   <td>" . "<a href = 'eliminarUsuario.php?codigo=" . $row['fer_usu_id'] . "'>" . "Eliminar</a>" . "</td>";
                echo "   <td>" . "<a href = 'cambiar_contraseña.php?codigo=" . $row['fer_usu_id'] . "'>" . "Actualizar Contraseña</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>