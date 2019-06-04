<?php
session_start();
if (!isset($_SESSION['isUser']) || $_SESSION['isUser'] === FALSE) {
    header("Location: /Ferreteria/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Principal Usuario</title>

</head>

<body>

    <?php
    $_SESSION['suc'] = $_GET['codigo'];
    ?>
</body>

</html>