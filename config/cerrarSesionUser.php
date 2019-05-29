<?php
 session_start();
 $_SESSION['isUser'] = FALSE;
 session_destroy();
 header("Location: /Ferreteria/public/vista/login.html");
?>